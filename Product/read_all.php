<?php
// create connection
include 'connect.php';

// Read all records
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<a href='form_input_product.php'>Add Product</a><br><br>";
    
    // Table format
    echo "<table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created</th>
            <th>Action</th>
        </tr>";

    $no = 1;
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>" . $no++ . "</td>
            <td>" . $row["name"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>" . $row["price"] . "</td>
            <td>" . $row["created"] . "</td>
            <td>
                <a href='form_edit_product.php?id=" . $row["id"] . "'>Edit</a> | 
                <a href='delete.php?id=" . $row["id"] . "' onclick=\"return confirm('Are you sure to delete this record?')\">Delete</a>
            </td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results - Table is empty";
}

// Close connection
$conn->close();
?>
