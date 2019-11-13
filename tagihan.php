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

$produk = new Produk();

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

    <!--/ Nav Star /-->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="index.html">E<span class="color-b">SHOP</span></a>
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none"
                data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span class="fa fa-search" aria-hidden="true"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-left" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                </ul>
            </div>
            <a href="keranjang.php" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block"
                data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                Keranjang Ku (0)
            </a>
        </div>
    </nav>
    <!--/ Nav End /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Taguhan Ku</h1>
                        <span class="color-text-a">Pilihan terbaik untuk anda</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">tagihan</a>
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
                <div class="col-sm-8">
                    <form class="form-a contactForm" action="" method="post" role="form">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Nama Depan</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Depan">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Nama Belakang</label>
                                    <input name="namabelakang" type="text" class="form-control"
                                        placeholder="Nama belakang">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input name="provinsi" type="text" class="form-control" placeholder="Provinsi">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Kota</label>
                                    <input name="kota" type="text" class="form-control" placeholder="Kota">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input name="kelurahan" type="text" class="form-control" placeholder="Kelurahan">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Nama Depan">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input name="kodepos" type="text" class="form-control" placeholder="Kode pos">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>No. Handphone</label>
                                    <input name="nohp" type="text" class="form-control" placeholder="No. Handphone">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" placeholder="Kode pos">
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="catatan" class="form-control" cols="45" rows="8"
                                        data-rule="required" data-msg="Please write something for us"
                                        placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="col-sm-4">



                    <table class="table">
                        <thead class="thead-dark">
                            <tr>

                                <th scope="col">Produk</th>
                                <th scope="col">
                                    <right>SubTotal</right>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>Kamar Bintang 7 x 1</td>

                                <td>
                                    <right>120.000</right>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <left>Total</left>
                                </th>

                                <td>
                                    <right>120.000</right>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <hr>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-a">Selesaikan Tagihan</button>
                    </div>

                </div>


            </div>
        </div>
    </section>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">Hubungi Kami</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Tentang Kami</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Pusat Bantuan</a>
                            </li>

                        </ul>
                    </nav>

                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">ESHOP</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
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