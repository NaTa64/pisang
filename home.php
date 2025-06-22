<?php
require("koneksi/koneksi.php");
?>
<html lang="en">

<head>
  <title>WARUNG ZAYN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    body,
    html {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .masthead {
      min-height: 100vh;
      position: relative;
      display: table;
      width: 100%;
      background: url(Banner/desain1.png);
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
      text-align: center;
      padding-top: 8rem;
      padding-bottom: 8rem;
    }

    .border {
      background-image: url(Pictures/home.jpg);
      background-size: auto;
      background-color: white;
      border: white;
      border-radius: 40px;
      padding: 45px;
      /* margin-left: 500px; */
      margin-top: 115px;
      max-width: 600px;
      color: white;
    }

    .border h1,
    .border h2 {
      color: white;
      /* background-color: white; */
      color: black;
      /* padding: 5px; */
      border-radius: 5px;
      font-family: fantasy;
    }

    .border .btn {
      margin-top: 5px;
    }

    @media (min-width: 992px) {
      .masthead {
        height: 100vh;
      }

      .border h1 {
        font-size: 5.5rem;
      }

      /* .border h2 {
        color: blueviolet;
        font-size: 2rem;
      } */
    }
  </style>
</head>

<body>
  <header class="masthead d-flex">
    <div class="container border">
      <h1 class="mb-1">WARUNG ZAYN</h1>
      <h2 class="mb-5">AYO PESAN MAKANANMU SEKARANG !!</h2>
      <a class="btn btn-primary" href="menu.php">Pergi ke Menu</a>
    </div>
  </header>

  <!-- <section id="contact" class="map">
    <iframe width="50%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
    <br />
    <small>
      <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
    </small>
  </section> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>