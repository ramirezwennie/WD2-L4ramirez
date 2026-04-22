<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Prevent back button access
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out - SocialHub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="logout-body">
    <div class="logout-container">
        <div class="logout-card">
            <div class="checkmark">✅</div>
            <h1>Thank you for using SocialHub!</h1>
            <p>You have been successfully logged out.</p>
            <a href="index.php" class="login-again-btn">Login Again</a>
        </div>
    </div>

    <script>
        // Prevent back button navigation
        history.pushState(null, null, location.href);
        window.onpopstate = function () {
            history.go(1);
        };

        // Redirect to login after 3 seconds
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 3000);
    </script>
</body>
</html>