<?php
session_start();
include "koneksi.php";

// Cek login admin (misalnya pakai $_SESSION['admin'])
if (!isset($_SESSION['admin'])) {
    header("Location:loginadm.php?pesan=belum-login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | BoerJo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .hover-gold:hover {
      color: #FFD700 !important;
      transform: translateY(-2px);
      transition: all 0.3s;
    }
    .card-custom {
      background-color: #1f1f1f;
      color: white;
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.4);
      transition: all 0.3s;
    }
    .card-custom:hover {
      transform: scale(1.02);
      box-shadow: 0 6px 16px rgba(0,0,0,0.5);
    }
    body {
      background-color: #121212;
      color: white;
    }
  </style>
</head>
<body>

<nav class="p-3 mb-4 bg-dark text-white position-relative">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand" style="font-size: 40px; font-weight: 800; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); letter-spacing: 1px;">
      <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o 
    </a>
    <div class="d-flex align-items-center gap-4">
      <div class="d-none d-md-flex gap-4">
      </div>
      <a href="logoutadmin.php" class="btn btn-danger fw-bold px-4 py-2" 
         style="background: #E31837; border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.2); transition: all 0.3s;">
         <i class="fas fa-sign-out-alt me-2"></i>LOGOUT
      </a>
    </div>
  </div>
</nav>


<div class="container">
  <h2 class="fw-bold mb-4 text-center"><i class="fas fa-chart-line me-2"></i>DASHBOARD ADMIN</h2>
  
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card card-custom p-4 text-center">
        <i class="fas fa-utensils fa-2x mb-3 text-warning"></i>
        <h5 class="fw-bold">Kelola Menu</h5>
        <p class="small text-muted">Tambah, edit, atau hapus menu makanan dan minuman.</p>
        <a href="admin_menu.php" class="btn btn-outline-warning btn-sm fw-bold mt-2">Kelola</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-custom p-4 text-center">
        <i class="fas fa-receipt fa-2x mb-3 text-warning"></i>
        <h5 class="fw-bold">Pesanan Masuk</h5>
        <p class="small text-muted">Lihat dan kelola pesanan yang masuk dari pelanggan.</p>
        <a href="admin_order.php" class="btn btn-outline-warning btn-sm fw-bold mt-2">Lihat Pesanan</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card card-custom p-4 text-center">
        <i class="fas fa-users fa-2x mb-3 text-warning"></i>
        <h5 class="fw-bold">Data Pelanggan</h5>
        <p class="small text-muted">Kelola data pelanggan dan histori pemesanan mereka.</p>
        <a href="admin_datapelanggan.php" class="btn btn-outline-warning btn-sm fw-bold mt-2">Kelola</a>
      </div>
    </div>
  </div>
</div>


<footer class="bg-dark text-white py-4 mt-5">
 
    <div class="text-center pt-2">
      <small>
        &copy; 2025 BoerJo | 
        <a href="#" class="text-white text-decoration-none">Warung Gacor</a>
      </small>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
