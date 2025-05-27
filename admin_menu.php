<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location:loginadmin.php?pesan=belum-login");
    exit();
}

$result = mysqli_query($connect, "SELECT * FROM menu");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Menu</title>
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
    </style>
</head>
<body>

<!-- Navbar mirip index.php -->
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
        <h2 class="fw-bold">Manajemen Menu</h2>
        <a href="tambah_menu.php" class="btn btn-success fw-bold px-4"><i class="fas fa-plus me-2"></i>Tambah Menu</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Status Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($menu = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= htmlspecialchars($menu['nama']) ?></td>
                    <td><?= htmlspecialchars($menu['tipe']) ?></td>
                    <td>Rp<?= number_format($menu['harga'], 0, ',','.') ?></td>
                    <td><?= htmlspecialchars($menu['deskripsi']) ?></td> 
                    <td class="text-center">
                        <span class="badge bg-<?= $menu['status_stok'] ? 'success' : 'danger' ?>">
                            <?= $menu['status_stok'] ? 'Tersedia' : 'Habis' ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="edit_menu.php?id_menu=<?= $menu['id_menu'] ?>" class="btn btn-warning btn-sm me-1"><i class="fas fa-edit"></i></a>
                        <a href="hapus_menu.php?id_menu=<?= $menu['id_menu'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
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
      </small>
  </div>
</footer>

</body>
</html>
