<?php
error_reporting(0);
function __autoload($class)
{
    require_once "class/$class.php";
}
session_start(); 
$folder   = "pesananku";

$pelanggan = new Pelanggan();

$currentUser = $pelanggan->getUser();

$tabeldb  = "$folder";
$hal    = "$folder.php";
$halaman  = "pesananku";

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
                        <h1 class="title-single">Pesanan Ku</h1>
                        <span class="color-text-a">Lihat pesananku</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">pesananku</a>
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
                                <th scope="col" width="13%">No tagihan</th>
                                <th scope="col">Total tagihan</th>
                                <th scope="col">Metode pembayaran</th>
                                <th scope="col">Status</th>
                                <th scope="col">
                                    Catatan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=1;
                            $rows_keranjang = $keranjang->selectPesenan($idpelanggan);
                            foreach ($rows_keranjang as $row) {

                                
                        ?>
                            <tr>
                            <td><?php echo $row['notagihan']; ?> </td>
                            <td><?php echo number_format($row['totaltagihan'],0,',','.'); ?></td>
                                <td><?php echo $row['metode_pembayaran']; ?> </td>
                                <td><?php if($row['status_pembayaran']=='T'){echo 'Diproses admin'; }else{ echo 'Sudah diproses'; }  ?> </td>
                                <td><?php echo $row['catatan']; ?> </td>
                                
                                
                            </tr>
                            
 <?php }?>
 
                        </tbody>
                    </table>
                    
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