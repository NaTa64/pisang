<?php
require("koneksi/koneksi.php");

?>
<html lang="en">

<head>
  <title>WARUNG ZAYN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    body,
    html {
      width: 100%;
      height: 100%
    }

    .masthead {
      min-height: 30rem;
      position: relative;
      display: table;
      width: 100%;
      height: auto;
      padding-top: 8rem;
      padding-bottom: 8rem;
      background: linear-gradient(90deg, rgba(255, 255, 255, .1) 0, rgba(255, 255, 255, .1) 100%), url(Banner/pisang.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover
    }

    .masthead h1 {
      font-size: 4rem;
      margin: 0;
      padding: 0
    }

    @media (min-width: 992px) {
      .masthead {
        height: 100vh
      }

      .masthead h1 {
        font-size: 5.5rem
      }
    }

    .map {
      height: 60rem
    }
  </style>
</head>

<body>
  <header class="masthead d-flex">
    <div class="container text-center" style="padding:200;">
      <h1 class="mb-1">WARUNG ZAYN</h1>
      <h3 class="mb-5">
        AYO PESAN MAKANANMU SEKARANG !!
      </h3>
      <a class="btn btn-primary " href="menu.php">Pergi ke Menu</a>

    </div>
    <div class="overlay"></div>
  </header>
  <!-- <div style="width:100%; height:35%; background-color:steelblue;"> -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>