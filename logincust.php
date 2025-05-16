<?php
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // include "koneksi.php";
    
    // $nama_pelanggan = $_POST['nama_pelanggan'];
    // $no_meja = $_POST['no_meja'];
    // // $result = mysqli_query($connect, "SELECT no_pesanan FROM pesanan WHERE no_meja = '$no_meja'");
    // // if (mysqli_num_rows($result) > 0) {
    // //     $no_meja_error = "Mohon maaf meja ini sudah ditempati";
    // // }
    
    // $query = mysqli_query($connect, "INSERT INTO pesanan VALUES ('','','$no_meja','$nama_pelanggan','','','')")
    // or die(mysqli_error($connect));
    // if ($query) {
    //     header("Location: landing.php");
    //     exit;
    // } else {
    //     echo "<script>alert('Registration Failed');</script>";
    // }
    // }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoerJoe - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Project/css/styling.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <div class="card welcome-card">
            <div class="welcome-header">
                <div class="brand-logo" style="font-family: 'Pacifico', cursive;">BoerJoe</div>
                <p></p>
            </div>
            <div class="form-container">
                <form id="welcomeForm" action="" method="POST">
                    <div class="mb-4">
                        <label for="name" class="form-label">Masukkan Nama Anda</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="nama_pelanggan" required placeholder="Masukkan nama anda disini">
                    </div>
                    <div class="mb-4">
                        <label for="tableNumber" class="form-label">Masukkan Nomor Meja anda</label>
                        <select class="form-select form-select-lg" id="tableNumber" name="no_meja" required>
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
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success btn-lg">View Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>