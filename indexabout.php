<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

<!-- tambah disini -->


<section style="background-color:#FFF8E1; padding: 3rem 1.5rem; color: #333;">
  <div style="max-width: 800px; margin: auto; text-align: center;">
    <h2 style="font-size: 2rem; margin-bottom: 1rem;">Tentang Waroeng Boerjo</h2>
    <p style="font-size: 1.1rem; line-height: 1.8;">
      <strong>Waroeng Boerjo</strong> didirikan pada tahun <strong>2000</strong>, berawal dari sebuah warung kecil di pinggir jalan yang menyajikan menu sederhana namun penuh rasa. 
      Dengan semangat menyajikan makanan yang <em>murah, merakyat, dan mengenyangkan</em>, kami berkomitmen untuk menjadi pilihan favorit masyarakat dari berbagai kalangan.
    </p>
    
    <p style="font-size: 1.1rem; line-height: 1.8; margin-top: 1.5rem;">
      Selama lebih dari 20 tahun, Waroeng Boerjo terus berkembang tanpa meninggalkan cita rasa khas warung burjo yang melegenda — mulai dari <strong>nasi goreng</strong>, <strong>mie rebus</strong>, <strong>magelangan</strong>, hingga segelas <strong>burjo hangat</strong> yang menemani obrolan malam.
    </p>

    <!-- Gambar -->
   
  </div>
</section>
 <img src="../projectpwd/asset_index/about1.png" 
         alt="Foto Waroeng Boerjo" 
         style="width: 100%; max-width: 800px; height: auto; margin-top: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">






<!-- batasnya sampe sini -->
<footer class="bg-dark text-white py-4">
  <div class="container">
    <div class="row">
      <!-- Tentang Kami -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h5 class="fw-bold mb-3">
          <i class="fas fa-coffee me-2"></i>TENTANG BOERJO
        </h5>
        <p class="mb-0">
          Berdiri sejak tahun 2010, menjadikan Boerjo menjadi salah satu pelopor warung makan di kota ini. Dengan dedikasi tinggi , kami berkomitmen untuk menyajikan makanan yang lezat dan berkualitas
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