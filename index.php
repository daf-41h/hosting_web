<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <title>Home</title>
</head>
<body>
  <header class="header">
    <nav>
      <div class="nav__bar">
        <div class="logo">
          <a href="#">Daf-<span>41h</span></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="landing_page/index.php">Mulai Simulasi</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Galerry</a></li>
        <li><a href="#">Kontak</a></li>
        <li class="login-item"><a href="login/index.php">Login</a></li>
      </ul>      
      <a class="btn nav__btn" href="login/index.php">Login</a>
    </nav>
    <div class="header__container" id="home">
      <p>Web Crud Simpel</p>
      <h1>
        Selamat Datang Di Project Website Crud. Website Ini Hanya Untuk <span>Latihan</span> Dan <span>Tugas Sekolah</span> Saja Jika Ingin Mencoba Project Saya Silahkan Untuk <span>Username</span> Dan <span>Password</span> ada di bawah ini:.
      </h1>
    </div>
    <div class="cards__container">
      <div class="card user-card">
        <h4>User</h4>
        <p>Email: <span>user@user.com</span></p>
        <p>Password: <span>user123</span></p>
      </div>
      <div class="card admin-card">
        <h4>Admin</h4>
        <p>Email: <span>admin@admin.com</span></p>
        <p>Password: <span>admin123</span></p>
      </div>
    </div>
  </header>

  <footer class="footer">
    <div class="footer__container">
      <p>&copy; 2024 Daf-41h. All Rights Reserved.</p>
    </div>
  </footer>
  <script src="script.js?v=<?php echo time(); ?>"></script>
</body>
</html>