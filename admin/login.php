<?php
// Admin Login Page
require_once __DIR__ . '/../includes/db.php';

// Redirect if already logged in
if (isset($_SESSION['admin_user'])) {
    header("Location: dashboard.php");
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password)) {
        try {
            // Retrieve admin details using prepared statement to prevent SQL injection
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            // Verify password using native bcrypt hashing checks
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['admin_user'] = $user['username'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error_message = 'Invalid username or password.';
            }
        } catch (PDOException $e) {
            $error_message = 'Database error: ' . $e->getMessage();
        }
    } else {
        $error_message = 'Please fill in all fields.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Gramathu Design</title>
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --maroon-dark: #3F000B;
            --maroon-primary: #72001A;
            --gold-primary: #D4AF37;
            --gold-light: #F4D068;
            --gold-dark: #AA7C11;
            --cream: #FFFDF0;
            --light-beige: #FAF6ED;
            --white: #FFFFFF;
            --transition-smooth: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--maroon-dark) 0%, var(--maroon-primary) 50%, #200005 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        /* Gold Particles Background simulation */
        .glow-orb {
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .orb-1 { top: 10%; left: 10%; }
        .orb-2 { bottom: 10%; right: 10%; }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 45px 35px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 10;
        }

        .login-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .login-logo {
            font-size: 32px;
            color: var(--gold-primary);
            margin-bottom: 8px;
        }

        .login-title {
            font-family: 'Playfair Display', serif;
            color: var(--white);
            font-weight: 700;
            font-size: 28px;
            letter-spacing: 0.5px;
        }

        .login-subtitle {
            font-size: 13px;
            color: var(--soft-pink);
            opacity: 0.7;
        }

        .form-label-custom {
            color: var(--gold-light);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .form-control-custom {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 12px !important;
            color: var(--white) !important;
            padding: 12px 18px !important;
            font-size: 14px !important;
            transition: var(--transition-smooth) !important;
        }

        .form-control-custom:focus {
            box-shadow: 0 0 12px rgba(212, 175, 55, 0.3) !important;
            border-color: var(--gold-primary) !important;
            background: rgba(255, 255, 255, 0.12) !important;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-primary) 50%, var(--gold-light) 100%);
            color: var(--maroon-dark) !important;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 14px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.35);
            transition: var(--transition-smooth);
            width: 100%;
            position: relative;
            overflow: hidden;
            margin-top: 15px;
        }

        .btn-login::after {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 30%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.35) 50%, rgba(255, 255, 255, 0) 100%);
            transform: skewX(-25deg);
            transition: var(--transition-smooth);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(212, 175, 55, 0.55);
        }

        .btn-login:hover::after {
            left: 150%;
            transition: all 0.8s ease-in-out;
        }

        .footer-note {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.5);
        }

        .footer-note a {
            color: var(--gold-light);
            text-decoration: none;
        }

        .footer-note a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Background Orbs -->
    <div class="glow-orb orb-1"></div>
    <div class="glow-orb orb-2"></div>

    <!-- Login Container -->
    <div class="login-card">
         <div class="login-header text-center">
            <div class="mb-3">
                <img src="../assets/images/favicon.png"
                    alt="Gramathu Design Logo"
                    class="img-fluid rounded-circle border border-warning shadow p-2"
                    style="width:120px; height:120px; object-fit:cover;">
            </div>

            <h2 class="login-title">Gramathu Design</h2>
            <p class="login-subtitle">Boutique Administrator Login</p>
        </div>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger border-0 text-white rounded-3 bg-danger bg-opacity-75 py-2 px-3 mb-4 text-center" style="font-size: 13px;" role="alert">
                <i class="fa-solid fa-triangle-exclamation me-2"></i><?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label form-label-custom">Username</label>
                <input type="text" class="form-control form-control-custom" id="username" name="username" required placeholder="e.g. admin">
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label form-label-custom">Password</label>
                <input type="password" class="form-control form-control-custom" id="password" name="password" required placeholder="••••••••">
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fa-solid fa-right-to-bracket me-2"></i>Sign In
            </button>
        </form>

        <div class="footer-note">
            Back to <a href="../index.php">Public Website</a>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
