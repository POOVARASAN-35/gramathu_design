<?php
// Admin Dashboard
require_once __DIR__ . '/includes/header.php';

// 1. Fetch total images count
$total_stmt = $pdo->query("SELECT COUNT(*) FROM gallery");
$total_images = $total_stmt->fetchColumn();

// 2. Fetch images uploaded today
$today_stmt = $pdo->query("SELECT COUNT(*) FROM gallery WHERE DATE(created_at) = CURDATE()");
$uploaded_today = $today_stmt->fetchColumn();

// 3. Helper function to calculate storage size of uploads/gallery/
function get_dir_size($path) {
    $total_bytes = 0;
    if (file_exists($path) && is_dir($path)) {
        $files = scandir($path);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $file_path = $path . '/' . $file;
                if (is_file($file_path)) {
                    $total_bytes += filesize($file_path);
                }
            }
        }
    }
    
    // Format to readable string (MB/KB)
    if ($total_bytes >= 1048576) {
        return number_format($total_bytes / 1048576, 2) . ' MB';
    } elseif ($total_bytes >= 1024) {
        return number_format($total_bytes / 1024, 2) . ' KB';
    }
    return $total_bytes . ' Bytes';
}

$gallery_dir = __DIR__ . '/../uploads/gallery';
$storage_used = get_dir_size($gallery_dir);

// 4. Fetch 4 most recent uploads
$recent_stmt = $pdo->query("SELECT * FROM gallery ORDER BY created_at DESC LIMIT 4");
$recent_uploads = $recent_stmt->fetchAll();
?>

<!-- Welcome Banner -->
<div class="row mb-4" data-aos="fade-up">
    <div class="col-12">
        <div class="card border-0 bg-white p-4 shadow-sm" style="border-radius: 16px; border-left: 5px solid var(--maroon-primary) !important;">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <h2 class="h3 fw-bold text-dark mb-1">Hello, Ragavanthini!</h2>
                    <p class="text-muted mb-0">Here is a quick overview of your design boutique's gallery performance today.</p>
                </div>
                <div>
                    <a href="gallery.php" class="btn btn-warning fw-semibold px-4 py-2" style="border-radius: 12px; box-shadow: 0 4px 10px rgba(212, 175, 55, 0.25);">
                        <i class="fa-solid fa-plus me-2"></i>Upload Blouses
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Counter Grid -->
<div class="row g-4 mb-4">
    <!-- Stat 1: Total Images -->
    <div class="col-md-6 col-lg-3">
        <div class="dash-card">
            <div>
                <p class="dash-card-label">Total Images</p>
                <h3 class="dash-card-value"><?php echo $total_images; ?></h3>
            </div>
            <div class="dash-card-icon dash-icon-maroon">
                <i class="fa-solid fa-images"></i>
            </div>
        </div>
    </div>
    
    <!-- Stat 2: Uploaded Today -->
    <div class="col-md-6 col-lg-3">
        <div class="dash-card">
            <div>
                <p class="dash-card-label">Uploaded Today</p>
                <h3 class="dash-card-value"><?php echo $uploaded_today; ?></h3>
            </div>
            <div class="dash-card-icon dash-icon-gold">
                <i class="fa-solid fa-cloud-arrow-up"></i>
            </div>
        </div>
    </div>
    
    <!-- Stat 3: Storage Used -->
    <div class="col-md-6 col-lg-3">
        <div class="dash-card">
            <div>
                <p class="dash-card-label">Storage Used</p>
                <h3 class="dash-card-value"><?php echo $storage_used; ?></h3>
            </div>
            <div class="dash-card-icon dash-icon-maroon">
                <i class="fa-solid fa-hdd"></i>
            </div>
        </div>
    </div>
    
    <!-- Stat 4: Active Status -->
    <div class="col-md-6 col-lg-3">
        <div class="dash-card">
            <div>
                <p class="dash-card-label">Server Status</p>
                <h3 class="dash-card-value text-success">Active</h3>
            </div>
            <div class="dash-card-icon bg-success bg-opacity-10 text-success">
                <i class="fa-solid fa-server"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Uploads Panel -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 bg-white p-4 shadow-sm" style="border-radius: 20px;">
            <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3">
                <h3 class="h5 fw-bold mb-0 text-dark">Recent Gallery Additions</h3>
                <a href="gallery.php" class="btn btn-outline-dark btn-sm rounded-pill px-3">View All</a>
            </div>
            
            <?php if (empty($recent_uploads)): ?>
                <div class="text-center py-5">
                    <div class="mb-3 text-muted"><i class="fa-solid fa-image-portrait fa-3x"></i></div>
                    <p class="text-muted mb-0">No images uploaded yet. Head over to the Gallery page to get started!</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($recent_uploads as $item): ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; overflow: hidden; background: #FAF9F6;">
                                <div style="position: relative;">
                                    <img src="../uploads/gallery/<?php echo htmlspecialchars($item['image_name']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="height: 180px; width: 100%; object-fit: cover;">
                                    <span class="badge position-absolute top-0 end-0 m-2 <?php echo $item['status'] == 1 ? 'bg-success' : 'bg-secondary'; ?>">
                                        <?php echo $item['status'] == 1 ? 'Visible' : 'Hidden'; ?>
                                    </span>
                                </div>
                                <div class="p-3">
                                    <h4 class="h6 fw-semibold text-truncate mb-1"><?php echo htmlspecialchars($item['title']); ?></h4>
                                    <p class="text-muted small mb-0"><i class="fa-solid fa-calendar-days me-1"></i><?php echo date('d M, Y', strtotime($item['created_at'])); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php';
?>
