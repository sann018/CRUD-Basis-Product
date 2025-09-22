<?php
include 'connect.php'; // hanya buat koneksi, tidak ada query di sini

//get data dari form
$prodid = $_POST['id'];
$prodname = $_POST['name'];
$proddesc = $_POST['desc'];
$prodprice = $_POST['price'];

// echo "Prroduct name: $prodname <br>";
// echo "Product description: $proddesc <br>";
// echo "Product price: $prodprice <br>";    

// update data
$sql = "UPDATE products 
            SET name='$prodname', 
                description='$proddesc', 
                price='$prodprice' 
            WHERE id=" . $_POST['id'];

if ($conn->query($sql) === TRUE) {
    //redirect to read_all.php/read_all.php
    header('Location: read_all.php');
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
