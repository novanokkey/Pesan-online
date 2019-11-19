<?php
error_reporting(0);
function __autoload($class)
{
    require_once "class/$class.php";
}

$folder   = "home";

$tabeldb  = "$folder";
$hal    = "$folder.php";
$halaman  = "home";
session_start(); 
$keranjang = new Keranjang();

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
                        <h1 class="title-single">Keranjang Ku</h1>
                        <span class="color-text-a">Pilihan terbaik untuk anda</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Keranjang</a>
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



                    <table class="table table-sm table-dark">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="25%">Produk</th>
                                <th scope="col" width="10%">Harga (Rp)</th>
                                <th scope="col" width="5%">Jumlah</th>
                                <th scope="col" width="15%">
                                    <center>Sub Total (Rp)</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                            $rows_keranjang = $keranjang->selectall($idsession);
                            foreach ($rows_keranjang as $row) {

                                $idproduk = $row['idproduk'];
                                $hit_produk = $keranjang->selectCountProduk($idproduk);
                        ?>
                            <tr>
                                <th scope="row"><?php echo $i++ ?></th>
                                <td><?php echo $row['nama_produk']; ?> </td>
                                <td><?php echo number_format($row['harga'],0,',','.'); ?></td>
                                <td><?php echo $hit_produk['idproduk']; ?> 
                                </td>
                                <td>
                                    <center>
                                    <?php 
                                    
                                    echo number_format($row['harga']*$hit_produk['idproduk'],0,',','.'); 
                                    $jumlah = $row['harga']*$hit_produk['idproduk'];
                                    $total = $total + $jumlah;
                                    ?>
                                    </center>
                                </td>
                            </tr>
                            
 <?php }?>
 <tr>
                                <th colspan="4">
                                    <center>Total Pesanan</center>
                                </th>

                                <td>
                                    <center>
                                    <?php 
                                     

                                    echo number_format($total,0,',','.')
                                    ?>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="produk.php" class="btn btn-warning navbar-toggle-box-collapse d-none d-md-block">
                                << Cari Produk lagi </a> </div> <div class="col-md-6">
                                    <a href="tagihan.php"
                                        class="btn btn-primary navbar-toggle-box-collapse d-none d-md-block">
                                        Selesaikan Pesanan >>
                                    </a>

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