<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Informasi Lowongan Kerja</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f6f8;
    }

    .navbar {
      background-color: #1e3a8a !important; /* Dark blue */
    }

    .navbar-brand,
    .navbar-nav .nav-link {
      color: #ffffff !important;
    }

    .navbar-nav .nav-link.active {
      font-weight: bold;
      text-decoration: underline;
    }

    .hero {
      background: url('img/banner-job.jpg') center center / cover no-repeat;
      height: 90vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      position: relative;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background-color: rgba(30, 58, 138, 0.6); /* dark blue overlay */
    }

    .hero-content {
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero a.btn-warning {
      background-color: #fbbf24; /* amber */
      border: none;
    }

    .hero a.btn-warning:hover {
      background-color: #f59e0b;
    }

    footer {
      background-color: #e2e8f0;
      padding: 1rem;
      text-align: center;
      border-top: 1px solid #cbd5e1;
      color: #333;
    }
  </style>
</head>
<body>

<!-- Navigasi -->
<nav class="navbar navbar-expand-lg">
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

<!-- Hero Section -->
<div class="hero">
  <div class="hero-content">
    <h1>Cari Pekerjaan Impianmu</h1>
    <p class="lead mt-3">Lowongan dari berbagai perusahaan di Indonesia</p>
    <a href="lowongan.php" class="btn btn-lg btn-warning mt-4 px-4">Lihat Lowongan</a>
  </div>
</div>

<!-- Footer -->
<footer>
  <p>&copy; <?= date('Y') ?> Informasi Lowongan Kerja.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
