<?php
function __autoload($class)
{
    require_once "class/$class.php";
}

session_start();
$pelanggan = new Pelanggan();

$currentUser = $pelanggan->getUser();

        $idproduk=$_GET['id'];
        $jumlah='1';
        $idpelanggan = $currentUser['idpelanggan'];
      
       $keranjang = new Keranjang();
       

       if($keranjang->addData($idproduk, $jumlah, $idpelanggan)){
        //echo "<script>alert('Data saved!');</script>";
        echo "<script>location.href='home'</script>";
        
       }else{
        //echo "<script>alert('Data not saved!');</script>";
        echo "<script>location.href='home'</script>";
       }
    