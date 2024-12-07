<?php
include '../proses/db.php';
session_start();

// Memeriksa apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirect ke halaman login dengan pesan kesalahan
    header("Location: ../login/index.php?error=unauthorized");
    exit();
}

// Periksa apakah ID pengguna tersedia
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?error=invalid_user");
    exit();
}

$user_id = mysqli_real_escape_string($config, $_GET['id']);

// Ambil data pengguna yang akan diedit
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($config, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: index.php?error=user_not_found");
    exit();
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data Pengguna</title>
    <link rel="stylesheet" href="../assets/css/admin.css?v=<?php echo time(); ?>" />
  </head>
  <body>
    <nav class="navbar">
      <a href="#" class="navbar-brand">Edit Data Pengguna</a>

      <ul class="navbar-menu">
        <li><a href="index.php">Kembali</a></li>
      </ul>
    </nav>

    <div class="container">
      <div class="admin-panel">
        <div class="header">
          <h2>Formulir Edit Pengguna</h2>
        </div>

        <form action="../proses/process_edit.php" method="POST" autocomplete="off" class="form-tambah">
          <!-- Input tersembunyi untuk ID pengguna -->
          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

          <div class="form-group">
            <label for="username">Username</label>
            <input 
              type="text" 
              name="username" 
              id="username" 
              class="form-control" 
              minlength="4" 
              autocomplete="off" 
              required 
              value="<?php echo htmlspecialchars($user['username']); ?>"
            />
          </div>

          <div class="form-group">
            <label for="name">Name</label>
            <input 
              type="text" 
              name="name" 
              id="name" 
              class="form-control" 
              minlength="4" 
              autocomplete="off" 
              required 
              value="<?php echo htmlspecialchars($user['name']); ?>"
            />
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input 
              type="email" 
              name="email" 
              id="email" 
              class="form-control" 
              autocomplete="off" 
              required 
              value="<?php echo htmlspecialchars($user['email']); ?>"
            />
          </div>

          <div class="form-group">
            <label for="password">Password Baru (Kosongkan jika tidak diubah)</label>
            <input 
              type="password" 
              name="password" 
              id="password" 
              class="form-control" 
              minlength="4" 
              autocomplete="off" 
              placeholder="Kosongkan jika tidak ingin mengganti password"
            />
          </div>

          <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control">
              <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
              <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Perbarui Data</button>
            <a href="index.php" class="btn btn-secondary">Batalkan</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>