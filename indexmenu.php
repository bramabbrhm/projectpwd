<?php
session_start();
include "koneksi.php";

// Fetch menu items from database
$query = "SELECT * FROM menu";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - BoerJo</title>
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
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <nav class="p-3 mb-0 bg-dark text-white position-relative">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand" style="font-size: 40px; font-weight: 800; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); letter-spacing: 1px;">
                <span style="color: #FFD700;">B</span>oer<span style="color: #FFD700;">J</span>o
            </a>
            <div class="d-flex align-items-center gap-4">
                <div class="d-none d-md-flex gap-4">
                    <a href="index.php" class="text-white fw-bold text-decoration-none hover-gold">HOME</a>
                    <a href="indexmenu.php" class="text-white fw-bold text-decoration-none hover-gold">MENU</a>
                    <a href="indexabout.php" class="text-white fw-bold text-decoration-none hover-gold">ABOUT</a>
                </div>
                       <a href="antrian_pesanan.php" class="btn btn-outline-success fw-bold px-4 py-2">
  <i class="fas fa-clock me-2"></i>Antrian
</a>
                <a href="logincust.php" class="btn btn-danger fw-bold px-4 py-2" 
                   style="background: #E31837; border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.2); transition: all 0.3s;">
                   <i class="fas fa-shopping-cart me-2"></i>ORDER NOW
                </a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row g-4">
            <?php while ($menu = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-4">
                    <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" 
                         onclick="setModalContent(
                             '<?= htmlspecialchars($menu['nama']) ?>', 
                             '<?= htmlspecialchars($menu['deskripsi']) ?>', 
                             'Rp <?= number_format($menu['harga'], 0, ',', '.') ?>',
                             '<?= htmlspecialchars($menu['gambar']) ?>'
                         )">
                        <img src="<?= htmlspecialchars($menu['gambar']) ?>" class="menu-img card-img-top" alt="<?= htmlspecialchars($menu['nama']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($menu['nama']) ?></h5>
                            <p class="text-muted">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="modal fade" id="menuModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Judul Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid rounded mb-3" style="max-height: 200px;">
                    <p id="modalDesc">Deskripsi menu akan muncul di sini.</p>
                    <p class="fw-bold text-success" id="modalPrice">Rp 0</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h5 class="fw-bold mb-3"><i class="fas fa-coffee me-2"></i>WAROENG BOERJO</h5>
                    <p class="mb-0">Warung makan legendaris sejak 1996, menghadirkan berbagai hidangan berkualitas dengan bahan pilihan langsung dari petani lokal.
</p>
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

    <script>
        function setModalContent(title, desc, price, imgSrc) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('modalDesc').textContent = desc;
            document.getElementById('modalPrice').textContent = price;
            document.getElementById('modalImage').src = imgSrc;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>