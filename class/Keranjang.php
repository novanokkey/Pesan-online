<?php
class Keranjang extends Db
{

    // select all data
    public function selectall($idsession)
    {
        $sql = "SELECT pesanan_detail.idpesanan,pesanan_detail.idproduk,pesanan_detail.notagihan,pesanan_detail.jumlah,pesanan_detail.idsession,pesanan_detail.`status`,produk.nama_produk,produk.harga FROM pesanan_detail
        INNER JOIN produk ON produk.idproduk=pesanan_detail.idproduk 
         WHERE pesanan_detail.idsession='$idsession' group by produk.idproduk";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectCountall($idsession)
    {

        $sql = "SELECT COUNT(idsession) AS 'idsession' FROM pesanan_detail
        WHERE pesanan_detail.idsession='$idsession'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function selectCountProduk($idproduk)
    {

        $sql = "SELECT COUNT(idproduk) AS 'idproduk' FROM pesanan_detail
        WHERE pesanan_detail.idproduk='$idproduk'";
        
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    

    public function addData($idproduk, $jumlah, $idsession)
    {       
                $sql1 = "INSERT INTO pesanan_detail (idproduk,jumlah,idsession) VALUES (:idproduk,:jumlah,:idsession)";
                $q = $this->connect()->prepare($sql1);
                $q->execute(array(
                    ':idproduk' => $idproduk,
                    ':jumlah' => $jumlah, ':idsession' => $idsession
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
}