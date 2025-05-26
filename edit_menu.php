<?php
session_start();
include "koneksi.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../loginadmin.php");
    exit();
}

$id = $_GET['id_menu'];
$data = mysqli_query($connect, "SELECT * FROM menu WHERE id_menu = $id");
$menu = mysqli_fetch_assoc($data);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $status_stok = isset($_POST['status_stok']) ? 1 : 0;

    $query = "UPDATE menu SET nama='$nama', tipe='$tipe', harga=$harga, deskripsi='$deskripsi', status_stok=$status_stok, gambar='$gambar'
              WHERE id_menu=$id";
    if (mysqli_query($connect, $query)) {
        header("Location: admin_menu.php");
        exit();
    } else {
        echo "Gagal update: " . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>
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

<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="dashboard.php">
        <span>B</span>oer<span>J</span>o Admin
    </a>
    <div class="d-flex gap-3">
        <a href="dashboard.php" class="text-white text-decoration-none hover-gold">Dashboard</a>
        <a href="logoutadmin.php" class="btn btn-outline-light">Logout</a>
    </div>
</nav>


<div class="form-container">
    <h1 class="mb-4">Update Menu</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $menu['nama'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe</label><br>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="tipe" id="tipeMakanan" value="Makanan" <?= ($menu['tipe'] == 'Makanan') ? 'checked' : '' ?> required>
                <label class="form-check-label" for="tipeMakanan">Makanan</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="tipe" id="tipeMinuman" value="Minuman" <?= ($menu['tipe'] == 'Minuman') ? 'checked' : '' ?> required>
                <label class="form-check-label" for="tipeMinuman">Minuman</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?= $menu['harga'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required><?= $menu['deskripsi'] ?></textarea>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Link Gambar (URL)</label>
            <input type="url" name="gambar" id="gambar" class="form-control" value="<?= $menu['gambar'] ?>" placeholder="https://example.com/image.jpg" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status_stok" class="form-check-input" id="stokTersedia" <?= $menu['status_stok'] ? 'checked' : '' ?>>
            <label class="form-check-label" for="stokTersedia">Tersedia</label>
        </div>

        <button type="submit" class="btn btn-primary px-4">Update</button>
        </form>
</div>
</body>
</html>
