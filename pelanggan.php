<?php
error_reporting(0);
function __autoload($class)
{
    require_once "class/$class.php";
}

$folder   = "pelanggan";

$tabeldb  = "$folder";
$hal    = "$folder.php";
$halaman  = "pelanggan";

$pelanggan = new Pelanggan();

$currentUser = $pelanggan->getUser();

if (isset($_POST['login'])) {

    $email = $_POST['email'];

    $password = $_POST['password'];

    // Proses login user 

    if ($pelanggan->login($email, $password)) {
        echo "<script>alert('Login berhasil');</script>";
        header("location: produk");
    } else {

        // Jika login gagal, ambil pesan error 

        $error = $petugas->getLastError();
    }
}

if (isset($_POST['submit'])) {

    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $kodepos = $_POST['kodepos'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pelanggan = new Pelanggan();

    if ($pelanggan->addData($nama_lengkap, $alamat, $kodepos, $nohp, $email, $password)) {
        echo "<script>alert('Registrasi berhasil');</script>";
        echo "<script>location.href='$folder'</script>";
    } else {
        echo "<script>alert('Registrasi belum disimpan, mungkin email sudah terdaftar!');</script>";
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
                        <h1 class="title-single">Registrasi / Login</h1>
                        <span class="color-text-a">Buat akun sekarang</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">akun pelanggan</a>
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
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registrasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Login</a>
                    </li>
                    
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <br><br>
                    <center><h1>Registrasi Pelanggan</h1></center>
                    <br><br>
                    <form id="form" action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>No. Handphone</label>
                                        <input name="nohp" type="text" class="form-control"
                                            placeholder="No. HP">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input name="alamat" type="text" class="form-control" placeholder="Input dengan alamat lengkap, Gedung/Jalan secara detail">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Kode POS</label>
                                        <input name="kodepos" type="text" class="form-control" placeholder="kode pos">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block" name="submit">Registrasi</button>
                                
                                </div>
                                
                            </div>
                        </form>
                    
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <br><br>
                    <center><h1>Login</h1></center>
                    <br><br>
                    <form action="" class="validate_form" method="post" enctype="multipart/form-data">
                            
                            <div class="row">
                                
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Login</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                </div>
                


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