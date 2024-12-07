<?php
session_start();

// Memeriksa apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    // Redirect ke halaman login dengan pesan kesalahan
    header("Location: ../login/index.php?error=unauthorized");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>User Dashboard</h1>
        <p>Selamat datang, <?= $_SESSION['username']; ?>.</p>
        <a href="../proses/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
