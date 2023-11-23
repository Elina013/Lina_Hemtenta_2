<!DOCTYPE html>
<html>
<head>
    <title>Lägg till produkt</title>
</head>
<body>
    <h1>Lägg till produkt</h1>
    <form action="add_product.php" method="POST">
        <label for="name">Namn:</label>
        <input type="text" name="name" required><br>
        <label for="description">Beskrivning:</label>
        <textarea name="description"></textarea><br>
        <label for="price">Pris:</label>
        <input type="number" name="price" step="0.01" required><br>
        <label for="image">Bild (URL):</label>
        <input type="text" name="image"><br>
        <input type="submit" value="Lägg till">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hämta och sanera användarens inmatning
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_POST["image"];

        // Anslut till databasen och utför en INSERT-query för att lägga till produkten
        try {
            $conn = new PDO("mysql:host=localhost;dbname=crud_app", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (:name, :description, :price, :image)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);

            $stmt->execute();

            echo "Produkten har lagts till framgångsrikt.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
</body>
</html>
