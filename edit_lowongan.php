<?php
session_start();
require_once 'koneksi.php';

$db = new Database();
$conn = $db->connect();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  header('Location: login.php');
  exit;
}

// Ambil ID lowongan dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
  echo "ID tidak ditemukan.";
  exit;
}

// Ambil data lowongan berdasarkan ID
$stmt = $conn->prepare("SELECT * FROM lowongan WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
  echo "Data lowongan tidak ditemukan.";
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_perusahaan = $_POST['nama_perusahaan'];
  $posisi = $_POST['posisi'];
  $lokasi = $_POST['lokasi'];
  $deskripsi = $_POST['deskripsi'];
  $kualifikasi = $_POST['kualifikasi'];
  $tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
  $kontak = $_POST['kontak'];

  $query = "UPDATE lowongan SET 
              nama_perusahaan = :nama_perusahaan,
              posisi = :posisi,
              lokasi = :lokasi,
              deskripsi = :deskripsi,
              kualifikasi = :kualifikasi,
              tanggal_kadaluarsa = :tanggal_kadaluarsa,
              kontak = :kontak
            WHERE id = :id";

  $stmt = $conn->prepare($query);
  $result = $stmt->execute([
    ':nama_perusahaan' => $nama_perusahaan,
    ':posisi' => $posisi,
    ':lokasi' => $lokasi,
    ':deskripsi' => $deskripsi,
    ':kualifikasi' => $kualifikasi,
    ':tanggal_kadaluarsa' => $tanggal_kadaluarsa,
    ':kontak' => $kontak,
    ':id' => $id
  ]);

  if ($result) {
    header('Location: admin.php');
    exit;
  } else {
    echo "<script>alert('Gagal mengupdate lowongan');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Lowongan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2>Edit Lowongan</h2>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nama Perusahaan</label>
      <input type="text" name="nama_perusahaan" class="form-control" value="<?= htmlspecialchars($data['nama_perusahaan']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Posisi</label>
      <input type="text" name="posisi" class="form-control" value="<?= htmlspecialchars($data['posisi']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Lokasi</label>
      <input type="text" name="lokasi" class="form-control" value="<?= htmlspecialchars($data['lokasi']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Kualifikasi</label>
      <textarea name="kualifikasi" class="form-control" required><?= htmlspecialchars($data['kualifikasi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Tanggal Kadaluarsa</label>
      <input type="date" name="tanggal_kadaluarsa" class="form-control" value="<?= htmlspecialchars($data['tanggal_kadaluarsa']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Kontak</label>
      <input type="text" name="kontak" class="form-control" value="<?= htmlspecialchars($data['kontak']) ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="admin.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>