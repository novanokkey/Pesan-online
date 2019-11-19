<?php
class Surat_tugas extends Db
{

    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM surat_tugas";
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
        $sql = "SELECT * FROM surat_tugas WHERE idsurattugas = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($nomor, $tgl, $idjadwal)
    {
        $sql = "INSERT INTO surat_tugas (nomor,tgl,idjadwal) VALUES (:nomor,:tgl,:idjadwal)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':nomor' => $nomor, ':tgl' => $tgl, ':idjadwal' => $idjadwal
        ));

        return true;
    }

    public function editData($id, $nomor, $tgl, $idjadwal)
    {
        $sql = "UPDATE surat_tugas
                    SET nomor:=nomor,tgl:=tgl,idjadwal:=idjadwal
                     WHERE idsurattugas=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':nomor' => $nomor, ':tgl' => $tgl, ':idjadwal' => $idjadwal
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM surat_tugas WHERE idsurattugas=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}