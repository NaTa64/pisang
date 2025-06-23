<?php
session_start();
require("koneksi/koneksi.php"); // Including the db Connection	
remove();
update();

?>
<html lang="en">

<head>
    <title>WARUNG ZAYN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .form1 {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 950px;
        height: 400px;
        margin: 0 auto 10px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .box {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 270px;
        height: 400px;
        margin: 0 auto 5px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    @media (min-width: 1200px) {
        .container {
            width: 1000px;
        }
    }
</style>

<body>

    <nav class="navbar navbar-inverse" style="border-radius:0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Logo</a> -->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="menu.php">Menu Makanan</a></li>
                    <li><a href="history.php">Riwayat Pemesanan</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="top:7px;">
                        <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
                        </form>
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
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Alamat</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <form method="post" action="" class="form1" enctype="multipart/form-data">
                        <h2>Checkout</h2>
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Ringkasan Pesanan</a>
                            </li>
                        </ul>
                        <br>
                        <div class="table">
                            <div class="content">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->


                                <!-- /.row -->
                                <div class="row">

                                    <div class="col-sm-12   ">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="No Handphone" required>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.row -->
                                <br>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="cart.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali Ke Keranjang</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Lanjutkan Ke Metode Pengiriman<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <!-- /.box -->


                </div>

            </div>
            <!-- /.container -->
        </div>
    </div>

</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cust_id = $_SESSION['cust_id'];
    $ip = getIp();
    $name = $_POST['name'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $status = 'Dibatalkan';

    $insert_c = 'insert into orders (cust_ip,cust_id,name,alamat,phone,delivery_type,payment,status) values ("' . $ip . '","' . $cust_id . '","' . $name . '","' . $alamat . '","' . $phone . '","","","' . $status . '")';
    if ($conn->query($insert_c) == TRUE) {
        echo "<script>window.open('checkout2.php','_self')</script>";
    } else {
        echo "Error: " . $insert_c . "<br>" . $conn->error;
    }
}

?>