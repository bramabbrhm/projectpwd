<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
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
  </style>
</head>
<body>
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
        <a href="indexmenu.php" class="text-white fw-bold text-decoration-none hover-gold">MENU</a>
        <a href="indexabout.php" class="text-white fw-bold text-decoration-none hover-gold">ABOUT</a>
      </div>
      
      <!-- Tombol ORDER dengan efek -->
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


<!-- tambahain menu disini -->
<div class="container py-5">
  <div class="row g-4">
    <!-- Menu Item 1 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Kopi Hitam Legam', 'Kopi racikan khusus dengan biji pilihan dari Toraja, disangrai gelap untuk cita rasa yang kuat dan berani.')">
        <img src="asset_menu/menu_kopi.png" class="menu-img card-img-top" alt="Kopi Hitam">
        <div class="card-body">
          <h5 class="card-title">Kopi Hitam Legam</h5>
          <p class="text-muted">Rp 18.000</p>
        </div>
      </div>
    </div>

<!-- item dua -->
<div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Bubur Kacang Ijo', 'Bubur tradisional dengan kacang ijo pilihan, dimasak perlahan dengan gula aren asli dan santan kental.')">
        <img src="asset_menu/menu_ijo.png" class="menu-img card-img-top" alt="Bubur Kacang">
        <div class="card-body">
          <h5 class="card-title">Burcangjo</h5>
          <p class="text-muted">Rp 15.000</p>
        </div>
      </div>
    </div>

<!-- item tiga -->
 <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Croissant', 'Roti gandum panggang dengan olesan butter dan meses coklat premium, disajikan hangat.')">
        <img src="asset_menu/menu_krosan.png" class="menu-img card-img-top" alt="Roti Bakar">
        <div class="card-body">
          <h5 class="card-title">Croissant ala Mbappe</h5>
          <p class="text-muted">Rp 10.000</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row g-4">
    <!-- Menu 4 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Nasi Goreng', 'Nasi goreng spesial dengan bumbu rempah.')">
        <img src="asset_menu/nasi_goreng.png" class="menu-img card-img-top">
        <div class="card-body">
          <h5 class="card-title">Nasi Goreng Spesial</h5>
          <p class="text-muted">Rp 20.000</p>
        </div>
      </div>
    </div>
    <!-- Menu 5 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Es Teh', 'Es teh manis dengan gula aren.')">
        <img src="asset_menu/es_teh.png" class="menu-img card-img-top">
        <div class="card-body">
          <h5 class="card-title">Es Teh Manis</h5>
          <p class="text-muted">Rp 5.000</p>
        </div>
      </div>
    </div>

    <!-- Menu 6 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Roti Bakar', 'Roti bakar dengan keju dan coklat.')">
        <img src="asset_menu/roti_bakar.png" class="menu-img card-img-top">
        <div class="card-body">
          <h5 class="card-title">Roti Bakar</h5>
          <p class="text-muted">Rp 12.000</p>
        </div>
      </div>
    </div>
  </div> <!-- Tutup row kedua -->

  <div class="row g-4">
    <!-- Menu 7 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Nasi Goreng', 'Nasi goreng spesial dengan bumbu rempah.')">
        <img src="asset_menu/nasi_goreng.png" class="menu-img card-img-top">
        <div class="card-body">
          <h5 class="card-title">Nasi Goreng Spesial</h5>
          <p class="text-muted">Rp 20.000</p>
        </div>
      </div>
    </div>
    <!-- Menu 8 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Es Teh', 'Es teh manis dengan gula aren.')">
        <img src="asset_menu/es_teh.png" class="menu-img card-img-top">
        <div class="card-body">
          <h5 class="card-title">Es Teh Manis</h5>
          <p class="text-muted">Rp 5.000</p>
        </div>
      </div>
    </div>

    <!-- Menu 9 -->
    <div class="col-md-4">
      <div class="card menu-card h-100" data-bs-toggle="modal" data-bs-target="#menuModal" onclick="setModalContent('Roti Bakar', 'Roti bakar dengan keju dan coklat.')">
        <img src="asset_menu/roti_bakar.png" class="menu-img card-img-top">
        <div class="card-body">
          <h5 class="card-title">Roti Bakar</h5>
          <p class="text-muted">Rp 12.000</p>
        </div>
      </div>
    </div>
  </div> <!-- Tutup row ketiga -->
</div>

<!-- Modal Popup Mengambang -->
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

<script>
  function setModalContent(title, desc, price, imgSrc) {
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalDesc').textContent = desc;
    document.getElementById('modalPrice').textContent = price;
    document.getElementById('modalImage').src = imgSrc;
  }
</script>

<footer class="bg-dark text-white py-4">
  <div class="container">
    <div class="row">
      <!-- Tentang Kami -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h5 class="fw-bold mb-3">
          <i class="fas fa-coffee me-2"></i>TENTANG BOERJO
        </h5>
        <p class="mb-0">
          Warung makan legendaris sejak 1996, menghadirkan berbagai hidangan berkualitas
          dengan bahan pilihan langsung dari petani lokal.
        </p>
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
        &copy; 2023 BoerJo | 
        <a href="#" class="text-white text-decoration-none">Warung Gacor</a>
      </small>
    </div>
  </div>
</footer>

<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>