<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['no_pesanan'])) {
    header("Location: logincust.php?pesan=belum-login");
    exit();
}

$no_pesanan = $_SESSION['no_pesanan'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jumlah'])) {

    $pesanan_kosong = false;
    foreach ($_POST['jumlah'] as $jumlah) {
        if ((int)$jumlah > 0) {
            $pesanan_kosong = true;
            break;
        }
    }

    if (!$pesanan_kosong) {
        echo "<script>alert('Silakan pilih minimal 1 menu sebelum melanjutkan.'); window.location='pemesanan.php';</script>";
        exit();
    }

       mysqli_query($connect, "DELETE FROM jml_pesanan WHERE no_pesanan = $no_pesanan");
    foreach ($_POST['jumlah'] as $id_menu => $jumlah) {
        $id_menu = (int)$id_menu;
        $jumlah = (int)$jumlah;
        if ($jumlah > 0) {
            $menu = mysqli_fetch_assoc(mysqli_query($connect, 
                "SELECT harga, status_stok FROM menu WHERE id_menu = $id_menu"));
            
            if ($menu['status_stok']) {
                $subtotal = $menu['harga'] * $jumlah;
                mysqli_query($connect, 
                    "INSERT INTO jml_pesanan (no_pesanan, id_menu, kuantitas, subtotal) 
                     VALUES ($no_pesanan, $id_menu, $jumlah, $subtotal)");
            }
        }
    }

    $total = mysqli_fetch_assoc(mysqli_query($connect, 
        "SELECT SUM(subtotal) AS total FROM jml_pesanan WHERE no_pesanan = $no_pesanan"));
    $total_harga = $total['total'] ?? 0;

    mysqli_query($connect, 
         "UPDATE pesanan SET total_harga = $total_harga WHERE no_pesanan = $no_pesanan");

    header("Location: keranjang.php");
    exit();

}


    $existing_quantities = [];
    $result = mysqli_query($connect, 
    "SELECT id_menu, kuantitas FROM jml_pesanan WHERE no_pesanan = $no_pesanan");
    while ($row = mysqli_fetch_assoc($result)) {
    $existing_quantities[$row['id_menu']] = $row['kuantitas'];
    }
    $tampil_menu = mysqli_query($connect, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan - BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .menu-card {
            cursor: pointer;
            transition: transform 0.3s;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .menu-card:hover {
            transform: translateY(-5px);
        }
        .menu-img {
            height: 180px;
            object-fit: cover;
        }
        body {
            background-color: #f8f9fa;
        }
        .quantity-control {
            width: 120px;
        }
        .out-of-stock {
            opacity: 0.7;
            position: relative;
        }
        .out-of-stock::after {
            content: "Stok Habis";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(220, 53, 69, 0.9);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .nav-custom {
            background-color: #343a40;
        }
        .btn-order {
            background: #E31837;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: all 0.3s;
        }
        .btn-order:hover {
            background: #c51630;
        }
    </style>
</head>
<body>
    
    <nav class="p-3 mb-0 nav-custom text-white position-relative">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand" style="font-size: 40px; font-weight: 800; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); letter-spacing: 1px;">
                <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o
            </a>
            <div class="d-flex align-items-center gap-4">
                <div class="d-none d-md-flex gap-4">
                    <a href="index.php" class="text-white fw-bold text-decoration-none">HOME</a>
                    <a href="indexmenu.php" class="text-white fw-bold text-decoration-none">MENU</a>
                    <a href="indexabout.php" class="text-white fw-bold text-decoration-none">ABOUT</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="text-center mb-4">Pilih Menu</h2>
        
        <form method="post">
            <div class="row g-4">
                <?php while($row = mysqli_fetch_assoc($tampil_menu)): ?>
                    <div class="col-md-4">
                        <div class="card menu-card h-100 <?= $row['status_stok'] ? '' : 'out-of-stock' ?>">
                            <?php if (!empty($row['gambar'])): ?>
                                <img src="<?= $row['gambar'] ?>" class="menu-img card-img-top" alt="<?= $row['nama'] ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['nama'] ?></h5>
                                <p class="card-text"><?= $row['deskripsi'] ?></p>
                                <p class="fw-bold text-success">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                                
                                <div class="d-flex align-items-center">
                                    <input type="number" name="jumlah[<?= $row['id_menu'] ?>]" 
                                           class="form-control text-center quantity-control" 
                                           min="0"
                                           placeholder="Jumlah" 
                                           value="<?= $existing_quantities[$row['id_menu']] ?? 0 ?>"
                                           <?= $row['status_stok'] ? '' : 'disabled' ?>>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center mt-5">
                <button type="submit" class="btn btn-success btn-lg px-5 py-3 fw-bold">
                    <i class="fas fa-shopping-cart me-2"></i>Lanjut ke Keranjang
                </button>
            </div>
        </form>
    </div>

  
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3"><i class="fas fa-coffee me-2"></i>WAROENG BOERJO</h5>
                    <p class="mb-0">Jangan lupakan kami!</p>
                </div>
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3"><i class="fas fa-clock me-2"></i>JAM BUKA</h5>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><b>Senin-Jumat</b></li>
                                <li>08.00 - 22.00</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><b>Sabtu-Minggu</b></li>
                                <li>07.00 - 23.00</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3 bg-light opacity-25">
            <div class="text-center pt-2">
                <small>&copy; 2025 BoerJo | <a href="#" class="text-white text-decoration-none">Warung Gacor</a></small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>