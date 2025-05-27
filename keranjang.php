<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['no_pesanan'])) {
    header("Location: logincust.php?pesan=belum-login");
    exit();
}

$no_pesanan = $_SESSION['no_pesanan'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    $cek_pesanan = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) AS jumlah FROM jml_pesanan WHERE no_pesanan = $no_pesanan"));

    if ($cek_pesanan['jumlah'] == 0) {
        echo "<script>alert('Keranjang kosong. Silakan tambahkan menu terlebih dahulu.'); window.location='pemesanan.php';</script>";
        exit();
    }
    
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp = $_POST['no_telp'];
    $metode_bayar = $_POST['metode_bayar'];
    

    mysqli_query($connect, 
        "UPDATE pesanan SET 
            nama_pelanggan = '$nama_pelanggan',
            no_telp = '$no_telp',
            metode_bayar = '$metode_bayar',
            status_bayar = 0,
            status_pesanan = 'Menunggu Pembayaran'
         WHERE no_pesanan = $no_pesanan");

    $_SESSION['nama_pelanggan'] = $nama_pelanggan;
    
    header("Location: checkout.php");
    exit();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete_item':
            if (isset($_GET['id_pesanan'])) {
                $id_pesanan = (int)$_GET['id_pesanan'];
                mysqli_query($connect, "DELETE FROM jml_pesanan WHERE id_pesanan = $id_pesanan");
            }
            break;
            
        case 'cancel_order':
            mysqli_query($connect, "DELETE FROM jml_pesanan WHERE no_pesanan = $no_pesanan");
            mysqli_query($connect, "DELETE FROM pesanan WHERE no_pesanan = $no_pesanan");
            unset($_SESSION['no_pesanan']);
            header("Location: logoutcust.php");
            exit();
            break;
            
        case 'update_quantity':
            if (isset($_POST['update'])) {
                foreach ($_POST['quantity'] as $id_pesanan => $quantity) {
                    if ($quantity > 0) {

                        $item = mysqli_fetch_assoc(mysqli_query($connect, 
                            "SELECT m.harga FROM jml_pesanan j 
                             JOIN menu m ON j.id_menu = m.id_menu 
                             WHERE j.id_pesanan = $id_pesanan"));
                        
                        $subtotal = $item['harga'] * $quantity;
                        mysqli_query($connect, 
                            "UPDATE jml_pesanan SET kuantitas = $quantity, subtotal = $subtotal 
                             WHERE id_pesanan = $id_pesanan");
                    } else {
                        mysqli_query($connect, "DELETE FROM jml_pesanan WHERE id_pesanan = $id_pesanan");
                    }
                }
                
    
                $total = mysqli_fetch_assoc(mysqli_query($connect, 
                    "SELECT SUM(subtotal) AS total FROM jml_pesanan WHERE no_pesanan = $no_pesanan"));
                
                mysqli_query($connect, 
                    "UPDATE pesanan SET total_harga = {$total['total']}
                    WHERE no_pesanan = $no_pesanan");
            }
            break;

            case 'tambah_pesanan':
                break;
    }
}


$pesanan = mysqli_fetch_assoc(mysqli_query($connect, 
    "SELECT * FROM pesanan WHERE no_pesanan = $no_pesanan"));

$items = mysqli_query($connect,
    "SELECT j.id_pesanan, m.nama, m.harga, j.kuantitas, j.subtotal, m.gambar
     FROM jml_pesanan j
     JOIN menu m ON j.id_menu = m.id_menu
     WHERE j.no_pesanan = $no_pesanan");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cart-item-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .quantity-input {
            width: 70px;
            text-align: center;
        }
        .total-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Keranjang Pesanan</h2>
        <a href="pemesanan.php?action=tambah_pesanan" class="btn btn-outline-primary">Tambah Menu</a>
    </div>
    
   <form method="post" action="keranjang.php?action=update_quantity">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="100px">Gambar</th>
                                <th>Menu</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($item = mysqli_fetch_assoc($items)): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($item['gambar'])): ?>
                                        <img src="<?= $item['gambar'] ?>" class="cart-item-img">
                                    <?php endif; ?>
                                </td>
                                <td><?= $item['nama'] ?></td>
                                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <input type="number" name="quantity[<?= $item['id_pesanan'] ?>]" 
                                           class="form-control quantity-input" 
                                           min="1" value="<?= $item['kuantitas'] ?>">
                                </td>
                                <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                <td>
                                    <a href="keranjang.php?action=delete_item&id_pesanan=<?= $item['id_pesanan'] ?>" 
                                       class="btn btn-sm btn-danger">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="keranjang.php?action=cancel_order" class="btn btn-danger btn-lg w-100">
                    Batalkan Pesanan
                </a>
            </div>
            <div class="col-md-6 mb-3">
                <button type="submit" name="update" class="btn btn-warning btn-lg w-100">
                    Perbarui Keranjang
                </button>
            </div>
        </div>
    </form>
    
    <form method="post" action="keranjang.php">
        <div class="card shadow-sm total-section">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Total Pesanan</h4>
                    <h3 class="mb-0 text-success">Rp <?= number_format($pesanan['total_harga'] ?? 0, 0, ',', '.') ?></h3>
                </div>
                <hr>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" 
                               value="<?= $pesanan['nama_pelanggan'] ?? '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="tel" name="no_telp" class="form-control" 
                               value="<?= $pesanan['no_telp'] ?? '' ?>" required>
                    </div>
                </div>
                
                
                <div class="mb-4">
                    <label class="form-label">Metode Pembayaran</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metode_bayar" value="Tunai" checked>
                        <label class="form-check-label">Tunai</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metode_bayar" value="QRIS">
                        <label class="form-check-label">QRIS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metode_bayar" value="Kartu Debit">
                        <label class="form-check-label">Kartu Debit</label>
                    </div>
                </div>
                
                <div class="text-center">
                    <button type="submit" name="checkout" class="btn btn-success btn-lg px-5">Checkout</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>