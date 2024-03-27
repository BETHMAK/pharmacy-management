<?php
require_once 'includes/auth.php';

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - ANGEL'S PHARMACY</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="home-page">
    <h1>EYE SCOPE PHARMACY</h1>
    <div class="card-container">
        <div class="option-card" style="background-color: #4CAF50;"><a href="add_medicine.php">Add Medicine</a></div>
        <div class="option-card" style="background-color: #f44336;"><a href="remove_medicine.php">Remove Medicine</a></div>
        <div class="option-card" style="background-color: #2196F3;"><a href="search_medicine.php">Search Medicine</a></div>
        <div class="option-card" style="background-color: #FF9800;"><a href="view_medicines.php">View All Medicines</a></div>
        <div class="option-card" style="background-color: #9C27B0;"><a href="make_sale.php">Make Sale</a></div>
        <div class="option-card" style="background-color: #00BCD4;"><a href="view_sales.php">View Sales</a></div>
        <div class="option-card" style="background-color: #673AB7;"><a href="add_pharmacist.php">Add Pharmacist</a></div>
        <div class="option-card" style="background-color: #FF5722;"><a href="add_client.php">Add Client</a></div>
        <div class="option-card" style="background-color: #009688;"><a href="view_pharmacists.php">View Pharmacists</a></div>
        <div class="option-card" style="background-color: #795548;"><a href="view_clients.php">View Clients</a></div>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>
<a href="login.php">LOG OUT</a>
</body>
</html>