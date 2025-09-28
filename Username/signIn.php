<?php
session_start();
include 'connect.php'; // koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produser = $_POST['username'];
    $prodpass = $_POST['password'];

    // Ambil data user dari database
    $sql = "SELECT * FROM USERS WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $produser);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah username ada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verifikasi password
        if (password_verify($prodpass, $row['password'])) {
            // Simpan data ke session
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            // Redirect ke halaman dashboard / home
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Password salah. <a href='form_login.php'>Coba lagi</a>";
        }
    } else {
        echo "Username tidak ditemukan. <a href='form_register.php'>Register di sini</a>";
    }

    $stmt->close();
}

$conn->close();
?>
