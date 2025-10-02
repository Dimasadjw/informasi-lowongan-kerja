<?php
session_start();
require_once 'koneksi.php';

// Autentikasi Admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  header('Location: login.php');
  exit;
}

// Koneksi dengan PDO
$db = new Database();
$conn = $db->connect();

// Ambil data lowongan
$stmt = $conn->prepare("SELECT * FROM lowongan");
$stmt->execute();
$lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Dashboard Admin</h2>
  <a href="tambah_lowongan.php" class="btn btn-primary mb-3">Tambah Lowongan</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Perusahaan</th>
        <th>Posisi</th>
        <th>Lokasi</th>
        <th>Deskripsi</th>
        <th>Kualifikasi</th>
        <th>Tanggal Kedaluarsa</th>
        <th>Kontak</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($lowongan as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['nama_perusahaan']) ?></td>
        <td><?= htmlspecialchars($row['posisi']) ?></td>
        <td><?= htmlspecialchars($row['lokasi']) ?></td>
        <td><?= htmlspecialchars($row['deskripsi']) ?></td>
        <td><?= htmlspecialchars($row['kualifikasi']) ?></td>
        <td><?= htmlspecialchars($row['tanggal_kadaluarsa']) ?></td>
        <td><?= htmlspecialchars($row['kontak']) ?></td>
        <td>
          <a href="edit_lowongan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus_lowongan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
