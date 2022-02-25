<?php
    require '../config.php';

    session_start();

    if(empty($_SESSION)){
        header("Location: index.php");
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/square-logo.png">
    <link rel="icon" type="image/png" href="../img/square-logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $WEB_CONFIG['app_name'] ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
    <style>
        .bg-orange {
            color: darkorange;
        }
    </style>
</head>

<body class="index-page sidebar-collapse">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="margin-left: -15px; margin-right:-15px;">
                <div class="panel" style="width: 280px; height: 670px; background-color: #002539; padding: 8px;">
                    <div class="panel-body">
                        <div class="container">
                            <img src="../img/square-logo.png" style="margin-bottom: 10px;margin-top:20px;margin-left:50px;height: 100px; width:100px;" alt="Circle Image" class="rounded-circle">
                            <h3 style="color: white; margin-left: 25px;margin-top: 10px; font-weight:bold;">PT. Harapan</h3>
                        </div>
                        <a href="<?= $WEB_CONFIG['base_url'] ?>adminhacom/crudproduk/"><button class="btn btn-lg" type="button" style="background-color: #002539; margin-left:15px; font-size: 16pt">
                        <i class="now-ui-icons shopping_box"></i> Produk
                        </button></a>
                        <a href="<?= $WEB_CONFIG['base_url'] ?>adminhacom/crudpemesanan/"><button class="btn btn-lg" type="button" style="background-color: #002539; margin-left:15px; font-size: 16pt">
                        <i class="now-ui-icons shopping_delivery-fast"></i> Pesanan
                        </button></a>
                        <a href="<?= $WEB_CONFIG['base_url'] ?>adminhacom/crudadmin/"><button class="btn btn-lg" type="button" style="background-color: #002539; margin-left:15px; font-size: 16pt">
                        <i class="now-ui-icons users_circle-08"></i> Akun
                        </button></a>
                        <p><a href="logout.php" class="btn btn-lg" onclick="return confirm('Yakin ingin Logout?')" style="background-color: #002539; margin-left:15px; font-size: 16pt"><i class="now-ui-icons arrows-1_share-66"></i> Log out</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9" style="margin-left: -20px; margin-right:-30px; margin-top: 20px; background-image:url('../img/bg/vector.jpg');">
                <h2>Dashboard Admin</h2>
                <br/>
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-md-2.5">
                        <div class="card card-signup " style="padding:10px;background-color: darkorange;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p style="font-weight: bold; "> Jumlah Produk</p>
                            <div class="card-body text-center">
                            <?php
                            $sql = "SELECT COUNT(*) as jumlah FROM tb_produk";
                            $result = mysqli_query($koneksi, $sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                                <h2 style="font-weight: bold;"><?= $row['jumlah'] ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card card-signup text-white" style="padding:10px;background-color: darkcyan;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p style="font-weight: bold;"> Jumlah Terjual :</p>
                            <div class="card-body text-center">
                            <?php
                            $sql1 = "SELECT SUM(pm_kuant) as jumlah FROM tb_pemesanan WHERE pm_status = 'SUDAH'";
                            $result1 = mysqli_query($koneksi, $sql1);
                            $row1 = mysqli_fetch_assoc($result1);
                            ?>
                                <h2 style="font-weight: bold;"><?= $row1['jumlah'] ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2.5">
                        <div class="card card-signup text-white" style="padding:10px;background-color: darkred;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p style="font-weight: bold; "> Jumlah Transaksi :</p>
                            <div class="card-body text-center">
                            <?php
                            $sql2 = "SELECT COUNT(*) as jumlah FROM tb_pemesanan WHERE pm_status = 'SUDAH'";
                            $result2 = mysqli_query($koneksi, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            ?>
                                <h2 style="font-weight: bold;"><?= $row2['jumlah'] ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-signup text-white" style="padding:10px;background-color: grey;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                            <p style="font-weight: bold;"> Income :</p>
                            <div class="card-body text-center">
                            <?php
                            $sql3 = "SELECT SUM(pm_total) as jumlah FROM tb_pemesanan WHERE pm_status = 'SUDAH'";
                            $result3 = mysqli_query($koneksi, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            ?>
                                <h2 style="font-weight: bold;"><?= $row3['jumlah'] ?></h2>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <img src="../img/bg/vectortr1.jpg" alt="" style="margin-top:-170px; height:600px;width:1200px">
            </div>
        </div>
    </div>
    




    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            // the body of this function is in assets/js/now-ui-kit.js
            nowuiKit.initSliders();
        });

        function scrollToDownload() {

            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script>
</body>

</html>