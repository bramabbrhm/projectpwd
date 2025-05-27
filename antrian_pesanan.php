<?php
include "koneksi.php";
$pesanan = mysqli_query($connect, 
    "SELECT waktu_pesan, nama_pelanggan, no_meja, status_pesanan FROM pesanan ORDER BY waktu_pesan DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .badge-waiting {
            background-color: #ffc107;
            color: #000;
        }
        .badge-processed {
            background-color: #0dcaf0;
        }
        .badge-finished {
            background-color: #198754;
        }
        .badge-cancelled {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <nav class="p-3 mb-0 bg-dark text-white position-relative">
  

  
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <a class="navbar-brand" style="
      font-size: 40px;
      font-weight: 800;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
      letter-spacing: 1px;
    ">
      <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o
    </a>
    
    <!-- Header Navbar-->
    <div class="d-flex align-items-center gap-4">
      <div class="d-none d-md-flex gap-4">
        <a href="index.php" class="text-white fw-bold text-decoration-none hover-gold">HOME</a>
        <a href="indexmenu.php" class="text-white fw-bold text-decoration-none hover-gold">MENU</a>
        <a href="indexabout.php" class="text-white fw-bold text-decoration-none hover-gold">ABOUT</a>
      </div>
      
      <!-- Tombol pesan -->
       <a href="logincust.php" class="btn btn-danger fw-bold px-4 py-2" 
   style="background: #E31837; border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.2); transition: all 0.3s;">
   <i class="fas fa-shopping-cart me-2"></i>ORDER NOW
</a>
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
    <div class="container py-5">
        <h2 class="fw-bold mb-4">Daftar Status Pesanan</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Waktu Pesan</th>
                        <th>Nama Pelanggan</th>
                        <th>No. Meja</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($pesanan)) : ?>
                    <tr>
                        <td><?= date('d M Y H:i', strtotime($row['waktu_pesan'])) ?></td>
                        <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                        <td class="text-center"><?= $row['no_meja'] ?></td>
                        <td class="text-center">
                            <span class="badge 
                                <?= $row['status_pesanan'] == 'Selesai' ? 'badge-finished' : 
                                   ($row['status_pesanan'] == 'Diproses' ? 'badge-processed' : 
                                   ($row['status_pesanan'] == 'Dibatalkan' ? 'badge-cancelled' : 'badge-waiting')) ?>">
                                <?= $row['status_pesanan'] ?: 'Menunggu' ?>
                            </span>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="bg-dark text-white py-4">
  <div class="container">
    <div class="row">
      <!-- Tentang Kami -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h5 class="fw-bold mb-3">
          <i class="fas fa-coffee me-2"></i>WAROENG BOERJO
        </h5>
        <p class="mb-0">
         Warung makan legendaris sejak 1996, menghadirkan berbagai hidangan berkualitas dengan bahan pilihan langsung dari petani lokal.
        </p>
        <br><br>

      </div>

      <!-- Jam Operasional -->
      <div class="col-md-6">
        <h5 class="fw-bold mb-3">
          <i class="fas fa-clock me-2"></i>JAM BUKA
        </h5>
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

    <!-- Garis Pembatas -->
    <hr class="my-3 bg-light opacity-25">

    <!-- Copyright -->
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
