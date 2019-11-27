<?php
error_reporting(0);
class Konfirmasi extends Db
{

    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM konfirmasi_tagihan order by notagihan desc";
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
        $sql = "SELECT * FROM konfirmasi_tagihan";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($notagihan, $namapengirim, $email, $bankasal, $tgltransfer, $banktujuan, $jumlahtransfer, $pesan)
    {
        $sql = "INSERT INTO konfirmasi_tagihan (notagihan, namapengirim, email, bankasal, tgltransfer, banktujuan, jumlahtransfer, pesan) VALUES (:notagihan, :namapengirim, :email, :bankasal, :tgltransfer, :banktujuan, :jumlahtransfer, :pesan)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':notagihan' => $notagihan,
            ':namapengirim' => $namapengirim, ':email' => $email, ':bankasal' => $bankasal, ':tgltransfer' => $tgltransfer, ':banktujuan' => $banktujuan, ':jumlahtransfer' => $jumlahtransfer, ':pesan' => $pesan
        ));

        return true;
    }

    public function editData($id, $notagihan, $namapengirim, $email, $bankasal, $tgltransfer, $banktujuan, $jumlahtransfer, $pesan)
    {
        $sql = "UPDATE konfirmasi_tagihan
                    SET notagihan=:notagihan, namapengirim=:namapengirim, email=:email, bankasal=:bankasal, tgltransfer=:tgltransfer, banktujuan=:banktujuan, jumlahtransfer=:jumlahtransfer, pesan=:pesan
        WHERE idkonfirmasi=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':notagihan' => $notagihan,
            ':namapengirim' => $namapengirim, ':email' => $email, ':bankasal' => $bankasal, ':tgltransfer' => $tgltransfer, ':banktujuan' => $banktujuan, ':jumlahtransfer' => $jumlahtransfer, ':pesan' => $pesan
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM konfirmasi_tagihan WHERE idkonfirmasi=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}