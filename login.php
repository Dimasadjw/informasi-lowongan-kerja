<?php
session_start();
require_once 'koneksi.php';

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // Gunakan prepared statement untuk mencegah SQL Injection
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
  $stmt->execute([
    ':username' => $username,
    ':password' => $password
  ]);

  if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user'] = $user;

    if ($user['role'] === 'admin') {
      header('Location: admin.php');
    } else {
      header('Location: lowongan.php');
    }
    exit;
  } else {
    $error = "Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Portal Lowongan Kerja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }
    .login-box {
      max-width: 400px;
      margin: 80px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .login-box h3 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="login-box">
  <h3 class="text-center text-primary">Login</h3>

  <?php if (isset($error)): ?>
    <div class="alert alert-danger text-center"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST" action="login.php">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required autofocus>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Masuk</button>
    <div class="text-center mt-3">
      <small>Belum punya akun? <a href="register.php">Registrasi</a></small>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
