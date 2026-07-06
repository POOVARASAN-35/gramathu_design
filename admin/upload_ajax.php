<?php
// AJAX Multi-Image Upload Handler
require_once __DIR__ . '/../includes/db.php';

header('Content-Type: application/json');

// Session verification: deny requests from guests
if (!isset($_SESSION['admin_user'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized access. Please log in first.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
    exit();
}

$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');

if (empty($title) || empty($description)) {
    echo json_encode(['success' => false, 'error' => 'Title and description are required.']);
    exit();
}

if (!isset($_FILES['images']) || !is_array($_FILES['images']['name'])) {
    echo json_encode(['success' => false, 'error' => 'No images selected or invalid upload format.']);
    exit();
}

$files = $_FILES['images'];
$uploaded_count = 0;
$errors = [];
$uploaded_items = [];

$file_count = count($files['name']);
for ($i = 0; $i < $file_count; $i++) {
    // Skip empty file slots (often happens in form arrays if empty)
    if ($files['error'][$i] === UPLOAD_ERR_NO_FILE) {
        continue;
    }

    if ($files['error'][$i] !== UPLOAD_ERR_OK) {
        $errors[] = "File \"{$files['name'][$i]}\" upload error code: {$files['error'][$i]}";
        continue;
    }

    $tmp_name = $files['tmp_name'][$i];
    $size = $files['size'][$i];
    $name = $files['name'][$i];

    // 1. Validate File Size (Max 5MB)
    $max_size = 5 * 1024 * 1024;
    if ($size > $max_size) {
        $errors[] = "File \"{$name}\" exceeds maximum threshold (5MB).";
        continue;
    }

    // 2. Validate File Mime Type
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $tmp_name);
    finfo_close($finfo);

    $allowed_types = [
        'image/jpeg' => 'jpg',
        'image/jpg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];

    if (!array_key_exists($mime_type, $allowed_types)) {
        $errors[] = "File \"{$name}\" has an invalid format. Supported: JPG, JPEG, PNG, WEBP.";
        continue;
    }

    $ext = $allowed_types[$mime_type];

    // 3. Extension check
    $original_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($original_ext, ['jpg', 'jpeg', 'png', 'webp'])) {
        $errors[] = "File \"{$name}\" has an invalid file extension.";
        continue;
    }

    // 4. Generate unique filename
    $unique_filename = 'gd_' . md5(uniqid(microtime(), true)) . '.' . $ext;
    $upload_dir = __DIR__ . '/../uploads/gallery/';
    
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    $target_path = $upload_dir . $unique_filename;

    // 5. Save and Insert
    if (move_uploaded_file($tmp_name, $target_path)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO gallery (title, description, image_name, status) VALUES (?, ?, ?, 1)");
            $stmt->execute([$title, $description, $unique_filename]);
            $uploaded_count++;
            $uploaded_items[] = [
                'image_name' => $unique_filename,
                'title' => $title
            ];
        } catch (PDOException $e) {
            if (file_exists($target_path)) {
                unlink($target_path);
            }
            $errors[] = "Database storage error for \"{$name}\": " . $e->getMessage();
        }
    } else {
        $errors[] = "Failed to write file \"{$name}\" to storage location.";
    }
}

if ($uploaded_count > 0) {
    echo json_encode([
        'success' => true,
        'message' => "Successfully uploaded {$uploaded_count} images.",
        'uploaded_items' => $uploaded_items,
        'errors' => !empty($errors) ? implode('; ', $errors) : null
    ]);
} else {
    echo json_encode([
        'success' => false,
        'error' => !empty($errors) ? implode('; ', $errors) : 'No files were uploaded.'
    ]);
}
exit();
?>
