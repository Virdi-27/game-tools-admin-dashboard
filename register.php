<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scriptify - Register</title>
  <link rel="stylesheet" href="assets/css/auth.css">
  <link rel="stylesheet" href="assets/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
 
  </style>
</head>
<body>

<div class="container register-container">
  <div class="left">
    <div class="logo">
      <h2>Scriptify</h2>
    </div>

    <div class="form-box">
      <h1>Create Account</h1>
      <p>Join us to start managing your tasks</p>

      <form action="process/register_process.php" method="POST">
        <?php if(isset($_GET['error']) && $_GET['error'] == 'email'): ?>

<div class="alert-error">
    Email sudah digunakan!
</div>

<?php endif; ?>
        <?php if(isset($_GET['error']) && $_GET['error'] == 'password'): ?>

<div class="alert-error">
    Confirm password tidak cocok!
</div>

<?php endif; ?>
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Create a password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="Repeat your password" required>

        <button type="submit" name="register" class="login">Sign Up</button>

        <div class="or">Or register with</div>

        <button type="button" class="btn-sosial">
          <i class="fa-brands fa-google"></i> Sign up with Google
        </button>

        <div class="signup">
          Already have an account? <a href="index.php">Log In</a>
        </div>
      </form>
    </div>
  </div>

  <div class="right">
    <div class="illustration">
      <img src="assets/images/auth-side-banner.webp" alt="Register Illustration">
    </div>
  </div>

</div>

</body>
</html>