<?php
// Anslut till din MySQL-databas
$conn = new mysqli("localhost", "användarnamn", "lösenord", "crud_app");

// Kontrollera anslutningen
if ($conn->connect_error) {
    die("Anslutningen misslyckades: " . $conn->connect_error);
}

// Hämta alla produkter från databasen
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Se alla produkter</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['name']} - Pris: {$row['price']}</li>";
    }
    echo "</ul>";
} else {
    echo "Inga produkter hittades.";
}

// Stäng anslutningen
$conn->close();
?>
