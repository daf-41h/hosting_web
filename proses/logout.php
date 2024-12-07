<?php
session_start();

// Hapus semua session
session_unset();
session_destroy();

// Hapus cookies
setcookie('id', '', time() - 86400, '/');
setcookie('username', '', time() - 86400, '/');

// Redirect ke halaman login
header("Location: ../index.php");
exit;
?>