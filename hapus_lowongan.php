<?php
session_start();
require_once 'koneksi.php';

$db = new Database();
$conn = $db->connect();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
  header('Location: login.php');
  exit;
}

// Validasi ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
  echo "<script>alert('ID tidak ditemukan'); window.location='admin.php';</script>";
  exit;
}

try {
  $stmt = $conn->prepare("DELETE FROM lowongan WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    header('Location: admin.php');
    exit;
  } else {
    echo "<script>alert('Lowongan tidak ditemukan atau sudah dihapus'); window.location='admin.php';</script>";
  }
} catch (PDOException $e) {
  echo "<script>alert('Gagal menghapus lowongan: " . $e->getMessage() . "'); window.location='admin.php';</script>";
}
?>