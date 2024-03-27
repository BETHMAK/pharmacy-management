<?php

require_once 'includes/functions.php';


// Handle medicine removal
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (removeMedicine($id)) {
        $success = 'Medicine removed successfully';
    } else {
        $error = 'Error removing medicine';
    }
}

// Get all medicines
$medicines = getAllMedicines();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Remove Medicine - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages"> 
    <h1>Remove Medicine</h1>
    <?php if (isset($success)) { echo '<p>' . $success . '</p>'; } ?>
    <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="id">Select Medicine:</label>
        <select id="id" name="id" required>
            <?php foreach ($medicines as $medicine) { ?>
                <option value="<?php echo $medicine['id']; ?>"><?php echo $medicine['name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit">Remove Medicine</button>
    </form>
    <!-- ... (existing HTML) ... -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="remove-medicine-form">
    <!-- ... (existing form fields) ... -->
</form>
<!-- ... (existing HTML) ... -->
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>