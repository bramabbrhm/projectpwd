<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Charlotte's Bag</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background: #fdfdfd;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
    }

    .container {
      display: flex;
      max-width: 1100px;
      gap: 30px;
    }

    .bag, .summary {
      background: white;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .bag {
      flex: 2;
    }

    .summary {
      flex: 1;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 20px;
    }

    .item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .item img {
      width: 60px;
      height: auto;
      margin-right: 15px;
    }

    .item-details {
      flex-grow: 1;
    }

    .price {
      font-weight: bold;
    }

    .free {
      color: green;
      font-weight: bold;
    }

    .checkout-btn {
      background-color: #3b0a2a;
      color: white;
      padding: 12px;
      text-align: center;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
      font-weight: 600;
    }

    .note {
      background-color: #fef2e8;
      padding: 10px;
      font-size: 14px;
      margin-bottom: 10px;
      border-left: 4px solid #e09e6d;
    }

    .free-delivery {
      background-color: #e6f9ec;
      padding: 10px;
      font-size: 14px;
      color: #1a7f4f;
      border-left: 4px solid #1a7f4f;
      margin-bottom: 10px;
    }

    .subtotal {
      font-size: 16px;
      margin-top: 10px;
    }

    .promo, .giftcard {
      margin: 15px 0;
    }

    .promo input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
    }

    .sample-info {
      background-color: #fceef3;
      padding: 10px;
      font-size: 14px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="bag">
      <h2>YOUR BAG</h2>

      <div class="item">
        <img src="https://www.charlottetilbury.com/media/catalog/product/b/e/beauty_light_wand_peachgasm.png" alt="Beauty Light Wand">
        <div class="item-details">
          <div><strong>BEAUTY LIGHT WAND</strong><br>PEACHGASM</div>
          <div class="free">FREE!</div>
        </div>
      </div>

      <div class="item">
        <img src="https://www.charlottetilbury.com/media/catalog/product/a/i/airbrush_flawless_lip_blur_honey_blur.png" alt="Lip Blur">
        <div class="item-details">
          <div><strong>AIRBRUSH FLAWLESS LIP BLUR</strong><br>HONEY BLUR</div>
          <div class="free">FREE!</div>
        </div>
      </div>

      <div class="item">
        <img src="https://www.charlottetilbury.com/media/catalog/product/m/a/magic_hydration_cleanser_30ml.png" alt="Cleanser">
        <div class="item-details">
          <div><strong>MAGIC HYDRATION REVIVAL CLEANSER</strong><br>30 ML</div>
          <div class="price">$15.00</div>
        </div>
      </div>
    </div>

    <div class="summary">
      <div class="promo">
        <label>Maukan Nama Anda</label>
        <input type="text" placeholder="Masukan Nama Anda">
        <br><br>
        <label>Masukan Nomor Telefon Anda</label>
        <input type="text" placeholder="Masukan Nomor Telefon Anda">
      </div>

      <div class="giftcard">
        <label>*masukan form untuk melanjutkan pesanan anda</label>
      </div>

      <div class="subtotal">
        Total : <strong>$230.00</strong><br>
        <br><br>
        TOTAL: <strong>$230.00</strong>
      </div>

      <div class="checkout-btn">CHECKOUT | $230.00</div>
    </div>
  </div>
</body>
</html>
