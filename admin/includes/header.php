<?php
// Admin Header & Auth Guard wrapper
require_once __DIR__ . '/../../includes/db.php';

// Auth Guard: redirect to login if session is empty
if (!isset($_SESSION['admin_user'])) {
    header("Location: login.php");
    exit();
}

$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Gramathu Design</title>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Admin Stylesheet -->
    <link rel="stylesheet" href="css/admin-style.css">
</head>
<body>

    <div class="admin-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="sidebar-admin" id="adminSidebar">
            <div class="sidebar-header">
                <a href="../index.php" class="sidebar-brand">
                    <img src="../assets/images/favicon.png" alt="Gramathu Design Logo" class="brand-logo-img" style="height: 32px; width: 32px; margin-right: 10px; object-fit: contain; border-radius: 6px;">
                    <span>GRAMATHU <strong class="text-warning">DESIGN</strong></span>
                </a>
            </div>
            
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                    <a href="dashboard.php">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item <?php echo ($current_page == 'gallery.php') ? 'active' : ''; ?>">
                    <a href="gallery.php">
                        <i class="fa-solid fa-images"></i>
                        <span>Gallery</span>
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer">
                <a href="logout.php" class="btn btn-outline-danger w-100 btn-sm">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                </a>
            </div>
        </aside>

        <!-- Main Panel Container -->
        <div class="content-admin">
            <!-- Top Sticky Navbar -->
            <header class="header-admin d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-dark d-lg-none" id="sidebarToggle" aria-label="Toggle Sidebar">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <h1 class="h4 mb-0 fw-bold text-dark">
                        <?php 
                        if ($current_page == 'dashboard.php') echo 'Admin Dashboard';
                        else if ($current_page == 'gallery.php') echo 'Gallery Management';
                        ?>
                    </h1>
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted d-none d-md-inline-block">Welcome, <strong>Ragavathini</strong></span>
                    <a href="../index.php" target="_blank" class="btn btn-outline-warning btn-sm">
                        <i class="fa-solid fa-globe me-2"></i>Visit Site
                    </a>
                </div>
            </header>

            <!-- Main Scrollable Body Area -->
            <main class="admin-body">
