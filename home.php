<?php
require("koneksi/koneksi.php"); // Including the db Connection
//index.php

?>
<html lang="en">

<head>
  <title>E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Optional theme -->
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
      background: linear-gradient(90deg, rgba(255, 255, 255, .1) 0, rgba(255, 255, 255, .1) 100%), url(Banner/bg.jpg);
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
      <h1 class="mb-1">E-Commerce Site</h1>
      <h3 class="mb-5">
        Order Food you like
      </h3>
      <a class="btn btn-primary " href="menu.php">Go to Menu</a>

    </div>
    <div class="overlay"></div>
  </header>
  <!-- <div style="width:100%; height:35%; background-color:steelblue;"> -->
  </div>

  <!-- <section id="contact" class="map">
    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237.0132157298837!2d117.09540227474581!3d-0.5795140409325317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df681b83cd74f73%3A0xc98256550e71efe6!2sPISANG%20GAPIT%20ZAYN!5e1!3m2!1sen!2sid!4v1740099107359!5m2!1sen!2sid"></iframe>
    <br />
    <small>
      <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237.0132157298837!2d117.09540227474581!3d-0.5795140409325317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df681b83cd74f73%3A0xc98256550e71efe6!2sPISANG%20GAPIT%20ZAYN!5e1!3m2!1sen!2sid!4v1740099107359!5m2!1sen!2sid"></a>
    </small>
  </section>

  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="#">
            <i class="icon-social-github"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; Your Website 2017</p>
    </div>
  </footer> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>