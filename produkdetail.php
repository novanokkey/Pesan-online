<?php
error_reporting(0);
function __autoload($class)
{
    require_once "class/$class.php";
}
session_start();
$folder   = "home";

$tabeldb  = "$folder";
$hal    = "$folder.php";
$halaman  = "home";

$produk = new Produk();
$rows_produk = $produk->selectByid($_REQUEST['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ESHOP::.</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">

    <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <div class="click-closed"></div>
    <!--/ Form Search Star /-->

    <!--/ Form Search End /-->

    <?php include "head.php"; ?>
    <!--/ Nav End /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single"><?php echo $rows_produk['nama_produk']; ?></h1>
                        <span class="color-text-a">Pilihan terbaik untuk anda</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Produk</a>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="property-single nav-arrow-b">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                        <div class="carousel-item-b">
                            <img src="img/produk/<?php echo $rows_produk['gambar1']; ?>" alt="">
                        </div>
                        <div class="carousel-item-b">
                            <img src="img/<?php echo $rows_produk['gambar2']; ?>" alt="">
                        </div>
                        <div class="carousel-item-b">
                            <img src="img/<?php echo $rows_produk['gambar3']; ?>" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-md-5 col-lg-4">
                            <div class="property-price d-flex justify-content-center foo">
                                <div class="card-header-c d-flex">
                                    <div class="card-box-ico">
                                        <span class="ion-money">Rp</span>
                                    </div>
                                    <div class="card-title-c align-self-center">
                                        <h5 class="title-c"><?php echo $rows_produk['harga']; ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="property-summary">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="title-box-d section-t4">
                                            <h3 class="title-d">Info singkat</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="summary-list">
                                    <ul class="list">
                                        <li class="d-flex justify-content-between">
                                            <strong>Kategori:</strong>
                                            <span><?php echo $rows_produk['nama_kategori']; ?></span>
                                        </li>
                                        <li class="d-flex justify-content-between">
                                            <strong>Stok:</strong>
                                            <span><?php echo $rows_produk['stok']; ?></span>
                                        </li>

                                    </ul>
                                </div>
                                <hr>
                                <center><a href="keranjang.php" class="btn btn-success btn-lg">
                                        Pesan Sekarang
                                    </a>
                                </center>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 section-md-t3">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Info Detail <br><?php echo $rows_produk['nama_produk']; ?>
                                        </h3>

                                    </div>
                                </div>

                            </div>
                            <div class="property-description">

                                <p class="description color-text-a">
                                    <?php echo $rows_produk['deskripsi']; ?>
                                </p>

                            </div>

                            <hr>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <?php include "foot.php"; ?>
    <!--/ Footer End /-->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/scrollreveal/scrollreveal.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

</body>

</html>