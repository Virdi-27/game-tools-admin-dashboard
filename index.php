<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scriptify - Login</title>
  <link rel="stylesheet" href="assets/css/auth.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="left">
    <div class="logo">
      <h2>Scriptify</h2>
    </div>

    <div class="form-box">
      <h1>Welcome Back!</h1>
      <p>Please enter login details below</p>

      <form action="process/login_process.php" method="POST">
        <?php if(isset($_GET['register']) && $_GET['register'] == 'success'): ?>
        <div class="alert-success">Registrasi berhasil! Silakan login.</div>
        <?php endif; ?>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'invalid'): ?>
          <div class="alert-error">
             Email atau password salah! Silakan coba lagi.
          </div>
        <?php endif; ?>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter the email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter the Password" required>

        <div class="forgot">
          <a href="#">Forgot password?</a>
        </div>

        <button type="submit" class="login">Sign in</button>

        <div class="or">Or continue</div>

        <button type="button" class="btn-sosial">
          <i class="fa-brands fa-google"></i> Log in with Google
        </button>

        <div class="signup">
          Don’t have an account? <a href="register.php">Sign Up</a>
        </div>

      </form>
    </div>

  </div>

  <div class="right">
    <div class="illustration">
      <img src="assets/images/auth-side-banner.webp" alt="Login Illustration">
    </div>
  </div>

</div>

</body>
</html>