<?php
error_reporting(0);
function __autoload($class)
{
    require_once "class/$class.php";
}
session_start();
$folder   = "konfirmasi";

$tabeldb  = "$folder";
$hal    = "$folder.php";
$halaman  = "konfirmasi";

$pelanggan = new Pelanggan();

$currentUser = $pelanggan->getUser();



if (isset($_POST['submit'])) {

    $notagihan = $_POST['notagihan'];
    $namapengirim = $_POST['namapengirim'];
    $email = $_POST['email'];
    $bankasal = $_POST['bankasal'];
    $tgltransfer = $_POST['tgltransfer'];
    $banktujuan = $_POST['banktujuan'];
    $jumlahtransfer = $_POST['jumlahtransfer'];
    $pesan = $_POST['pesan'];

    $konfirmasi = new Konfirmasi();

    if ($konfirmasi->addData($notagihan, $namapengirim, $email, $bankasal, $tgltransfer, $banktujuan, $jumlahtransfer, $pesan)) {
        echo "<script>alert('Konfirmasi berhasil, akan segera diproses petugas trimakasih');</script>";
        echo "<script>location.href='$folder'</script>";
    } else {
        echo "<script>alert('Konfirmasi pembayaran belum berhasil, mungkin terjadi kesalahan');</script>";
        echo "<script>location.href='$folder'</script>";
    }
}

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
                        <h1 class="title-single">Konfirmasi pembayaran</h1>
                        <span class="color-text-a">segera lakukan pembayaran</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Konfirmasi</a>
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
                
                    <form id="form" action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>No. Tagihan</label>
                                        <input type="text" name="notagihan" class="form-control" placeholder="No. tagihan">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Nama pengirim</label>
                                        <input name="namapengirim" type="text" class="form-control"
                                            placeholder="Nama pengirim">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control" placeholder="Email">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Bank asal(pengirim)</label>
                                        <input name="bankasal" type="text" class="form-control" placeholder="Bank asal">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Tanggal transfer</label>
                                        <input name="tgltransfer" type="text" class="form-control" placeholder="Tanggal transfer">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Bank tujuan</label>
                                        <input type="text" name="banktujuan" class="form-control" placeholder="bank tujuan">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Jumlah transfer</label>
                                        <input type="text" name="jumlahtransfer" class="form-control" placeholder="Jumlah transfer Rp.xxxxxxx">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Pesan</label>
                                        <input type="text" name="pesan" class="form-control" placeholder="pesan">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Konfirmasi sekarang</button>
                                
                                </div>
                                
                            </div>
                        </form>
                    
                


            </div>
        </div>
    </section>



    <<?php include "foot.php"; ?>
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