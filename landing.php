<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$login_time = $_SESSION['login_time'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dashboard-body">
    <nav class="navbar">
        <div class="nav-brand">
            <h2>📱 SocialHub</h2>
        </div>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="welcome-section">
            <h1>Welcome back, <?php echo htmlspecialchars($user_name); ?>! 👋</h1>
            <div class="session-info">
                <h3>Session Details</h3>
                <div class="session-card">
                    <p><strong>User ID:</strong> <?php echo htmlspecialchars($user_id); ?></p>
                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user_name); ?></p>
                    <p><strong>Login Time:</strong> <?php echo $login_time; ?></p>
                    <p><strong>Session Duration:</strong> 
                        <?php 
                        $login_timestamp = strtotime($login_time);
                        $current_time = time();
                        $duration = floor(($current_time - $login_timestamp) / 60);
                        echo $duration . ' minutes';
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <h3>📸 Posts</h3>
                <p>Create and share your moments</p>
            </div>
            <div class="feature-card">
                <h3>👥 Friends</h3>
                <p>Connect with friends and family</p>
            </div>
            <div class="feature-card">
                <h3>💬 Messages</h3>
                <p>Chat with your connections</p>
            </div>
            <div class="feature-card">
                <h3>📱 Stories</h3>
                <p>Share 24-hour stories</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>