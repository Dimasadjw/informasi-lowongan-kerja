<?php
require_once __DIR__ . '/../Models/lowongan.php';
$lowonganModel = new Lowongan();

$editData = null;
$message = null;

// Ambil data jika sedang edit
if (isset($_GET['edit'])) {
    $editData = $lowonganModel->ambilById($_GET['edit']);
}

// Simpan data jika POST
if (isset($_POST['simpan'])) {
    if ($_POST['id'] == "") {
        $lowonganModel->tambah($_POST);
        $message = "Data lowongan berhasil ditambahkan.";
    } else {
        $lowonganModel->edit($_POST['id'], $_POST);
        $message = "Data lowongan berhasil diperbarui.";
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $lowonganModel->hapus($_GET['hapus']);
    $message = "Data lowongan berhasil dihapus.";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= isset($editData) ? 'Edit' : 'Tambah' ?> Lowongan Kerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f9f9f9;
        }
        .form-container {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #219150;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><?= isset($editData) ? 'Edit' : 'Tambah' ?> Lowongan Kerja</h2>

        <?php if ($message): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

            <label for="perusahaan">Nama Perusahaan</label>
            <input type="text" name="perusahaan" id="perusahaan" required value="<?= $editData['nama_perusahaan'] ?? '' ?>">

            <label for="posisi">Posisi yang Dibutuhkan</label>
            <input type="text" name="posisi" id="posisi" required value="<?= $editData['posisi'] ?? '' ?>">

            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" required value="<?= $editData['lokasi'] ?? '' ?>">

            <label for="deskripsi">Deskripsi Pekerjaan</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" required><?= $editData['deskripsi'] ?? '' ?></textarea>

            <label for="kualifikasi">Kualifikasi</label>
            <textarea name="kualifikasi" id="kualifikasi" rows="4" required><?= $editData['kualifikasi'] ?? '' ?></textarea>

            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
            <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" required value="<?= $editData['tanggal_kadaluarsa'] ?? '' ?>">

            <label for="kontak">Kontak Perusahaan</label>
            <input type="text" name="kontak" id="kontak" required value="<?= $editData['kontak'] ?? '' ?>">

            <button type="submit" name="simpan">Simpan Lowongan</button>
        </form>
    </div>
</body>
</html>
