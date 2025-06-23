<?php
require("koneksi/koneksi.php");
?>

<html lang="en">

<head>
    <title>WARUNG ZAYN - About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .about-section {
            padding: 40px 0;
        }

        .map-container {
            height: 400px;
            margin-bottom: 30px;
            border-radius: 5px;
            overflow: hidden;
        }

        .contact-card {
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }

        .whatsapp-btn {
            background-color: #25D366;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse" style="border-radius:0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="menu.php">Menu Makanan</a></li>
                    <li><a href="history.php">Riwayat Pemesanan</a></li>
                    <li class="active"><a href="about.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><?php
                        if (!isset($_SESSION['username'])) {
                            echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a>";
                        } else {
                            echo "<a href='logout.php'><span class='glyphicon glyphicon-user'></span> Logout</a>";
                        }
                        ?></li>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container about-section">
        <div class="row">
            <div class="col-md-12">
                <h2>Tentang Warung Zayn</h2>
                <p>Warung Zayn adalah tempat makan yang menyajikan berbagai macam makanan lezat dengan harga terjangkau. Kami berkomitmen untuk memberikan pelayanan terbaik dan cita rasa yang autentik kepada setiap pelanggan kami.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h3>Lokasi Kami</h3>
                <div class="map-container">
                    <!-- Maps -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.3508911675282!2d117.09534208325539!3d-0.5794869120272408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df681b83cd74f73%3A0xc98256550e71efe6!2sPISANG%20GAPIT%20ZAYN!5e0!3m2!1sen!2sid!4v1750651987404!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <p><strong>Alamat:</strong> Gg.Hj.Siti Aminah, Jl. Soekarno Hatta No.Km.1, kelurahan, Tani Aman, Kec. Loa Janan, Kabupaten Kutai Kartanegara, Kalimantan Timur 75251</p>
            </div>

            <div class="col-md-6">
                <h3>Hubungi Kami</h3>
                <div class="contact-card">
                    <h4>Kontak Warung Zayn</h4>
                    <p><span class="glyphicon glyphicon-phone"></span> <strong>Telepon:</strong> (021) 1234-5678</p>
                    <p><span class="glyphicon glyphicon-envelope"></span> <strong>Email:</strong> info@warungzayn.com</p>
                    <p><span class="glyphicon glyphicon-time"></span> <strong>Jam Operasional:</strong></p>
                    <ul>
                        <li>Senin-Jumat: 08.00 - 22.00</li>
                        <li>Sabtu-Minggu: 09.00 - 23.00</li>
                    </ul>

                    <h4>Pesan via WhatsApp</h4>
                    <p>Untuk pemesanan cepat atau pertanyaan, hubungi kami via WhatsApp:</p>
                    <!-- Replace the href with your actual WhatsApp number -->
                    <a href="https://wa.me/6289657172345?text=Halo%20Warung%20Zayn,%20saya%20ingin%20bertanya..." target="_blank" class="whatsapp-btn">
                        <span class="glyphicon glyphicon-comment"></span> Chat via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-md-12">
                <h3>Visi & Misi</h3>
                <p><strong>Visi:</strong> Menjadi warung makan favorit dengan menyajikan makanan berkualitas dan pelayanan terbaik.</p>
                <p><strong>Misi:</strong></p>
                <ul>
                    <li>Menyajikan makanan dengan bahan-bahan segar dan berkualitas</li>
                    <li>Memberikan pelayanan yang ramah dan profesional</li>
                    <li>Menjaga kebersihan dan kenyamanan tempat</li>
                    <li>Memberikan harga yang terjangkau dengan kualitas terbaik</li>
                </ul>
            </div>
        </div> -->
    </div>

</body>

</html>