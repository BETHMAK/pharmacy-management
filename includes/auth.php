<?php
session_start();

// Set a default username and password for demonstration purposes
$username = 'admin';
$password = 'password';

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === $username && $pass === $password) {
        $_SESSION['logged_in'] = true;
        header('Location: home.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}