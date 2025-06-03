

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu Makanan - Warung Zayn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    .whatsapp-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 999;
      width: 50px;
    }
  </style>
</head>

<body>
    <div class="row">
      <?php
      $stmt = $conn->query("SELECT item_id, item_name, harga, stok, item_image FROM items WHERE aktif = 1");
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="col-sm-4">
          <div class="panel panel-primary" style="border-radius:10px;">
            <div class="panel-heading text-center">
              <strong><?php echo $row['item_name']; ?></strong>
            </div>
            <div class="panel-body text-center" style="height:250px;">
              <img src="<?php echo $row['item_image']; ?>" alt="Image" style="max-height:100%; max-width:100%;">
            </div>
            <div class="panel-footer text-center">
              <p>Harga: Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
              <p>Stok: <?php echo $row['stok']; ?></p>
              <?php if ($row['stok'] > 0) { ?>
                <a href="menu.php?itm_id=<?php echo $row['item_id']; ?>" class="btn btn-success btn-block">Tambah ke Keranjang</a>
              <?php } else { ?>
                <button class="btn btn-danger btn-block" disabled>Stok Habis</button>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Tombol WhatsApp -->
  <a href="https://wa.me/+6289521598295?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20Anda" class="whatsapp-button" target="_blank">
    <img src="Pictures/whatsapp.webp" alt="WhatsApp" width="50">
  </a>

</body>
</html>
