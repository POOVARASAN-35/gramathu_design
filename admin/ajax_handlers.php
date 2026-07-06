<?php
// Gallery Actions AJAX Endpoint Handlers
require_once __DIR__ . '/../includes/db.php';

header('Content-Type: application/json');

// Session Guard: deny guest requests
if (!isset($_SESSION['admin_user'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized access. Session expired.']);
    exit();
}

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($action)) {
    echo json_encode(['success' => false, 'error' => 'Invalid action or request.']);
    exit();
}

switch ($action) {
    
    // 1. Toggle Show/Hide status
    case 'toggle_status':
        $id = intval($_POST['id'] ?? 0);
        $status = intval($_POST['status'] ?? 0);
        
        if ($id <= 0 || ($status !== 0 && $status !== 1)) {
            echo json_encode(['success' => false, 'error' => 'Invalid parameters.']);
            exit();
        }

        try {
            $stmt = $pdo->prepare("UPDATE gallery SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
            echo json_encode(['success' => true]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
            exit();
        }
        break;

    // 2. Edit Image metadata (title/description/image file)
    case 'edit':
        $id = intval($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');

        if ($id <= 0 || empty($title) || empty($description)) {
            echo json_encode(['success' => false, 'error' => 'All details are required.']);
            exit();
        }

        $new_image_name = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                echo json_encode(['success' => false, 'error' => 'File upload error code: ' . $_FILES['image']['error']]);
                exit();
            }

            $file = $_FILES['image'];
            // 1. Validate File Size (Max 5MB)
            $max_size = 5 * 1024 * 1024;
            if ($file['size'] > $max_size) {
                echo json_encode(['success' => false, 'error' => 'File size exceeds maximum threshold (5MB).']);
                exit();
            }

            // 2. Validate File Mime Type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $file['tmp_name']);
            finfo_close($finfo);

            $allowed_types = [
                'image/jpeg' => 'jpg',
                'image/jpg' => 'jpg',
                'image/png' => 'png',
                'image/webp' => 'webp'
            ];

            if (!array_key_exists($mime_type, $allowed_types)) {
                echo json_encode(['success' => false, 'error' => 'Invalid file format. Supported: JPG, JPEG, PNG, WEBP.']);
                exit();
            }

            $ext = $allowed_types[$mime_type];

            // 3. Extension check
            $original_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            if (!in_array($original_ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                echo json_encode(['success' => false, 'error' => 'Invalid file extension.']);
                exit();
            }

            // 4. Generate unique filename
            $new_image_name = 'gd_' . md5(uniqid(microtime(), true)) . '.' . $ext;
            $upload_dir = __DIR__ . '/../uploads/gallery/';
            $target_path = $upload_dir . $new_image_name;

            // Move the file
            if (!move_uploaded_file($file['tmp_name'], $target_path)) {
                echo json_encode(['success' => false, 'error' => 'Failed to write new image to storage location.']);
                exit();
            }
        }

        try {
            if ($new_image_name) {
                // Get old image name first
                $query = $pdo->prepare("SELECT image_name FROM gallery WHERE id = ?");
                $query->execute([$id]);
                $old_item = $query->fetch();

                if ($old_item) {
                    $old_image_path = __DIR__ . '/../uploads/gallery/' . $old_item['image_name'];
                    if (file_exists($old_image_path)) {
                        @unlink($old_image_path);
                    }
                }

                // Update database including new image name
                $stmt = $pdo->prepare("UPDATE gallery SET title = ?, description = ?, image_name = ? WHERE id = ?");
                $stmt->execute([$title, $description, $new_image_name, $id]);
            } else {
                // Update title & description only
                $stmt = $pdo->prepare("UPDATE gallery SET title = ?, description = ? WHERE id = ?");
                $stmt->execute([$title, $description, $id]);
            }

            echo json_encode([
                'success' => true,
                'image_name' => $new_image_name
            ]);
            exit();
        } catch (PDOException $e) {
            // Rollback uploaded file if DB update fails
            if ($new_image_name && file_exists(__DIR__ . '/../uploads/gallery/' . $new_image_name)) {
                @unlink(__DIR__ . '/../uploads/gallery/' . $new_image_name);
            }
            echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
            exit();
        }
        break;

    // 3. Delete Image file and database record
    case 'delete':
        $id = intval($_POST['id'] ?? 0);

        if ($id <= 0) {
            echo json_encode(['success' => false, 'error' => 'Invalid design ID.']);
            exit();
        }

        try {
            // First fetch the filename to remove it from disk
            $stmt = $pdo->prepare("SELECT image_name FROM gallery WHERE id = ?");
            $stmt->execute([$id]);
            $item = $stmt->fetch();

            if (!$item) {
                echo json_encode(['success' => false, 'error' => 'Design item not found.']);
                exit();
            }

            $image_name = $item['image_name'];
            $file_path = __DIR__ . '/../uploads/gallery/' . $image_name;

            // Delete physical image file from the server disk
            if (!empty($image_name) && file_exists($file_path)) {
                @unlink($file_path);
            }

            // Remove database entry
            $del_stmt = $pdo->prepare("DELETE FROM gallery WHERE id = ?");
            $del_stmt->execute([$id]);

            echo json_encode(['success' => true]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
            exit();
        }
        break;

    default:
        echo json_encode(['success' => false, 'error' => 'Unknown action.']);
        exit();
}
?>
