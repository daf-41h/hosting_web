<?php
include 'db.php'; // Pastikan Anda memiliki file koneksi untuk menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Menggunakan hashing untuk keamanan password
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Menggunakan hashing untuk keamanan password
    $role = $_POST['role'];

    // Tambahkan @gmail.com jika email tidak mengandung '@'
    if (strpos($email, '@gmail.co') === false) {
        $email .= '@gmail.com';
    }

    // Memeriksa apakah email sudah digunakan
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result_email = mysqli_query($config, $check_email);
    
    if (mysqli_num_rows($result_email) > 0) {
        echo "<script>
                alert('Email sudah terdaftar, silakan Anda login');
                window.location.assign('../admin/index.php?pesan=email_terdaftar');
              </script>";
    } else {
        // Memeriksa apakah username sudah digunakan
        $check_username = "SELECT * FROM users WHERE username='$username'";
        $result_username = mysqli_query($config, $check_username);

        if (mysqli_num_rows($result_username) > 0) {
            echo "<script>
                    alert('Username yang Anda masukkan sudah terdaftar, harap ubah username Anda');
                    window.location.assign('../admin/index.php?pesan=username_terdaftar');
                  </script>";
        } else {
            // Insert data user ke database
            $sql = "INSERT INTO users (name, username, email, password,  role) VALUES
            ('$name', '$username', '$email', '$password', '$role')";
            
            if (mysqli_query($config, $sql)) {
                echo "<script>
                        alert('Registrasi Berhasil');
                        window.location.assign('../admin/index.php');
                      </script>";
            } else {
                echo "<script>
                        alert('Registrasi Gagal, Silahkan Ulangi Lagi');
                        window.location.assign('../admin/index.php?pesan=gagal');
                      </script>";
            }
        }
    }
}
?>../admin/index