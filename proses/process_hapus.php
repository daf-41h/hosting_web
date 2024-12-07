<?php
session_start();

// Sertakan file koneksi database
include 'db.php';

// Periksa apakah ID tersedia
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: ../admin/index.php?error=invalid_user");
    exit();
}

// Hindari SQL Injection dengan menggunakan prepared statement
$id = mysqli_real_escape_string($config, $_GET['id']);

// Cek apakah yang akan dihapus adalah admin terakhir
$cek_admin = mysqli_query($config, "SELECT COUNT(*) as total_admin FROM users WHERE role = 'admin'");
$admin = mysqli_fetch_assoc($cek_admin);

// Cek role pengguna yang akan dihapus
$cek_role = mysqli_query($config, "SELECT role FROM users WHERE id = '$id'");
$user_role = mysqli_fetch_assoc($cek_role);

// Jika yang akan dihapus adalah admin dan hanya ada satu admin
if ($user_role['role'] === 'admin' && $admin['total_admin'] <= 1) {
    header("Location: ../admin/index.php?error=cant_delete_last_admin");
    exit();
}

// Siapkan query untuk menghapus pengguna menggunakan prepared statement
$query_hapus = "DELETE FROM users WHERE id = ?";
$stmt = mysqli_prepare($config, $query_hapus);
mysqli_stmt_bind_param($stmt, "i", $id);

// Eksekusi query
if (mysqli_stmt_execute($stmt)) {
    // Jika berhasil dihapus
    $_SESSION['pesan_sukses'] = "Pengguna berhasil dihapus.";
    header("Location: ../admin/index.php?status=success");
} else {
    // Jika gagal menghapus
    $_SESSION['pesan_error'] = "Gagal menghapus pengguna. " . mysqli_error($config);
    header("Location: ../admin/index.php?status=error");
}

// Tutup statement dan koneksi
mysqli_stmt_close($stmt);
mysqli_close($config);
exit();
?>