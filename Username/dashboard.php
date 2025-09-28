<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: form_login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>Anda berhasil login ke sistem.</p>

    <a href="logout.php">Logout</a>
</body>
</html>
