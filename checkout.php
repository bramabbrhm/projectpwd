<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['no_pesanan'])) {
    header("Location: logincust.php?pesan=belum-login");
    exit();
}

$no_pesanan = $_SESSION['no_pesanan'];

// memproseskan form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $nama_pelanggan = mysqli_real_escape_string($connect, $_POST['nama_pelanggan']);
    $no_telp = mysqli_real_escape_string($connect, $_POST['no_telp']);
    $metode_bayar = mysqli_real_escape_string($connect, $_POST['metode_bayar']);
    
    // update isi form
    mysqli_query($connect, 
        "UPDATE pesanan SET 
            nama_pelanggan = '$nama_pelanggan',
            no_telp = '$no_telp',
            metode_bayar = '$metode_bayar',
            status_pesanan = 'Diproses',
            status_bayar = 0
         WHERE no_pesanan = $no_pesanan");
}

// mengambil pesanan dari db
$pesanan = mysqli_fetch_assoc(mysqli_query($connect, 
    "SELECT * FROM pesanan WHERE no_pesanan = $no_pesanan"));


$items = mysqli_query($connect,
    "SELECT m.nama, m.harga, j.kuantitas, j.subtotal, m.gambar
     FROM jml_pesanan j
     JOIN menu m ON j.id_menu = m.id_menu
     WHERE j.no_pesanan = $no_pesanan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .receipt {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .item-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .payment-status {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .paid {
            color: #28a745;
        }
        .unpaid {
            color: #dc3545;
        }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="receipt">
                <div class="text-center mb-4">
                        <a style="
      font-size: 40px;
      font-weight: 800;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
      letter-spacing: 1px;
    ">
      <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o
    </a>
                    
                    <h4 class="mt-3">Struk Pesanan</h4>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>No. Pesanan:</strong> #<?= $no_pesanan ?></p>
                        <p><strong>Waktu Pesanan:</strong> <?= $pesanan['waktu_pesan'] ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nama:</strong> <?= $pesanan['nama_pelanggan'] ?></p>
                        <p><strong>No. Telp:</strong> <?= $pesanan['no_telp'] ?></p>
                    </div>
                </div>
                
                <hr>
                
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th class="text-end">Harga</th>
                                <th class="text-center">Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($item = mysqli_fetch_assoc($items)): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php if (!empty($item['gambar'])): ?>
                                            <img src="<?= $item['gambar'] ?>" class="item-img me-3">
                                        <?php endif; ?>
                                        <?= $item['nama'] ?>
                                    </div>
                                </td>
                                <td class="text-end">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                <td class="text-center"><?= $item['kuantitas'] ?></td>
                                <td class="text-end">Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th class="text-end">Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end">Metode Bayar</th>
                                <th class="text-end"><?= $pesanan['metode_bayar'] ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="alert alert-info">
                    <h5 class="alert-heading">Instruksi Pembayaran</h5>
                    <p>Silakan melakukan pembayaran ke kasir dengan menunjukkan nomor pesanan ini.</p>
                    <p class="payment-status <?= $pesanan['status_bayar'] ? 'paid' : 'unpaid' ?>">
                        Status Pembayaran: <?= $pesanan['status_bayar'] ? 'LUNAS' : 'BELUM LUNAS' ?>
                    </p>
                    <p class="mb-0">
                        Status Pesanan: <?= $pesanan['status_pesanan'] ?>
                    </p>
                </div>
                
                <div class="text-center mt-4">
    <a href="logoutcust.php" 
       class="btn btn-primary <?= !$pesanan['status_bayar'] ? 'disabled' : '' ?>" 
       <?= !$pesanan['status_bayar'] ? 'tabindex="-1" aria-disabled="true"' : '' ?>>
        Kembali ke Beranda
    </a><br>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>