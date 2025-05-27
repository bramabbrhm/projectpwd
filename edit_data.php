<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION['admin'])) {
    header("Location: loginadmin.php");
    exit();
}


if (!isset($_GET['no_pesanan']) || empty($_GET['no_pesanan'])) {
    header("Location: admin_datapelanggan.php?error=invalid_id");
    exit();
}

$no_pesanan = (int)$_GET['no_pesanan'];


$query = "SELECT * FROM pesanan WHERE no_pesanan = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "i", $no_pesanan);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {
    header("Location: admin_datapelanggan.php?error=data_not_found");
    exit();
}

$pesanan = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama_pelanggan = mysqli_real_escape_string($connect, $_POST['nama_pelanggan']);
    $no_telp = mysqli_real_escape_string($connect, $_POST['no_telp']);
    $no_meja = (int)$_POST['no_meja'];
    $status_pesanan = isset($_POST['status_pesanan']) ? 1 : 0;


    $update_query = "UPDATE pesanan SET 
                    nama_pelanggan = ?, 
                    no_telp = ?, 
                    no_meja = ?,
                    status_pesanan = ?
                    WHERE no_pesanan = ?";
    
    $stmt = mysqli_prepare($connect, $update_query);
    mysqli_stmt_bind_param($stmt, "ssiii", $nama_pelanggan, $no_telp, $no_meja, $status_pesanan, $no_pesanan);
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin_datapelanggan.php?success=update_success");
        exit();
    } else {
        $error = "Gagal update: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pelanggan | BoerJo Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
            min-height: 100vh;
        }
        
        .form-container {
            max-width: 700px;
            margin: 2rem auto;
            background-color: #1f1f1f;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.3);
        }
        
        .btn-primary {
            background-color: #E31837;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #c0132e;
        }
        
        .navbar-brand span {
            color: #FFD700;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php" style="font-size: 1.8rem; font-weight: 800;">
                <span>B</span>oer<span>J</span>o Admin
            </a>
            <div class="d-flex gap-3">
                <a href="dashboard.php" class="text-white text-decoration-none">
                    <i class="fas fa-home me-1"></i> Dashboard
                </a>
                <a href="logoutadmin.php" class="btn btn-outline-light">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>


    <main class="container py-4">
        <div class="form-container">
            <h1 class="mb-4 text-center"><i class="fas fa-user-edit me-2"></i>Edit Data Pelanggan</h1>
            
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="mb-3">
                    <label for="no_pesanan" class="form-label">Nomor Pesanan</label>
                    <input type="text" class="form-control" value="<?= $no_pesanan ?>" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" 
                           value="<?= htmlspecialchars($pesanan['nama_pelanggan']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control" id="no_telp" name="no_telp" 
                           value="<?= htmlspecialchars($pesanan['no_telp']) ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="no_meja" class="form-label">Nomor Meja</label>
                    <input type="number" class="form-control" id="no_meja" name="no_meja" 
                           value="<?= htmlspecialchars($pesanan['no_meja']) ?>" required>
                </div>
                
                
                <div class="d-flex justify-content-between">
                    <a href="admin_datapelanggan.php" class="btn btn-secondary px-4">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>


    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container text-center">
            <small>&copy; <?= date('Y') ?> BoerJo Admin Dashboard</small>
        </div>
    </footer>

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>