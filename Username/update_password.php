<?php
include "connect.php"; // koneksi ke database

$email = $_POST['email'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Cek apakah password sama
if ($new_password !== $confirm_password) {
    echo "Password tidak sama. <a href='reset_password.php'>Coba lagi</a>";
    exit;
}

// Update password di database
$sql = "UPDATE users SET password='$new_password' WHERE email='$email' OR username='$email'";
$result = $conn->query($sql);

if ($conn->affected_rows > 0) {
    echo "Password berhasil diupdate. <a href='form_login.php'>Login sekarang</a>";
} else {
    echo "Gagal update password. Pastikan email/username benar.";
}

$conn->close();
?>
