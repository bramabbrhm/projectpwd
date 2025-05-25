<?php
session_start();
include "koneksi.php";

if (isset($_SESSION['no_pesanan'])) {
    header("Location: pemesanan.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_pelanggan = mysqli_real_escape_string($connect, $_POST['nama_pelanggan']);
    $no_meja = (int) $_POST['no_meja'];

    // Default values
    $no_telp = 0; // Ubah jika ingin menambahkan input nomor telepon
    $total_harga = 0;
    $status_pesanan = 0;

    $query = "INSERT INTO pesanan (waktu_pesan, no_meja, nama_pelanggan, no_telp, total_harga, status_pesanan)
              VALUES (NOW(), $no_meja, '$nama_pelanggan', $no_telp, $total_harga, $status_pesanan)";

    if (mysqli_query($connect, $query)) {
        $_SESSION['no_pesanan'] = mysqli_insert_id($connect); // Set session
        header("Location: pemesanan.php");
        exit;
    } else {
        echo "<script>alert('Input gagal: " . mysqli_error($connect) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Customer - BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="p-3 mb-0 bg-dark text-white position-relative">
  <!-- Overlay dan background gambar kopi -->
  
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <!-- Logo dengan efek spesial -->
    <a class="navbar-brand" style="
      font-size: 40px;
      font-weight: 800;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
      letter-spacing: 1px;
    ">
      <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o
    </a>
    
    <!-- Nav Items -->
    <div class="d-flex align-items-center gap-4">
      <!-- Navigation Links -->
      <div class="d-none d-md-flex gap-4">
        <a href="index.php" class="text-white fw-bold text-decoration-none hover-gold">HOME</a>
      </div>
    </div>
  </div>
</nav>
<style>
  .hover-gold:hover {
    color: #FFD700 !important;
    transform: translateY(-2px);
    transition: all 0.3s;
  }
</style>


    <!-- Login Form -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card border-0 shadow" style="width: 100%; max-width: 400px;">
            <!-- Header dengan gaya BoerJo -->
            <div class="card-header bg-dark text-white text-center py-3">
                <h4 class="mb-0 fs-3 fw-bolder">
                    <span class="text-warning">B</span>oer<span class="text-warning">J</span>o
                </h4>
            </div>
            
            <div class="card-body p-4">
                <form action="" method="POST">
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Masukkan Nama Anda</label>
                        <input type="text" class="form-control " id="name" name="name" required placeholder="Nama">
                    </div>
                    
                    <!-- Mejah -->
                    <div class="mb-3">
                        <label for="tableNumber" class="form-label fw-bold">Masukkan Nomor Meja anda</label>
                        <select class="form-select " id="tableNumber" name="no_meja" required>
                            <option value="" selected disabled>Pilih disini</option>
                            <option value="1">1</option>
                            <option value="2"> 2</option>
                            <option value="3"> 3</option>
                            <option value="4"> 4</option>
                            <option value="5"> 5</option>
                            <option value="6"> 6</option>
                            <option value="7"> 7</option>
                            <option value="8"> 8</option>
                            <option value="9"> 9</option>
                            <option value="10"> 10</option>
                        </select>
                    </div>
                     <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
                        <i class="fas fa-shopping-cart me-2"></i>PESAN
                    </button>
                    <!-- <div class="d-grid">
                        <button type="submit" class="p-3 mb-0 bg-dark text-white position-relative"
                        style="background-color: #212529;">Pesan</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <small>&copy; 2023 BoerJo | Warung Gacor</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>