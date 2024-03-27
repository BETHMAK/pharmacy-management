<?php

require_once 'includes/functions.php';

// Check if the user is logged in


// Handle search query
$medicines = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = $_POST['query'];
    $medicines = searchMedicines($query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Medicine - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages"> 
    <h1>Search Medicine</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="query">Search:</label>
        <input type="text" id="query" name="query" required>
        <button type="submit">Search</button>
    </form>
    <?php if (!empty($medicines)) { ?>
        <h2>Search Results</h2>
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
</table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } ?>
    <a href="home.php">Back to Home</a>
    <script src="assets/js/scripts.js"></script>
</body>
</body>
</html>