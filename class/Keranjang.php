<?php
error_reporting(0);
class Keranjang extends Db
{
    function __construct()

    {
        session_start();
    }

//membuat no tagihan
public function noTagihan()
{
    

    $sql = "SELECT * FROM pesanan order by idpesanan desc limit 1";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
}

    
    //menampilkan list tagihan admin
    public function selectTagihanadm()
    {
        $sql = "SELECT pesanan.notagihan,pesanan.metode_pembayaran,pesanan.status_pembayaran,pesanan.catatan,pelanggan.nama_lengkap,pelanggan.nohp,
        SUM(produk.harga) AS 'totaltagihan' FROM pesanan
               INNER JOIN pesanan_detail ON pesanan_detail.notagihan=pesanan.notagihan
               INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk
               INNER JOIN pelanggan ON pelanggan.idpelanggan=pesanan_detail.idpelanggan
               GROUP BY pesanan.notagihan order by pesanan.notagihan desc";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectDetailtagihan($notagihan)
    {

        $sql = "SELECT pesanan.notagihan,pesanan.metode_pembayaran,pesanan.status_pembayaran,pesanan.catatan,pelanggan.nama_lengkap,pelanggan.nohp,
        SUM(produk.harga) AS 'totaltagihan' FROM pesanan
               INNER JOIN pesanan_detail ON pesanan_detail.notagihan=pesanan.notagihan
               INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk
               INNER JOIN pelanggan ON pelanggan.idpelanggan=pesanan_detail.idpelanggan
        WHERE pesanan.notagihan='$notagihan'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function selectDaftarPesanan($notagihan)
    {
        $sql = "SELECT pesanan_detail.idpesanandetail,pesanan_detail.idproduk,pesanan_detail.notagihan,pesanan_detail.jumlah,pesanan_detail.idpelanggan,pesanan_detail.`status`,produk.nama_produk,produk.harga FROM pesanan_detail
        INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk
               
        WHERE pesanan_detail.notagihan='$notagihan' group by produk.idproduk";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }


    public function selectCountDetailpesanan($idproduk,$idpelanggan,$notagihan)
    {

        $sql = "SELECT COUNT(idproduk) AS 'idproduk' FROM pesanan_detail
        WHERE pesanan_detail.idproduk='$idproduk' and idpelanggan='$idpelanggan' and notagihan='$notagihan'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

// menampilkan list pesenan pelanggan
    public function selectPesenan($idpelanggan)
    {
        $sql = "SELECT pesanan.notagihan,pesanan.metode_pembayaran,pesanan.status_pembayaran,pesanan.catatan,
        SUM(produk.harga) AS 'totaltagihan', pesanan_detail.idpelanggan FROM pesanan
               INNER JOIN pesanan_detail ON pesanan_detail.notagihan=pesanan.notagihan
               INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk
               WHERE pesanan_detail.idpelanggan='$idpelanggan'
               GROUP BY pesanan.notagihan order by pesanan.notagihan desc";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // membuat no tagihan
    public function addNotagihan($idpelanggan, $notagihan1, $notagihan2, $catatan, $metode_pembayaran)
    {
        $sql = "UPDATE pesanan_detail
                    SET notagihan='$notagihan1', status='1'
        WHERE idpelanggan=:idpelanggan and status='0'";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idpelanggan' => $idpelanggan
        ));
//---------------------------
        $sql1 = "INSERT INTO pesanan (notagihan,metode_pembayaran,catatan) VALUES ('$notagihan2',:metode_pembayaran,:catatan)";

        $q1 = $this->connect()->prepare($sql1);
        $q1->execute(array(
            ':metode_pembayaran' => $metode_pembayaran, ':catatan' => $catatan
        ));
        
        return true;
    }

    // menampilkan jumlah tagihan
    public function selectSumTagihan($idpelanggan)
    {

        $sql = "SELECT SUM(harga) AS 'harga' FROM pesanan_detail
        INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk
                WHERE pesanan_detail.idpelanggan='$idpelanggan'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // select all data
    public function selectall($idpelanggan)
    {
        $sql = "SELECT pesanan_detail.idpesanandetail,pesanan_detail.idproduk,pesanan_detail.notagihan,pesanan_detail.jumlah,pesanan_detail.idpelanggan,pesanan_detail.`status`,produk.nama_produk,produk.harga FROM pesanan_detail
        INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk 
         WHERE pesanan_detail.idpelanggan='$idpelanggan' and status='0' group by produk.idproduk";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectCountall($idpelanggan)
    {

        $sql = "SELECT COUNT(idpelanggan) AS 'idpelanggan' FROM pesanan_detail
        WHERE pesanan_detail.idpelanggan='$idpelanggan' and status='0'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function selectCountProduk($idproduk,$idpelanggan)
    {

        $sql = "SELECT COUNT(idproduk) AS 'idproduk' FROM pesanan_detail
        WHERE pesanan_detail.idproduk='$idproduk' and idpelanggan='$idpelanggan' and status='0'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }


    public function addData($idproduk, $jumlah, $idpelanggan)
    {       
                $sql1 = "INSERT INTO pesanan_detail (idproduk,jumlah,idpelanggan) VALUES (:idproduk,:jumlah,:idpelanggan)";
                $q = $this->connect()->prepare($sql1);
                $q->execute(array(
                    ':idproduk' => $idproduk,
                    ':jumlah' => $jumlah, ':idpelanggan' => $idpelanggan
                ));

                return true;
           
    }

    public function editData($id, $idkatproduk, $nama_produk, $deskripsi, $harga, $stok, $gambar1, $gambar2, $gambar3)
    {
        $sql = "UPDATE produk
                    SET idkatproduk=:idkatproduk,nama_produk=:nama_produk,deskripsi=:deskripsi,harga=:harga,stok=:stok,gambar1=:gambar1, gambar2=:gambar2,gambar3=:gambar3
        WHERE idproduk=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':idkatproduk' => $idkatproduk,
            ':nama_produk' => $nama_produk, ':deskripsi' => $deskripsi, ':harga' => $harga, ':stok' => $stok, ':gambar1' => $gambar1, ':gambar2' => $gambar2, ':gambar3' => $gambar3
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM pesanan_detail WHERE idproduk=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }

    public function selectByid($id)
    {
        $sql = "SELECT * FROM produk
        INNER JOIN kategori_produk ON kategori_produk.idkatproduk=produk.idkatproduk WHERE idproduk = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function editDataPembayaran($id, $status_pembayaran)
    {
        $sql = "UPDATE pesanan
                    SET status_pembayaran=:status_pembayaran
        WHERE notagihan=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':status_pembayaran' => $status_pembayaran
        ));

        return true;
    }

    public function deleteKeranjangPelanggan($id)
    {
        $sql = "DELETE FROM pesanan_detail WHERE idpelanggan=:id and status='0'";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }

}