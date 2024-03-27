<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'includes/functions.php';

// Handle sale submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $medicineId = $_POST['medicine'];
    $quantity = $_POST['quantity'];
    $pharmacistId = $_POST['pharmacist'];
    $clientId = $_POST['client'];

    // Record the sale
    if (recordSale($medicineId, $quantity, $pharmacistId, $clientId)) {
        $success = 'Sale recorded successfully';
    } else {
        $error = 'Error recording sale';
    }
}

// Get all medicines, pharmacists, and clients
$medicines = getAllMedicines();
$pharmacists = getAllPharmacists();
$clients = getAllClients();
?>
<!-- ... (existing HTML) ... -->
<!DOCTYPE html>
<html>
<head>
    <title>Make Sale - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages">
    <h1>Make Sale</h1>
    <?php if (isset($success)) { echo '<p>' . $success . '</p>'; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="make-sale-form">
        <label for="medicine">Select Medicine:</label>
        <select id="medicine" name="medicine" required>
            <?php foreach ($medicines as $medicine) { ?>
                <option value="<?php echo $medicine['id']; ?>"><?php echo $medicine['name']; ?></option>
            <?php } ?>
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required>
        <label for="pharmacist">Select Pharmacist:</label>
        <select id="pharmacist" name="pharmacist" required>
            <?php foreach ($pharmacists as $pharmacist) { ?>
                <option value="<?php echo $pharmacist['id']; ?>"><?php echo $pharmacist['name']; ?></option>
            <?php } ?>
        </select>
        <label for="client">Select Client:</label>
        <select id="client" name="client" required>
            <?php foreach ($clients as $client) { ?>
                <option value="<?php echo $client['id']; ?>"><?php echo $client['name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit">Make Sale</button>
    </form>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>