<?php
include 'db.php'; // Include file config.php

// Ambil ID pengguna dari parameter GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Pastikan ID pengguna valid
if ($id > 0) {
    // Query untuk mengambil data pengguna berdasarkan ID
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($config, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Kirim data dalam format JSON
        echo json_encode(array(
            'name' => $user['name'],
            'username' => $user['username'],
            'email' => $user['email'],
            'password' => $user['password'],
            'role' => $user['role']
        ));
    } else {
        echo json_encode(array('error' => 'User not found.'));
    }
} else {
    echo json_encode(array('error' => 'Invalid user ID.'));
}
?>
