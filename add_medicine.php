<?php

require_once 'includes/functions.php';

// Check if the user is logged in



// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $prescription = $_POST['prescription'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    if (addMedicine($name, $prescription, $price, $quantity)) {
        $success = 'Medicine added successfully';
    } else {
        $error = 'Error adding medicine';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Medicine - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages">
    <h1>Add Medicine</h1>
    <?php if (isset($success)) { echo '<p>' . $success . '</p>'; } ?>
    <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="prescription">Prescription:</label>
        <input type="text" id="prescription" name="prescription" required>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit">Add Medicine</button>
    </form>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
    </body>
</body>
</html>