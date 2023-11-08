<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];

    // Anslut till din MySQL-databas
    $conn = new mysqli("localhost", "användarnamn", "lösenord", "crud_app");

    // Kontrollera anslutningen
    if ($conn->connect_error) {
        die("Anslutningen misslyckades: " . $conn->connect_error);
    }

    // Ta bort produkten från databasen
    $sql = "DELETE FROM products WHERE id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Produkten har tagits bort framgångsrikt.";
    } else {
        echo "Fel vid borttagning av produkt: " . $conn->error;
    }

    // Stäng anslutningen
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ta bort produkt</title>
</head>
<body>
    <h1>Ta bort produkt</h1>
    <form method="post" action="delete_product.php">
        <label for="product_id">Produkt-ID:</label>
        <input type="number" name="product_id" required><br>
        <input type="submit" value="Ta bort">
    </form>
</body>
</html>
