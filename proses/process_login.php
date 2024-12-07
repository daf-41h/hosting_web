<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_credential = $_POST['login_credential']; // Bisa username atau email
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']); // Periksa apakah checkbox dicentang

    // Cek apakah login_credential adalah email atau username
    if (filter_var($login_credential, FILTER_VALIDATE_EMAIL)) {
        // Jika email
        $query = "SELECT * FROM users WHERE email = ?";
    } else {
        // Jika username
        $query = "SELECT * FROM users WHERE username = ?";
    }

    // Menggunakan prepared statement
    $stmt = $config->prepare($query);
    $stmt->bind_param("s", $login_credential);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Data ditemukan
        $data = $result->fetch_assoc();
        if ($password == $data['password']) {
        // if (password_verify($password, $data['password'])) { // Gunakan hash password untuk keamanan
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            // Set cookie jika "Ingatkan Saya" diaktifkan
            if ($remember_me) {
                setcookie('id', $data['id'], time() + 86400, "/"); // Cookie berlaku 1 hari
                setcookie('username', $data['username'], time() + 86400, "/");
            }

            // Redirect berdasarkan role
            if ($data['role'] == 'admin') {
                header('location: ../admin/index.php');
            } elseif ($data['role'] == 'user') {
                header('location: ../user/index.php');
            }
            exit();
        } else {
            // Password salah
            echo "<script>
            alert('Password yang Anda masukkan salah');
            window.location.assign('../login/index.php?pesan=password_salah');
            </script>";
        }
    } else {
        // Username atau email tidak ditemukan
        echo "<script>
        alert('Username atau Email yang Anda masukkan belum terdaftar');
        window.location.assign('../login/index.php?pesan=username_email_salah');
        </script>";
    }
}
?>