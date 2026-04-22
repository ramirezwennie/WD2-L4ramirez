<?php
session_start();

// Sample users data (in production, use MySQL)
$users = [
    'john_doe' => [
        'password' => 'password123',
        'name' => 'John Doe',
        'email' => 'john@example.com'
    ],
    'jane_smith' => [
        'password' => 'mypassword',
        'name' => 'Jane Smith',
        'email' => 'jane@example.com'
    ],
    'admin' => [
        'password' => 'admin123',
        'name' => 'Admin User',
        'email' => 'admin@socialmedia.com'
    ]
];

// Handle login
$error = '';
if ($_POST) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user_id'] = $username;
        $_SESSION['user_name'] = $users[$username]['name'];
        $_SESSION['login_time'] = date('Y-m-d H:i:s');
        header('Location: landing.php');
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <h1>📱 SocialHub</h1>
                <p>Connect with the world</p>
            </div>
            
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST" id="loginForm">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="login-btn">Login</button>
            </form>
            
            <div class="demo-accounts">
                <p><strong>Demo Accounts:</strong></p>
                <p>john_doe / password123</p>
                <p>jane_smith / mypassword</p>
                <p>admin / admin123</p>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>