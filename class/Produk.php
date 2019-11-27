<?php
error_reporting(0);
class Produk extends Db
{
    function __construct()

    {
        session_start();
    }
    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM produk INNER JOIN kategori_produk ON kategori_produk.idkatproduk=produk.idkatproduk";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallkategori()
    {
        $sql = "SELECT * FROM kategori_produk";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
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

    public function addData($idkatproduk, $nama_produk, $deskripsi, $harga, $stok, $gambar1, $gambar2, $gambar3)
    {
        $sql = "INSERT INTO produk (idkatproduk,nama_produk,deskripsi,harga,stok,gambar1, gambar2,gambar3) VALUES (:idkatproduk,:nama_produk,:deskripsi,:harga,:stok,:gambar1, :gambar2,:gambar3)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idkatproduk' => $idkatproduk,
            ':nama_produk' => $nama_produk, ':deskripsi' => $deskripsi, ':harga' => $harga, ':stok' => $stok, ':gambar1' => $gambar1, ':gambar2' => $gambar2, ':gambar3' => $gambar3
        ));

        return true;
    }

    public function editData($id, $idkatproduk, $nama_produk, $deskripsi, $harga, $stok)
    {
        $sql = "UPDATE produk
                    SET idkatproduk=:idkatproduk,nama_produk=:nama_produk,deskripsi=:deskripsi,harga=:harga,stok=:stok
        WHERE idproduk=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':idkatproduk' => $idkatproduk,
            ':nama_produk' => $nama_produk, ':deskripsi' => $deskripsi, ':harga' => $harga, ':stok' => $stok
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM produk WHERE idproduk=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}