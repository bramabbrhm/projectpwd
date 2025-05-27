<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['admin'])) {
    header("Location:loginadmin.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tipe = isset($_POST['tipe']) ? $_POST['tipe'] : '';
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $status_stok = isset($_POST['status_stok']) ? 1 : 0;
    $gambar = $_POST['gambar']; // ← SEMICOLON FIXED

    $query = "INSERT INTO menu (tipe, nama, deskripsi, status_stok, harga, gambar) 
              VALUES ('$tipe', '$nama', '$deskripsi', $status_stok, $harga, '$gambar')";

    if (mysqli_query($connect, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Gagal menambahkan menu: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu | BoerJo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 700px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        h1 {
            font-weight: 800;
            color: #E31837;
        }

        label {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #E31837;
            border: none;
        }

        .btn-primary:hover {
            background-color: #c0132e;
        }

        .navbar-brand span {
            color: #FFD700;
        }

        .navbar-brand {
            font-size: 36px;
            font-weight: 800;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }

        .hover-gold:hover {
            color: #FFD700 !important;
            transform: translateY(-2px);
            transition: all 0.3s;
        }
    </style>
</head>
<body>

<!-- Navbar (minimalist version for admin) -->
<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="dashboard.php">
        <span>B</span>oer<span>J</span>o
    </a>
    <div class="d-flex gap-3">
        <a href="dashboard.php" class="text-white text-decoration-none hover-gold">Dashboard</a>
        <a href="logoutadmin.php" class="btn btn-outline-light">Logout</a>
    </div>
</nav>

<!-- Form Container -->
<div class="form-container">
    <h1 class="mb-4">Tambah Menu</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nama">Nama Menu</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="tipe" value="Makanan" required>
                <label class="form-check-label">Makanan</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="tipe" value="Minuman" required>
                <label class="form-check-label">Minuman</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="harga">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar">Link Gambar (URL)</label>
            <input type="url" name="gambar" class="form-control" placeholder="https://example.com/image.jpg" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status_stok" class="form-check-input" id="stokTersedia">
            <label class="form-check-label" for="stokTersedia">Tersedia</label>
        </div>

        <button type="submit" class="btn btn-primary px-4">Tambah Menu</button>
        <a href="admin_menu.php" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>

</body>
</html>
