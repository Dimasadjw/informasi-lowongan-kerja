<?php
session_start();
require_once 'koneksi.php';

$db = new Database();
$conn = $db->connect();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  header('Location: login.php');
  exit;
}
#pp

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $posisi = $_POST['posisi'];
  $lokasi = $_POST['lokasi'];
  $deskripsi = $_POST['deskripsi'];
  $kualifikasi = $_POST['kualifikasi'];
  $tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
  $kontak = $_POST['kontak'];

  $query = "INSERT INTO lowongan 
    (nama_perusahaan, posisi, lokasi, deskripsi, kualifikasi, tanggal_kadaluarsa, kontak) 
    VALUES (:nama_perusahaan, :posisi, :lokasi, :deskripsi, :kualifikasi, :tanggal_kadaluarsa, :kontak)";

  $stmt = $conn->prepare($query);
  $result = $stmt->execute([
    ':nama_perusahaan' => $nama_perusahaan,
    ':posisi' => $posisi,
    ':lokasi' => $lokasi,
    ':deskripsi' => $deskripsi,
    ':kualifikasi' => $kualifikasi,
    ':tanggal_kadaluarsa' => $tanggal_kadaluarsa,
    ':kontak' => $kontak
  ]);

  if ($result) {
    header('Location: admin.php');
    exit;
  } else {
    echo "<script>alert('Gagal menambahkan lowongan');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Lowongan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 700px;
    }
    .card {
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-label {
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Tambah Lowongan</h4>
    </div>
    <div class="card-body">
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Nama Perusahaan</label>
          <input type="text" name="nama_perusahaan" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Posisi</label>
          <input type="text" name="posisi" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Lokasi</label>
          <input type="text" name="lokasi" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Kualifikasi</label>
          <textarea name="kualifikasi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Kadaluarsa</label>
          <input type="date" name="tanggal_kadaluarsa" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Kontak</label>
          <input type="text" name="kontak" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between">
          <a href="admin.php" class="btn btn-secondary">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
