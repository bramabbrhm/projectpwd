<?php
session_start();
include "koneksi.php";

// Check if user is logged in
if (!isset($_SESSION['no_pesanan'])) {
    header("Location: logincust.php?pesan=belum-login");
    exit();
}
$menus = mysqli_query($connect, "SELECT * FROM menu WHERE status_stok = 1");
// Get order details
$no_pesanan = $_SESSION['no_pesanan'];
$order_query = mysqli_query($connect, 
    "SELECT * FROM pesanan WHERE no_pesanan = $no_pesanan");
$order = mysqli_fetch_assoc($order_query);

// Get ordered items
$items_query = mysqli_query($connect,
    "SELECT m.nama, m.harga, j.kuantitas, j.subtotal 
     FROM jml_pesanan j
     JOIN menu m ON j.id_menu = m.id_menu
     WHERE j.no_pesanan = $no_pesanan");
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
        <h1 class="text-center mb-5">Pesan Menu BoerJo</h1>
        
        <div class="row g-4">
            <!-- Menu 1 -->
            <div class="col-md-4">
                <div class="card menu-card h-100">
                    <img src="asset_menu/menu_kopi.png" class="menu-img card-img-top" alt="Kopi Hitam">
                    <div class="card-body">
                        <h5 class="card-title">Kopi Hitam Legam</h5>
                        <p class="text-muted">Rp 18.000</p>
                        
                        <div class="d-flex align-items-center mt-3">
                            <button class="btn btn-outline-danger btn-quantity minus-btn">-</button>
                            <input type="number" class="form-control text-center quantity-input" value="0" min="0" readonly>
                            <button class="btn btn-outline-success btn-quantity plus-btn">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 2 -->
            <div class="col-md-4">
                <div class="card menu-card h-100">
                    <img src="asset_menu/menu_ijo.png" class="menu-img card-img-top" alt="Bubur Kacang">
                    <div class="card-body">
                        <h5 class="card-title">Burcangjo</h5>
                        <p class="text-muted">Rp 15.000</p>
                        
                        <div class="d-flex align-items-center mt-3">
                            <button class="btn btn-outline-danger btn-quantity minus-btn">-</button>
                            <input type="number" class="form-control text-center quantity-input" value="0" min="0" readonly>
                            <button class="btn btn-outline-success btn-quantity plus-btn">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu 3 -->
            <div class="col-md-4">
                <div class="card menu-card h-100">
                    <img src="asset_menu/menu_krosan.png" class="menu-img card-img-top" alt="Croissant">
                    <div class="card-body">
                        <h5 class="card-title">Croissant ala Mbappe</h5>
                        <p class="text-muted">Rp 10.000</p>
                        
                        <div class="d-flex align-items-center mt-3">
                            <button class="btn btn-outline-danger btn-quantity minus-btn">-</button>
                            <input type="number" class="form-control text-center quantity-input" value="0" min="0" readonly>
                            <button class="btn btn-outline-success btn-quantity plus-btn">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Submit (nanti untuk ke database) -->
        <div class="text-center mt-5">
            <button class="btn btn-success btn-lg px-5 py-3" id="submitOrder">
                <i class="fas fa-paper-plane me-2"></i>Pesan Sekarang
            </button>
        </div>
    </div>

    <!-- Script untuk Tombol +/- -->
    <script>
        document.querySelectorAll('.plus-btn').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.parentElement.querySelector('.quantity-input');
                input.value = parseInt(input.value) + 1;
            });
        });

        document.querySelectorAll('.minus-btn').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.parentElement.querySelector('.quantity-input');
                if (input.value > 0) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });
    </script>

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>