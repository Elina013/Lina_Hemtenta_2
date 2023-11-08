<?php
$servername = "localhost"; // Ersätt med din databasserver
$username = "användarnamn"; // Ersätt med ditt användarnamn
$password = "lösenord"; // Ersätt med ditt lösenord

// Skapa en anslutning till MySQL-servern
$conn = new mysqli($servername, $username, $password);

// Kontrollera anslutningen
if ($conn->connect_error) {
    die("Anslutningen misslyckades: " . $conn->connect_error);
}

// Skapa databasen "crud_app"
$sql = "CREATE DATABASE crud_app";
if ($conn->query($sql) === TRUE) {
    echo "Databasen crud_app har skapats framgångsrikt.";
} else {
    echo "Fel vid skapande av databas: " . $conn->error;
}

// Använd den nyligen skapade databasen
$conn->select_db("crud_app");

// Skapa tabellen "products"
$sql = "CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabellen 'products' har skapats framgångsrikt.";
} else {
    echo "Fel vid skapande av tabellen: " . $conn->error;
}

// Stäng anslutningen
$conn->close();
?>