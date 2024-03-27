<?php
require_once 'config.php';

// Add a new medicine
function addMedicine($name, $prescription, $price, $quantity) {
    global $conn;
    $sql = "INSERT INTO medicines (name, prescription, price, quantity) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $name, $prescription, $price, $quantity);
    return $stmt->execute();
}

// Remove a medicine
function removeMedicine($id) {
    global $conn;
    $sql = "DELETE FROM medicines WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
// remove a sales report
function removeSales($id) {
    global $conn;
    $sql = "DELETE FROM sales WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
// Search for medicines
function searchMedicines($query) {
    global $conn;
    $sql = "SELECT * FROM medicines WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    $search = "%$query%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get all medicines
function getAllMedicines() {
    global $conn;
    $sql = "SELECT * FROM medicines";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Record a sale
function recordSale($medicineId, $quantity , $pharmacistId, $clientId) {
    global $conn;

    // Get the medicine price
    $sql = "SELECT price FROM medicines WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $medicineId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $price = $row['price'];

    // Calculate the total amount
    $totalAmount = $price * $quantity;

// Insert the sale record
    $sql = "INSERT INTO sales (medicine_id, quantity, total_amount, sale_date, pharmacist_id, client_id) VALUES (?, ?, ?, NOW(), ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iidii", $medicineId, $quantity, $totalAmount, $pharmacistId, $clientId);
    return $stmt->execute();
}
// Get all sales records
function getAllSalesRecords() {
    global $conn;
    $sql = "SELECT s.id, m.name AS medicine_name, s.quantity, s.sale_date
            FROM sales s
            JOIN medicines m ON s.medicine_id = m.id
            ORDER BY s.sale_date DESC";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Add a new pharmacist
function addPharmacist($name, $email, $phone) {
    global $conn;
    $sql = "INSERT INTO pharmacists (name, email, phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $phone);
    return $stmt->execute();
}

// Add a new client
function addClient($name, $email, $phone) {
    global $conn;
    $sql = "INSERT INTO clients (name, email, phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $phone);
    return $stmt->execute();
}

// Get all pharmacists
function getAllPharmacists() {
    global $conn;
    $sql = "SELECT * FROM pharmacists";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Get all clients
function getAllClients() {
    global $conn;
    $sql = "SELECT * FROM clients";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}