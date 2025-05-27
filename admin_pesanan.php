<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: loginadmin.php?pesan=belum-login");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $no_pesanan = $_POST['no_pesanan'];
    $status_pesanan = $_POST['status_pesanan'];
    $status_bayar = $_POST['status_bayar'];
    
    mysqli_query($connect, 
        "UPDATE pesanan SET 
            status_pesanan = '$status_pesanan',
            status_bayar = $status_bayar
         WHERE no_pesanan = $no_pesanan");
}


$pesanan = mysqli_query($connect, 
    "SELECT * FROM pesanan ORDER BY waktu_pesan DESC");


function ambilpesanan($connect, $no_pesanan) {
    $items = mysqli_query($connect,
        "SELECT m.nama, j.kuantitas, j.subtotal
         FROM jml_pesanan j
         JOIN menu m ON j.id_menu = m.id_menu
         WHERE j.no_pesanan = $no_pesanan");
    return $items;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hover-gold:hover {
            color: #FFD700 !important;
            transform: translateY(-2px);
            transition: all 0.3s;
        }
        .order-details {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 15px;
            margin-top: 10px;
        }
        .badge-processing {
            background-color: #ffc107;
            color: #000;
        }
        .badge-completed {
            background-color: #198754;
        }
        .badge-cancelled {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<nav class="p-3 mb-4 bg-dark text-white position-relative">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand" style="font-size: 40px; font-weight: 800; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); letter-spacing: 1px;">
      <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o
    </a>
    <div class="d-flex align-items-center gap-3">
      <a href="logoutadmin.php" class="btn btn-outline-light fw-bold"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Manajemen Pesanan</h2>
        <div>
            <a href="dashboard.php" class="btn btn-secondary fw-bold px-4 me-2"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No. Pesanan</th>
                    <th>Waktu Pesan</th>
                    <th>Pelanggan</th>
                    <th>No. Meja</th>
                    <th>Total</th>
                    <th>Status Pesanan</th>
                    <th>Status Bayar</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = mysqli_fetch_assoc($pesanan)) : ?>
                <tr>
                    <td class="text-center"><?= $order['no_pesanan'] ?></td>
                    <td><?= date('d M Y H:i', strtotime($order['waktu_pesan'])) ?></td>
                    <td><?= $order['nama_pelanggan'] ?></td>
                    <td class="text-center"><?= $order['no_meja'] ?></td>
                    <td>Rp<?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                    <td class="text-center">
                        <span class="badge 
                            <?= $order['status_pesanan'] == 'Selesai' ? 'bg-success' : 
                               ($order['status_pesanan'] == 'Diproses' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                            <?= $order['status_pesanan'] ?: 'Menunggu' ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-<?= $order['status_bayar'] ? 'success' : 'danger' ?>">
                            <?= $order['status_bayar'] ? 'Lunas' : 'Belum Bayar' ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info" data-bs-toggle="collapse" 
                                data-bs-target="#details-<?= $order['no_pesanan'] ?>">
                            <i class="fas fa-list"></i> Lihat
                        </button>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                data-bs-target="#editModal-<?= $order['no_pesanan'] ?>">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </td>
                </tr>
                <!-- Detail Pesanan  -->
                <tr class="collapse" id="details-<?= $order['no_pesanan'] ?>">
                    <td colspan="9">
                        <div class="order-details">
                            <h5>Detail Pesanan</h5>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $items = ambilpesanan($connect, $order['no_pesanan']);
                                    while ($item = mysqli_fetch_assoc($items)) : ?>
                                    <tr>
                                        <td><?= $item['nama'] ?></td>
                                        <td><?= $item['kuantitas'] ?></td>
                                        <td>Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                            <p class="mb-1"><strong>Metode Bayar:</strong> <?= $order['metode_bayar'] ?: '-' ?></p>
                            <p><strong>No. Telepon:</strong> <?= $order['no_telp'] ?: '-' ?></p>
                        </div>
                    </td>
                </tr>
<div class="modal fade" id="editModal-<?= $order['no_pesanan'] ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Status Pesanan #<?= $order['no_pesanan'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no_pesanan" value="<?= $order['no_pesanan'] ?>">
                    
                    <div class="mb-3">
                        <label class="form-label">Status Pesanan</label>
                        <select class="form-select" name="status_pesanan" required>
                            <option value="Menunggu" <?= ($order['status_pesanan'] == 'Menunggu' || $order['status_pesanan'] == '0') ? 'selected' : '' ?>>Menunggu</option>
                            <option value="Diproses" <?= $order['status_pesanan'] == 'Diproses' ? 'selected' : '' ?>>Diproses</option>
                            <option value="Selesai" <?= $order['status_pesanan'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="Dibatalkan" <?= $order['status_pesanan'] == 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Status Pembayaran</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_bayar" value="1" id="paid-<?= $order['no_pesanan'] ?>" <?= $order['status_bayar'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="paid-<?= $order['no_pesanan'] ?>">Lunas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status_bayar" value="0" id="unpaid-<?= $order['no_pesanan'] ?>" <?= !$order['status_bayar'] ? 'checked' : '' ?>>
                            <label class="form-check-label" for="unpaid-<?= $order['no_pesanan'] ?>">Belum Bayar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="bg-dark text-white mt-5 py-3">
  <div class="text-center">
      <small>
        &copy; 2025 BoerJo | 
        <a href="#" class="text-white text-decoration-none">Warung Gacor</a>
      </small>  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>