<?php
session_start();

// Memeriksa apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect ke halaman login dengan pesan kesalahan
    header("Location: ../login/index.php?error=unauthorized");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Pengguna</title>
    <link rel="stylesheet" href="../assets/css/admin.css?v=<?php echo time(); ?>" />
  </head>
  <body>
    <nav class="navbar">
      <a href="#" class="navbar-brand">Tambah Data Pengguna</a>

      <ul class="navbar-menu">
        <li><a href="index.php">Kembali</a></li>
      </ul>
    </nav>

    <div class="container">
      <div class="admin-panel">
        <div class="header">
          <h2>Formulir Tambah Pengguna Baru</h2>
        </div>
<!-- class="form-control" -->
        <form action="../proses/process_tambah.php" method="POST" autocomplete="off" class="form-tambah">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" minlength="4" autocomplete="off" required class="form-control"/>
          </div>

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" minlength="4" class="input-field" autocomplete="off" required />
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" class="input-field" autocomplete="off" required />
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" minlength="4" autocomplete="off" required class="form-control" />
          </div>

          <div class="form-group">
            <label for="password">Role</label>
            <select name="role" class="form-control">
              <option value="user" selected>User</option>
              <option value="admin">Admin</option>
            </select>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="admin.php" class="btn btn-secondary">Batalkan</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
