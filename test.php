<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BoerJo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="p-3 bg-dark text-white">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand fs-1 fw-bolder">
                <span class="text-warning">B</span>oer<span class="text-warning">J</span>o
            </a>
        </div>
    </nav>

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
                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>



    <!-- titip -->
     <div class="form-container">
                <form id="welcomeForm" action="" method="POST">
                    <div class="mb-4">
                        <label for="name" class="form-label">Masukkan Nama Anda</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="Nama">
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
                        <button type="submit" class="p-3 mb-0 bg-dark text-white position-relative"
                        style="background-color: #212529;">View Menu</button>
                    </div>
                </form>
</body>
</html>