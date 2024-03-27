<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'includes/functions.php';

// handle removal of sales
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (removeSales($id)) {
        $success = 'sales removed successfully';
    } else {
        $error = 'Error removing sales';
    }
}

// Get all sales records
$salesRecords = getAllSalesRecords();

// Handle request to view receipt
if (isset($_GET['receipt'])) {
    $receiptId = $_GET['receipt'];
    // Code to retrieve and display the receipt details for the given ID
    $sql = "SELECT s.id, m.name AS medicine_name, s.quantity, s.total_amount, s.created_at
    FROM sales s
    JOIN medicines m ON s.medicine_id = m.id
    WHERE s.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $receiptId);
$stmt->execute();
$result = $stmt->get_result();
$receiptDetails = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Sales - Pharmacy Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<body class="other-pages"> 
    <h1>Sales</h1>
    <?php if (isset($receiptDetails)) { ?>
        <h2>Receipt Details</h2>
        <!-- Display receipt details -->
        <div class="receipt">
            <p><strong>Sale ID:</strong> <?php echo $receiptDetails['id']; ?></p>
            <p><strong>Medicine:</strong> <?php echo $receiptDetails['medicine_name']; ?></p>
            <p><strong>Quantity:</strong> <?php echo $receiptDetails['quantity']; ?></p>
            <p><strong>Total Amount:</strong> <?php echo $receiptDetails['total_amount']; ?></p>
            <p><strong>Date:</strong> <?php echo $receiptDetails['created_at']; ?></p>
        </div>
    <?php } else { ?>
        <h2></h2>
        <table id="sales-table">
            <thead>
                <tr>
                    <th>Sale ID</th>
                    <th>Medicine</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salesRecords as $sale) { ?>
                    <tr>
                        <td><?php echo $sale['id']; ?></td>
                        <td><?php echo $sale['medicine_name']; ?></td>
                        <td><?php echo $sale['quantity']; ?></td>
                        <td><?php echo $sale['sale_date']; ?></td>
                        <td><a href="?receipt=<?php echo $sale['id']; ?>">View Receipt</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    
    <script src="assets/js/scripts.js"></script>
</body>
</body>

    <h1></h1>
    <?php if (isset($success)) { echo '<p>' . $success . '</p>'; } ?>
    <?php if (isset($error)) { echo '<p>' . $error . '</p>'; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="id">Select sales Record:</label>
        <select id="id" name="id" required>
        <?php foreach ($salesRecords as $sale) { ?>
                <option value="<?php echo $sale['id']; ?>"><?php echo $sale['medicine name']; ?></option>
            <?php } ?>
        </select>
        <button type="submit">Remove sales record</button>
    </form>
    <a href="home.php">Back to Home</a>
 </body>
</html>