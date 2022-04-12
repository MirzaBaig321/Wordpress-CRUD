<?php
include("config.php");
$conf = new Config();
$conn = $conf->conn;
$response = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['price']) && $_POST['price'] != null) {
        $sql = "INSERT INTO `wp_price_list` (price) VALUES (" . $_POST['price'] . ");";

        if ($conn->query($sql) === TRUE) {
            $response =  "Price Inserted Successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
if(isset($_GET['price_id'])) {
        $sql = "DELETE FROM `wp_price_list` WHERE `id` = " . $_GET["price_id"] . ";";
        if($conn->query($sql)) {
            $response =  "Price Deleted Successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form action="admin.php?page=property_range" method="POST">
        <br>
        <br>
        <br>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="Price...">
        <input type="submit" value="Add Price">
    </form>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID#</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `wp_price_list`;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td> <a href="admin.php?page=property_range&price_id=<?= $row['id']; ?>">Delete</a></td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</body>

</html>
<?php
    echo("<br><br>" . $response);
?>