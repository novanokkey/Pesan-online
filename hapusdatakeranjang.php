<?php
function __autoload($class)
{
    require_once "class/$class.php";
}

session_start();
$pelanggan = new Pelanggan();

$currentUser = $pelanggan->getUser();

        $idpelanggan = $currentUser['idpelanggan'];
      
       $keranjang = new Keranjang();
       

    if($keranjang->deleteKeranjangPelanggan($idpelanggan)){
      echo"Your Data Successfully Deleted";
      echo "<script>location.href='keranjang'</script>";
      
    }else{
     echo "<script>alert('Data not deleted!');</script>";
     echo "<script>location.href='keranjang'</script>";
    }
  
    