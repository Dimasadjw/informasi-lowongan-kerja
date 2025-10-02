<?php
require_once 'koneksi.php'; // Mengambil variabel $conn dari file koneksi.php

// Proses hapus jika ada parameter ?hapus=id
if (isset($_GET['hapus'])) {
    $hapusId = $_GET['hapus'];
    $hapusStmt = $conn->prepare("DELETE FROM lowongan WHERE id = ?");
    $hapusStmt->execute([$hapusId]);
    header("Location: dashboard_admin.php");
    exit;
}

// Ambil semua data lowongan
$stmt = $conn->query("SELECT * FROM lowongan ORDER BY id DESC");
$lowongans = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        #content {
            padding: 20px;
        }

        #topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .container-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<div id="content">
    <div id="topbar">
        <span>DASHBOARD ADMIN</span>
        <span>Admin</span>
    </div>
    <div class="container-box">
        <a href="create_lowongan.php" class="btn">+ Tambah Lowongan</a>
        <table>
            <thead>
                <tr>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Kualifikasi</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Kontak Perusahaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lowongans as $lowongan): ?>
                    <tr>
                        <td><?= htmlspecialchars($lowongan['nama_perusahaan']) ?></td>
                        <td><?= htmlspecialchars($lowongan['posisi']) ?></td>
                        <td><?= htmlspecialchars($lowongan['lokasi']) ?></td>
                        <td><?= htmlspecialchars($lowongan['deskripsi']) ?></td>
                        <td><?= htmlspecialchars($lowongan['kualifikasi']) ?></td>
                        <td><?= htmlspecialchars($lowongan['tanggal_kadaluwarsa']) ?></td>
                        <td><?= htmlspecialchars($lowongan['kontak']) ?></td>
                        <td>
                            <a href="create_lowongan.php?edit=<?= $lowongan['id'] ?>">Edit</a> |
                            <a href="?hapus=<?= $lowongan['id'] ?>" onclick="return confirm('Hapus lowongan ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
