<?php
require_once 'includes/functions.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (addPharmacist($name, $email, $phone)) {
        $success = 'Pharmacist added successfully';
    } else {
        $error = 'Error adding pharmacist';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Pharmacist - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages">
    <h1>Add Pharmacist</h1>
    <?php if (isset($success)) { echo '<p>' . $success . '</p>'; } ?>
    <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <button type="submit">Add Pharmacist</button>
    </form>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>