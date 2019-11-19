<?php
function __autoload($class)
{
    require_once "class/$class.php";
}

session_start();

        $idproduk=$_GET['id'];
        $jumlah='1';
        $idsession = session_id();
       $keranjang = new Keranjang();
       

       if($keranjang->addData($idproduk, $jumlah, $idsession)){
        //echo "<script>alert('Data saved!');</script>";
        echo "<script>location.href='home'</script>";
        
       }else{
        //echo "<script>alert('Data not saved!');</script>";
        echo "<script>location.href='home'</script>";
       }
    