<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['no_pesanan'])) {
    header("Location: logincust.php?pesan=belum-login");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$no_pesanan = $_SESSION['no_pesanan'];

    mysqli_query($connect, "DELETE FROM jml_pesanan WHERE no_pesanan = $no_pesanan");
   foreach ($_POST['jumlah'] as $id_menu => $jumlah) {
             if ($jumlah > 0) {
                $menu = mysqli_fetch_assoc(mysqli_query($connect, 
                "SELECT harga FROM menu WHERE id_menu = $id_menu"));

                $subtotal = $menu['harga'] * $jumlah;
                mysqli_query($connect, 
                "INSERT INTO jml_pesanan (no_pesanan, id_menu, kuantitas, subtotal) 
                 VALUES ($no_pesanan, $id_menu, $jumlah, $subtotal)");
                 }
            }
        $total = mysqli_fetch_assoc(mysqli_query($connect, 
        "SELECT SUM(subtotal) AS total FROM jml_pesanan WHERE no_pesanan = $no_pesanan"));
    
    mysqli_query($connect, 
        "UPDATE pesanan SET total_harga = {$total['total']} WHERE no_pesanan = $no_pesanan");
    
    header("Location: keranjang.php");
    exit();
}

$menus = mysqli_query($connect, "SELECT * FROM menu WHERE status_stok = 1");
     ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-card {
            transition: transform 0.3s;
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
        .quantity-control {
            width: 120px;
        }
        .btn-quantity {
            width: 36px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-4">Pilih Menu</h2>

    <form method="post">
        <div class="row">
            <?php while($row = mysqli_fetch_assoc($menus)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top row-img">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($row['deskripsi']) ?></p>
                            <p class="fw-bold">Rp <?= number_format($row['harga'], 0, ',', '.') ?></p>
                            <p class="text-muted">Stok tersedia: <?= $row['status_stok'] ?></p>

                            <input type="number" name="jumlah[<?= $row['id_menu'] ?>]" class="form-control text-center" 
                                   min="0" max="<?= $row['status_stok'] ?>" 
                                   placeholder="Jumlah pesanan" value="<?= $_SESSION['no_pesanan'][$row['id_menu']] ?? '' ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success btn-lg">Lanjut ke Checkout</button>
        </div>
    </form>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>