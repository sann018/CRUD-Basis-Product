<?php
// create connectian 
include 'connect.php'; 

//quert delete from product
$sql = "DELETE FROM products WHERE id=" . $_GET['id'];

// check if data is deleted susccessfully
if ($conn->query($sql) === TRUE) {
    //redirect to read_all.php/read_all.php
    header('Location: read_all.php');
    // echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// close connection
$conn->close();
?>