<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi Lowongan Kerja</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
</head>
<body>

<!-- Navigasi -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Informasi Lowongan Kerja</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="lowongan.php">Lowongan</a></li>
        <li class="nav-item"><a class="nav-link" href="profil.php">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Register/Login</a></li>
        <li class="nav-item"><a class="nav-link" href="informasi.php">Informasi Umum</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="text-center">
    <h1>Selamat Datang di Portal Lowongan Kerja</h1>
    <p class="lead">Temukan pekerjaan impian Anda dengan cepat dan mudah.</p>
    <a href="lowongan.php" class="btn btn-success mt-3">Lihat Lowongan Sekarang</a>
  </div>
</div>

<footer class="bg-light text-center py-3 mt-5">
  <p class="mb-0">&copy; <?= date('Y') ?> Informasi Lowongan kerja </p>
</footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
