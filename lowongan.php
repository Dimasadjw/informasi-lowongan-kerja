<?php
session_start();
require_once 'koneksi.php';

$db = new Database();
$conn = $db->connect();

try {
    $stmt = $conn->query("SELECT * FROM lowongan");
    $lowongan = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lowongan Kerja</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h2 class="mb-4">Daftar Lowongan Pekerjaan</h2>
  <div class="row">
    <?php foreach($lowongan as $row): ?>
      <div class="col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['posisi']); ?> - <?php echo htmlspecialchars($row['nama_perusahaan']); ?></h5>
            <p class="card-text">Lokasi: <?php echo htmlspecialchars($row['lokasi']); ?></p>
            <p class="card-text">Deskripsi: <?php echo htmlspecialchars($row['deskripsi']); ?></p>
            <p class="card-text">Kualifikasi: <?php echo htmlspecialchars($row['kualifikasi']); ?></p>
            <p class="card-text">Berlaku hingga: <?php echo htmlspecialchars($row['tanggal_kadaluarsa']); ?></p>
            <p class="card-text">Kontak: <?php echo htmlspecialchars($row['kontak']); ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>