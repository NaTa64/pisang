<?php
session_start();
require("koneksi/koneksi.php"); // Including the db Connection	

remove();
update();

if (!isset($_SESSION['username'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
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
            height: auto;
            margin: 0 auto 10px;
            min-height: 400px;
            min-width: 250px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .box {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            /* max-width: 270px; */
            height: auto;
            /* margin: 0 auto 100px; */
            min-height: 400px;
            min-width: 250px;
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
        <?php
        $cust_id = $_SESSION['cust_id'];
        $ip = getIp();
        $check_itm =  'select * from cart where ip_add="' . $ip . '" AND cust_id= "' . $cust_id . '"';
        $stmt = $conn->query($check_itm);
        $count = $stmt->rowCount();
        if ($count > 0) {
        ?>
            <div id="all">

                <div id="content">
                    <div class="container">

                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li>Keranjang</li>
                            </ul>
                        </div>

                        <div class="col-md-12">

                            <form method="post" action="cart.php" class="form1">

                                <h1>Keranjang</h1>
                                <p class="text-muted">Saat ini anda memiliki <?php total_items(); ?> item di keranjangmu.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="3">Nama</th>
                                                <!-- <th colspan="2">Stok</th> -->
                                                <th>Jumlah</th>
                                                <th></th>
                                                <th>Harga/pcs</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <?php
                                                $total = 0;
                                                $final_total = 0;
                                                global $conn;

                                                $ip = getIp();

                                                try {
                                                    $sel_price = $conn->query('select *from cart where ip_add="' . $ip . '"');
                                                    if (!$sel_price) {
                                                        throw new Exception('Query execution failed');
                                                    }
                                                } catch (Exception $e) {
                                                    echo 'Error: ' . $e->getMessage();
                                                    exit;
                                                }

                                                while ($i_price = $sel_price->fetch(PDO::FETCH_ASSOC)) {

                                                    $itm_id = $i_price['i_id'];
                                                    $qty = $i_price['qty'];
                                                    $itm_price = $conn->query('select *from items where item_id="' . $itm_id . '"');

                                                    while ($ii_price = $itm_price->fetch(PDO::FETCH_ASSOC)) {

                                                        $harga = array($ii_price['harga']);
                                                        $item_name = $ii_price['item_name'];
                                                        $item_image = $ii_price['item_image'];
                                                        $single_price = $ii_price['harga'];
                                                        $stok = $ii_price['stok'];
                                                        $values = array_sum($harga);
                                                        $total += $values;
                                                ?>


                                                        <td>
                                                            <a href="#">
                                                                <img src="<?php echo $item_image; ?>" height="50px" width="50px" alt="<?php echo $item_name; ?>">
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a href="#"><?php echo $item_name; ?></a>
                                                        </td>

                                                        <!-- <td>
                                                            <?php echo $stok; ?>
                                                        </td> -->

                                                        <td align="right">
                                                            <?php
                                                            $itm_id = $i_price['i_id'];
                                                            $qty = $i_price['qty'];
                                                            $itm_price = $conn->query('select *from items where item_id="' . $itm_id . '"');
                                                            while ($ii_price = $itm_price->fetch(PDO::FETCH_ASSOC)) {
                                                                $stok = $ii_price['stok'];
                                                                if ($qty < $stok) {
                                                                    echo '<a href="cart.php?update_id=' . $itm_id . '&up_qty=' . ($qty + 1) . '"><i class="glyphicon glyphicon-plus"></i></a>';
                                                                } else {
                                                                    echo '<i class="glyphicon glyphicon-plus" style="color:gray;"></i>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>

                                                        <td style="width:50px">
                                                            <input type="text" value="<?php echo $qty; ?>" name="qty" class="form-control" disabled>
                                                        </td>

                                                        <td align="left">
                                                            <a href="cart.php?update_id=<?php echo $itm_id; ?>&dow_qty=<?php $qty2 = $qty - 1;
                                                                                                                        echo $qty2; ?>">
                                                                <i class="glyphicon glyphicon-minus"></i>
                                                            </a>
                                                        </td>

                                                        <td>Rp<?php echo $single_price;  ?></td>

                                                        <td>Rp <?php
                                                                $updated_price = $single_price * $qty;
                                                                $final_total += $updated_price;
                                                                echo number_format((float)$updated_price, 3, '.', '');
                                                                ?>
                                                        </td>

                                                        <!-- Hapus item -->
                                                        <td>
                                                            <a href="cart.php?item_id=<?php echo $itm_id; ?>&delete=true"><i class="glyphicon glyphicon-trash"></i></a>
                                                        </td>
                                            </tr>
                                    <?php
                                                    }
                                                }
                                    ?>
                                        </tbody>

                                        <tfoot>

                                            <tr>
                                                <th colspan="6">Ongkos Kirim</th>
                                                <th colspan="4">Rp<?php $ongkir = 2.00;
                                                                    echo number_format((float)$ongkir, 3, '.', ''); ?></th>
                                            </tr>

                                            <tr>
                                                <th colspan="6">Total Akhir</th>
                                                <th colspan="4">Rp<?php echo number_format((float)$final_total + $ongkir, 3, '.', '');  ?></th>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <!-- /.table-responsive -->


                                    <div class="pull-left">
                                        <a href="menu.php" class="btn btn-success"><i class="fa fa-chevron-left"></i> Lanjut Tambahkan Menu</a>
                                    </div>

                                    <div class="pull-right">
                                        <a href="checkout1.php" class="btn btn-primary btn_block">
                                            <i class="fa fa-chevron-left"></i>Proses Untuk checkout
                                        </a>
                                    </div>

                                </div>

                            </form>

                            <!-- /.box -->

                        </div>

                    </div>
                    <!-- /.container -->
                </div>
            </div>
        <?php } else {
            echo '<div class="container text-center">
    <h1 style="color:green">Keranjang Kosong</h1>   
   </div>  ';
        } ?>

    </body>

    </html>
<?php } ?>