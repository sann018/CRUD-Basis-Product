<?php

// create connection
include 'connect.php';

echo "<br>";

// Read one record
$sql = "SELECT * FROM products WHERE id=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "ID: " . $row['id'] . "<br>";
echo "Name: " . $row['name'] . "<br>";
echo "Description: " . $row['description'] . "<br>";
echo "Price: " . $row['price'] . "<br>";   
echo "Created: " . $row['created'] . "<br>";

echo "<br>";

echo "<a href='from_input_product.php'>Add Prodcut</a>";
//table format
echo "<table = border='1'>
    <tr>
    <th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Created</th>
    </tr>
    <tr>
    <td>" . $row['id'] . "</td> 
    <td>" . $row['name'] . "</td>
    <td>" . $row['description'] . "</td>
    <td>" . $row['price'] . "</td>
    <td>" . $row['created'] . "</td>
    </tr>
</table>";

// Close connection
$conn->close();
?>