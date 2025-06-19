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
        height: auto;
        margin: 0 auto 5px;
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
        margin: 0 auto 10px;
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
                        <li>Checkout - Review Pesanan</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <form method="get" action="" class="form1" enctype="multipart/form-data">

                        <h2>Checkout</h2>
                        <ul class="nav nav-pills nav-justified">
                            <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                            </li>
                            <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                            </li>
                            <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Review Pesanan</a>
                            </li>
                        </ul>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Menu</th>

                                        <th>Jumlah</th>

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

                                        $sel_price = $conn->query('select *from cart where ip_add="' . $ip . '"');

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

                                                <td><a href="#"><?php echo $item_name; ?></a>
                                                </td>

                                                <td><?php echo $qty; ?></td>

                                                <td>Rp<?php echo $single_price;  ?></td>

                                                <td>Rp<?php $updated_price = $single_price * $qty;
                                                        $final_total += $updated_price;
                                                        echo number_format((float)$updated_price, 3, '.', ''); ?></td>
                                                <td><a href="cart.php?item_id=<?php echo $itm_id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                                </td>
                                    </tr>
                            <?php
                                            }
                                        }
                            ?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <th colspan="4">Ongkos Kirim</th>
                                        <th colspan="2">Rp<?php $ongkir = 2.00;
                                                            echo number_format((float)$ongkir, 3, '.', ''); ?></th>
                                    </tr>

                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th colspan="2">Rp<?php echo number_format((float)$final_total + $ongkir, 3, '.', '');  ?></th>
                                    </tr>

                                </tfoot>
                            </table>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali Ke Metode Pembayaran</a>
                                </div>

                                <div class="pull-right">
                                    <a href="checkout4.php?od_id=1&&o_id=<?php orders(); ?>"><button type="button" class="btn btn-danger" name="cancel"><i class="fa fa-cancel"></i> Batalkan Pesanan</button></a>
                                    <a href="checkout4.php?od_id=2&&o_id=<?php orders(); ?>"><button type="button" name="place" class="btn btn-primary">Pesan Sekarang <i class="fa fa-chevron-right"></i>
                                        </button></a>
                                </div>

                            </div>
                        </div>
                    </form>


                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

            </div>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_GET['od_id'])) {
    $username = $_SESSION['username'];
    $cust_id = $_SESSION['cust_id'];

    $ip = getIp();
    $value = $_GET['od_id'];
    $or_id = $_GET['o_id'];

    if ($value == 2) {

        $qty = 0;
        $sel_price = $conn->query('select *from cart where ip_add="' . $ip . '"');
        // $item_names = array(); // variabel untuk menyimpan item name

        while ($i_price = $sel_price->fetch(PDO::FETCH_ASSOC)) {
            $qty += $i_price['qty'];
            $item_id = $i_price['i_id'];

            // Query untuk mengurangi stok
            $update_stok = "UPDATE items SET stok = stok - " . $i_price['qty'] . " WHERE item_id = '" . $item_id . "'";
            $conn->query($update_stok);

            // Query hitung subtotal item
            $harga_query = $conn->query('SELECT harga FROM items WHERE item_id = "' . $item_id . '"');
            $harga = $harga_query->fetch(PDO::FETCH_ASSOC)['harga'];
            $qty_item = $i_price['qty'];
            $subtotal_item = $harga * $i_price['qty'];

            // Query untuk menyimpan item ke tabel oder_items
            $insert_temp = 'INSERT INTO order_items (order_id, username, ip_add, item_id, qty, subtotal) 
                            SELECT o.order_id, "' . $username . '", "' . $ip . '", "' . $item_id . '", "' . $qty_item . '", "' . $subtotal_item . '" 
                            FROM orders o 
                            WHERE o.order_id = "' . $or_id . '"';
            $conn->exec($insert_temp);
        }

        // Query untuk mengupdate orderan sekaligus menambah orderan
        $update_c = "update orders set status='Sedang Diproses', aktif=1, total ='" . $mtotal . "', tanggal_order=DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s') where order_id='" . $or_id . "'";
        $del_cart = $conn->query("delete from cart where cust_id = '" . $cust_id . "'");
        if ($conn->query($update_c) == TRUE) {
            echo "<script>window.open('ordersucces.php?cancel_id=1','_self')</script>";
        } else {
            echo "Error: " . $insert_c . "<br>" . $conn->error;
        }
    } else {
        $del_c = "delete from orders where order_id ='" . $or_id . "'";
        $del_order = "delete from order_items where cust_id ='" . $cust_id . "'";
        if ($conn->query($del_c) == TRUE) {
            echo "<script>window.open('ordersucces.php?cancel_id=2','_self')</script>";
        } else {
            echo "Error: " . $insert_c . "<br>" . $conn->error;
        }
    }
}


?>