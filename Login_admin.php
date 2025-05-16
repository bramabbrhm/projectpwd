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
/* ppp */
    </style>
</head>
<body>
    <div class="container">
        <div class="card welcome-card">
            <div class="welcome-header">
                <div class="brand-logo" style="font-family: 'Pacifico', cursive;">BoerJoe</div>
                <p></p>
                <!-- ppp -->
            </div>
            <div class="form-container">
                <form id="welcomeForm" action="menu.php" method="get">
                    <div class="mb-4">
                        <label for="name" class="form-label">Masukkan Nama Anda</label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="User">
                    </div>
                    <div class="mb-4">
                        <label for="tableNumber" class="form-label">Password</label>
                        <select class="form-select form-select-lg" id="tableNumber" name="tableNumber" required>
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