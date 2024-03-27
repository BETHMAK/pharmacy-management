<?php
require_once 'includes/auth.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="login-page">
    <h1>EYE SCOPE PHARMACY</h1>
    <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    
    <script src="assets/js/scripts.js"></script>
 </body>   
</body>
</html>