<?php
include 'connect.php'; // hanya buat koneksi, tidak ada query di sini

$prodname = $_POST['name'];
$proddesc = $_POST['desc'];
$prodprice = $_POST['price'];

// echo "Prroduct name: $prodname <br>";
// echo "Product description: $proddesc <br>";
// echo "Product price: $prodprice <br>";    

// // Insert data
$sql = "INSERT INTO products (name, description, price) 
VALUES ('$prodname', '$proddesc', '$prodprice')";
//VALUES ('$_POST[name]', '$_POST[desc]', '$_POST[price]')";

//('Powerbank', 'Powerbank with 10000 mAh', 150000)

if ($conn->query($sql) === TRUE) {
    //redirect to read_all.php/read_all.php
    header('Location: read_all.php');
    // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
