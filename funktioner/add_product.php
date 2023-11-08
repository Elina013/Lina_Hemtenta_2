<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hämta formulärdata från POST
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    // Anslut till din MySQL-databas
    $conn = new mysqli("localhost", "användarnamn", "lösenord", "crud_app");

    // Kontrollera anslutningen
    if ($conn->connect_error) {
        die("Anslutningen misslyckades: " . $conn->connect_error);
    }

    // Skapa en SQL-fråga för att lägga till produkten
    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "Produkten har lagts till framgångsrikt.";
    } else {
        echo "Fel vid tillägg av produkt: " . $conn->error;
    }

    // Stäng anslutningen
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lägg till produkt</title>
</head>
<body>
    <h1>Lägg till produkt</h1>
    <form method="post" action="add_product.php">
        <label for="name">Namn:</label>
        <input type="text" name="name" required><br>
        <label for="description">Beskrivning:</label>
        <textarea name="description" rows="4" required></textarea><br>
        <label for="price">Pris:</label>
        <input type="number" name="price" step="0.01" required><br>
        <label for="image">Bild (URL):</label>
        <input type="text" name="image"><br>
        <input type="submit" value="Lägg till">
    </form>
</body>
</html>

