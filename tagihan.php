<?php
error_reporting(0);
function __autoload($class)
{
    require_once "class/$class.php";
}
$pelanggan = new Pelanggan();

$currentUser = $pelanggan->getUser();

$folder   = "tagihan";

$tabeldb  = "$folder";
$hal    = "$folder.php";
$halaman  = "tagihan";

$produk = new Produk();

$keranjang = new Keranjang();
                    $notagihan_ = $keranjang->noTagihan();
                    $mytagihan = $notagihan_['idpesanan'] + 1;
                    $hasilkode = "INV".str_pad($mytagihan, 4, "0", STR_PAD_LEFT);

if (isset($_POST['submit'])) {
    

    $idpelanggan = $currentUser['idpelanggan'];
    $notagihan1 = $hasilkode;
    $notagihan2 = $hasilkode;
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $catatan = $_POST['catatan'];
    

    $keranjang = new Keranjang();

    if ($keranjang->addNotagihan($idpelanggan, $notagihan1, $notagihan2, $catatan, $metode_pembayaran)) {
        echo "<script>alert('Pemesanan sudah dikirim, silahkan lakukan pembayaran dan konfirmasi pembayaran..');</script>";
        echo "<script>location.href='produk'</script>";
    } else {
        echo "<script>alert('Pesanan anda belum terkirim, cek terlebih dahulu mungkin ada error');</script>";
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

    <!--/ Nav Star /-->
    <?php include "head.php"; ?>
    <!--/ Nav End /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Tagihan Ku</h1>
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
                <form id="form" action="" class="form-horizontal" enctype="multipart/form-data" method="post">
                <?php
                    
  
?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>No. Tagihan</label>
                                        <input type="text" name="notagihan" class="form-control" value="<?php echo $hasilkode; ?>" readonly placeholder="No. tagihan">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Nama Pemesan</label>
                                        <input name="namapengirim" type="text" value="<?php echo $currentUser['nama_lengkap'];?>" readonly class="form-control"
                                            placeholder="Nama pengirim">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Kode POS</label>
                                        <input type="text" name="kodepos" value="<?php echo $currentUser['kodepos'];?>" readonly class="form-control" placeholder="Kode pos">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>No. HP</label>
                                        <input type="text" name="nohp" value="<?php echo $currentUser['nohp'];?>" readonly class="form-control" placeholder="No. HP">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" value="<?php echo $currentUser['alamat'];?>" readonly class="form-control" placeholder="alamat">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Cara Bayar</label>
                                        <select class="form-control" name="metode_pembayaran" style="width: 100%;" required>
                                        <option value="">Pilih</option>
                                        <option value="transfer">Transfer</option>
                                        <option value="bayar_ditempat">Bayar ditempat</option>

                                    </select>
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label>Catatan</label>
                                        <input type="text" name="catatan" class="form-control" placeholder="catatan">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                <button type="submit" class=" btn btn-a  btn-block" name="submit">Selesaikan sekarang</button>
                                
                                </div>
                                
                            </div>
                        </form>
                </div>
                <div class="col-sm-4">


<?php

$idpelanggan = $currentUser['idpelanggan'];
$daftar_tagihan = $keranjang->selectSumTagihan($idpelanggan);
?>
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
                        <?php
                        $i=1;
                            $rows_keranjang = $keranjang->selectall($idpelanggan);
                            foreach ($rows_keranjang as $row) {

                                $idproduk = $row['idproduk'];
                                $hit_produk = $keranjang->selectCountProduk($idproduk,$idpelanggan);
                        ?>
                            <tr>

                                <td><?php echo $row['nama_produk']; ?> x <?php echo $hit_produk['idproduk']; ?> </td>

                                <td>
                                    <right><?php echo number_format($row['harga'],0,',','.'); ?></right>
                                </td>
                            </tr>
                            <?php }?>
                            <tr style="background-color:green;">
                                <th>
                                <font color="black"><left>Total</left></font>
                                </th>

                                <td><font color="black">
                                    <right><?php 
                                     

                                     echo number_format($total,0,',','.')
                                     ?></right>
                                     </font>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <hr>
                    

                </div>


            </div>
        </div>
    </section>

<br><hr>

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