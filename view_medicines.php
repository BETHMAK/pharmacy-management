<?php

require_once 'includes/functions.php';

// Check if the user is logged in

// Get all medicines
$medicines = getAllMedicines();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Medicines - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages">    
    <h1>View All Medicines</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Prescription</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($medicines as $medicine) { ?>
                <tr>
                    <td><?php echo $medicine['name']; ?></td>
                    <td><?php echo $medicine['prescription']; ?></td>
                    <td><?php echo $medicine['price']; ?></td>
                    <td><?php echo $medicine['quantity']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>