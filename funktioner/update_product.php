<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $new_price = $_POST["new_price"];
    $new_image = $_POST["new_image"];

    // Anslut till din MySQL-databas
    $conn = new mysqli("localhost", "användarnamn", "lösenord", "crud_app");

    // Kontrollera anslutningen
    if ($conn->connect_error) {
        die("Anslutningen misslyckades: " . $conn->connect_error);
    }

    // Uppdatera pris och bild för produkten
    $sql = "UPDATE products SET price='$new_price', image='$new_image' WHERE id='$product_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Produkten har uppdaterats framgångsrikt.";
    } else {
        echo "Fel vid uppdatering av produkt: " . $conn->error;
    }

    // Stäng anslutningen
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ändra pris/bild på produkt</title>
</head>
<body>
    <h1>Ändra pris/bild på produkt</h1>
    <form method="post" action="update_product.php">
        <label for="product_id">Produkt-ID:</label>
        <input type="number" name="product_id" required><br>
        <label for="new_price">Nytt pris:</label>
        <input type="number" name="new_price" step="0.01" required><br>
        <label for="new_image">Ny bild (URL):</label>
        <input type="text" name="new_image"><br>
        <input type="submit" value="Uppdatera">
    </form>
</body>
</html>
