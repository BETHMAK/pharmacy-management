<?php
require_once 'includes/functions.php';

// Get all clients
$clients = getAllClients();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Clients - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages">
    <h1>Clients</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client) { ?>
                <tr>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td><?php echo $client['phone']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>