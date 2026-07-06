<?php
// Central Database Configuration Manager for Gramathu Design
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'gramathu_design';

try {
    // 1. Establish connection to MySQL server (without selecting DB first)
    $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    // 2. Automatically create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");
    $pdo->exec("USE `$db_name`;");

    // 3. Automatically create tables if they do not exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    $pdo->exec("CREATE TABLE IF NOT EXISTS gallery (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(150) NOT NULL,
        description TEXT,
        image_name VARCHAR(150) NOT NULL,
        status TINYINT(1) DEFAULT 1,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

    // 4. Auto-seed default admin account if table is empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM admin_users");
    if ($stmt->fetchColumn() == 0) {
        // Default username: admin | Password: admin123
        $default_user = 'admin';
        $default_pass = 'admin123';
        $hash = password_hash($default_pass, PASSWORD_DEFAULT);

        $seed = $pdo->prepare("INSERT INTO admin_users (username, password_hash) VALUES (?, ?)");
        $seed->execute([$default_user, $hash]);
    }

    // 5. Auto-seed default gallery images if gallery is empty
    $gal_count = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn();
    if ($gal_count == 0) {
        $defaults = [
            ['title' => 'Bridal Aari Work Blouse', 'desc' => 'Intricate gold zardozi on premium maroon velvet', 'src' => 'hero_bridal_blouse.png'],
            ['title' => 'Pink Designer Blouse', 'desc' => 'Silver beadwork & pearl embroidery', 'src' => 'pink_designer_blouse.png'],
            ['title' => 'Green Bridal Blouse', 'desc' => 'Silk saree matching heavy neck work', 'src' => 'green_bridal_blouse.png'],
            ['title' => 'Temple Work Blouse', 'desc' => 'Classical temple motifs and patterns', 'src' => 'temple_work_blouse.png'],
            ['title' => 'Maggam Work Blouse', 'desc' => 'Detailed cutwork and pearl zardozi', 'src' => 'maggam_work_blouse.png'],
            ['title' => 'Stone Work Blouse', 'desc' => 'Floral stonework & sparkling sequins', 'src' => 'stone_work_blouse.png'],
            ['title' => 'Traditional Silk Blouse', 'desc' => 'Beaded tear-drop neck opening', 'src' => 'user_design_2.jpg'],
            ['title' => 'Wedding Collection', 'desc' => 'Premium white & gold elegant back design', 'src' => 'user_design_1.jpg'],
            ['title' => 'Festive Collection', 'desc' => 'Lotus zardozi cutwork patterns', 'src' => 'user_design_3.jpg'],
            ['title' => 'Embroidery Close-up', 'desc' => 'Master artisan doing Aari embroidery work', 'src' => 'embroidery_closeup.png'],
            ['title' => 'Designer Sleeve Work', 'desc' => 'Neat scalloped patterns on puff sleeves', 'src' => 'user_design_4.png'],
            ['title' => 'Custom Bridal Designs', 'desc' => 'A premium grid of our custom design collections', 'src' => 'user_design_5.jpg']
        ];

        $assets_dir = __DIR__ . '/../assets/images/';
        $uploads_dir = __DIR__ . '/../uploads/gallery/';

        // Create uploads folder if missing
        if (!file_exists($uploads_dir)) {
            mkdir($uploads_dir, 0755, true);
        }

        $ins_stmt = $pdo->prepare("INSERT INTO gallery (title, description, image_name, status) VALUES (?, ?, ?, 1)");

        foreach ($defaults as $item) {
            $src_file = $assets_dir . $item['src'];
            $new_name = 'gd_seed_' . $item['src'];
            $dest_file = $uploads_dir . $new_name;

            if (file_exists($src_file)) {
                if (copy($src_file, $dest_file)) {
                    $ins_stmt->execute([$item['title'], $item['desc'], $new_name]);
                }
            }
        }
    }

} catch (PDOException $e) {
    // Graceful error display if MySQL connection fails
    die("Database Connection Error: " . $e->getMessage() . "<br><small>Please verify that XAMPP/WAMP (MySQL server) is active and running on your local machine.</small>");
}
?>
