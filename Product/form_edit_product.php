<?php
include 'connect.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data produk
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<h2>Update Product</h2>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Name:<br>
    <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
    Description:<br>
    <textarea name="desc"><?= $row['description'] ?></textarea><br><br>
    Price:<br>
    <input type="text" name="price" value="<?= $row['price'] ?>"><br><br>
    <input type="submit" value="Update Product">
</form>

<?php
$conn->close(); 