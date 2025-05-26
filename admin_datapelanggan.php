<?php
session_start();
include "koneksi.php";

// Authentication check
if (!isset($_SESSION['admin'])) {
    header("Location: loginadm.php?pesan=belum-login");
    exit();
}

// Fetch customer data from pesanan table
$query = "SELECT no_pesanan, nama_pelanggan, no_telp, waktu_pesan, status_pesanan FROM pesanan ORDER BY waktu_pesan DESC";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Database error: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Data Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar-brand {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 1px;
        }
        
        .navbar-brand span {
            color: #FFD700;
        }
        
        .card-custom {
            background-color: #1f1f1f;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        }
        
        .table-custom {
            background-color: #1f1f1f;
            color: #f8f9fa;
        }
        
        .table-custom th {
            background-color: #121212;
            color: #FFD700;
            border-bottom: 1px solid #333;
        }
        
        .table-custom td {
            border-bottom: 1px solid #333;
            vertical-align: middle;
        }
        
        .badge-available {
            background-color: #28a745;
        }
        
        .badge-unavailable {
            background-color: #dc3545;
        }
        
        .action-buttons .btn {
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <span>B</span>oer<span>J</span>o
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="dashboard.php" class="text-white text-decoration-none">
                    <i class="fas fa-home me-1"></i> Dashboard
                </a>
                <a href="logoutadmin.php" class="btn btn-outline-light">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1 py-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold">
                    <i class="fas fa-users me-2"></i>Data Pelanggan
                </h2>
                <div>
                    <a href="dashboard.php" class="btn btn-outline-warning">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="card card-custom mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No. Telepon</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) :
                                    $statusClass = $row['status_pesanan'] ? 'badge-available' : 'badge-unavailable';
                                    $statusText = $row['status_pesanan'] ? 'Selesai' : 'Proses';
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($row['nama_pelanggan']) ?></td>
                                    <td><?= htmlspecialchars($row['no_telp']) ?></td>
                                    <td><?= date('d/m/Y H:i', strtotime($row['waktu_pesan'])) ?></td>
                                    <td>
                                        <span class="badge rounded-pill <?= $statusClass ?>">
                                            <?= $statusText ?>
                                        </span>
                                    </td>
                                    <td class="text-center action-buttons">
                                        <a href="edit_data.php?no_pesanan=<?= $row['no_pesanan'] ?>" 
                                           class="btn btn-sm btn-warning me-1" 
                                           title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete_data.php?no_pesanan=<?= $row['no_pesanan'] ?>" 
                                           class="btn btn-sm btn-danger" 
                                           title="Hapus"
                                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Basic Pagination -->
                    <!-- <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <small>&copy; <?= date('Y') ?> BoerJo Admin Dashboard</small>
        </div>
    </footer>

    <!-- Bootstrap JS (required for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>