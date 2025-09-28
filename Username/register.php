<?php
include 'connect.php'; 

$produser = $_POST['username'];
$prodpass = $_POST['password'];
$prodconfirm = $_POST['confirmPassword'];
$prodfullname = $_POST['fullName'];

$hashedPassword = password_hash($prodpass, PASSWORD_DEFAULT);

$sql = "INSERT INTO USERS (username, password, fullname) 
VALUES ('$produser', '$hashedPassword', '$prodfullname')";

if ($conn->query($sql) === TRUE) {
        echo "Register berhasil. <a href='form_login.php'>Login di sini</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>
