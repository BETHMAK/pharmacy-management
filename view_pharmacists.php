<?php
require_once 'includes/functions.php';

// Get all pharmacists
$pharmacists = getAllPharmacists();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Pharmacists - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages">
    <h1>Pharmacists</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pharmacists as $pharmacist) { ?>
                <tr>
                    <td><?php echo $pharmacist['name']; ?></td>
                    <td><?php echo $pharmacist['email']; ?></td>
                    <td><?php echo $pharmacist['phone']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>