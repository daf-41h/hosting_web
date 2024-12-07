<?php
// Sertakan file koneksi database
include '../proses/db.php';

session_start();

// Memeriksa apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect ke halaman login dengan pesan kesalahan
    header("Location: ../login/index.php?error=unauthorized");
    exit();
}

// Query untuk mengambil semua data pengguna
$query = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($config, $query);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css?v=<?php echo time(); ?>" />
  </head>
  <body>
    <nav class="navbar">
      <a href="#" class="navbar-brand">Admin Dashboard</a>
      <ul class="navbar-menu">
        <li><a href="../proses/logout.php" class="btn btn-danger">Logout</a></li>
      </ul>
    </nav>

    <div class="container">
      <div class="admin-panel">
        <div class="header">
          <h2>Data Pengguna</h2>
          <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            // Cek apakah ada data
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                // Tampilkan data dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "<td>
                            <a href='edit.php?id=" . $row['id'] . "' class='btn btn-secondary'>Edit</a>
                            <a href='../proses/process_hapus.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pengguna ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                // Tampilkan pesan jika tidak ada data
                echo "<tr><td colspan='5' class='text-center'>Tidak ada data pengguna</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>