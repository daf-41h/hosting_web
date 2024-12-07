<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Register</title>
    <link rel="stylesheet" href="../assets/css/log.css?v=<?php echo time();?>" />
  </head>

  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="../proses/process_login.php" method="POST" autocomplete="off" class="sign-in-form">
              <div class="logo">
                <a href="#">Daf-<span>41h</span></a>
              </div>

              <div class="heading_login">
                <h2>Selamat Datang Kembali</h2>
                <h6>Not registred yet?</h6>
                <a href="#" class="toggle">Sign up</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" name="login_credential" id="login_credential" minlength="4" class="input-field" autocomplete="off" required
                  />
                  <label for="login_credential">Username</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" id="password" minlength="4" class="input-field" autocomplete="off" required
                  />
                  <label for="password">Password</label>
                </div>
                
                <div class="remember-me">
                  <input type="checkbox" name="remember_me" id="remember_me" />
                  <label for="remember_me">Ingatkan saya</label>
                </div>

                <input type="submit" value="Sign In" class="sign-btn" />
                <a href="../landing_page/index.php" class="back-btn">Kembali</a>
              </div>
            </form>

            <form action="../proses/process_register.php" method="POST" autocomplete="off" class="sign-up-form">
              <div class="logo">
                <a href="#">Daf-<span>41h</span></a>
              </div>

              <div class="heading">
                <h2>Get Started</h2>
                <h6>Already have an account?</h6>
                <a href="#" class="toggle">Sign in</a>
              </div>

              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" name="username" id="username" minlength="4" class="input-field" autocomplete="off" required />
                  <label for="username">Username</label>
                </div>
                <div class="input-wrap">
                  <input type="text" name="name" id="name" minlength="4" class="input-field" autocomplete="off" required />
                  <label for="name">Name</label>
                </div>

                <div class="input-wrap">
                  <input type="email" name="email" id="email" class="input-field" autocomplete="off" required />
                  <label for="email">Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" id="password" minlength="4" class="input-field" autocomplete="off" required
                  />
                  <label for="password">Password</label>
                </div>

                <input type="submit" value="Sign Up" class="sign-btn" />
                <a href="../landing_page/index.html" class="back-btn">Kembali</a>

                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="../assets/img/image1.png" class="image img-1 show" alt="" />
              <img src="../assets/img/image2.png" class="image img-2" alt="" />
              <img src="../assets/img/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Create your own courses</h2>
                  <h2>Customize as you like</h2>
                  <h2>Invite students to your class</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="../assets/js/app.js?v=<?php echo time(); ?>"></script>
  </body>
</html>
