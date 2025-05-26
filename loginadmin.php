<?php
session_start();
include "koneksi.php";


if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $query = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: loginadmin.php?pesan=gagal");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - BoerJo</title>
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
                        <label class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" name="password"placeholder="Enter password" required>
                    </div>
                    
                    
                    <!-- Login Button -->
                    <a href="index.php" ><button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
                        <i class="fas fa-sign-in-alt me-2"></i>LOGIN
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <small>&copy; 2023 BoerJo | Warung Gacor</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script></a>