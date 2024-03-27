-- Create the database
CREATE DATABASE pharmacy_managemen01t;

-- Use the pharmacy_management database
USE pharmacy_management01;

-- Create the medicines table
CREATE TABLE medicines (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    prescription VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL
);

-- Create the pharmacists table
CREATE TABLE pharmacists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL
);

-- Create the clients table
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL
);

-- Create the sales table
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicine_id INT NOT NULL,
    quantity INT NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    sale_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    pharmacist_id INT NOT NULL,
    client_id INT NOT NULL,
    FOREIGN KEY (medicine_id) REFERENCES medicines(id),
    FOREIGN KEY (pharmacist_id) REFERENCES pharmacists(id),
    FOREIGN KEY (client_id) REFERENCES clients(id)
);