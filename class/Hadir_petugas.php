<?php
class Hadir_petugas extends Db
{

    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM hadir_petugas";
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
        $sql = "SELECT * FROM hadir_petugas WHERE idhadir = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($idpetugas, $idjadwal, $paraf, $keterangan)
    {
        $sql = "INSERT INTO hadir_petugas (idpetugas,idjadwal,paraf,keterangan) VALUES (:idpetugas,:idjadwal,:paraf,:keterangan)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idpetugas' => $idpetugas,
            ':idjadwal' => $idjadwal, ':paraf' => $paraf, ':keterangan' => $keterangan
        ));

        return true;
    }

    public function editData($id, $idpetugas, $idjadwal, $paraf, $keterangan)
    {
        $sql = "UPDATE hadir_petugas
                    SET idpetugas=:idpetugas,idjadwal=:idjadwal,paraf=:paraf,keterangan=:keterangan
                     WHERE idhadir=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':idpetugas' => $idpetugas,
            ':idjadwal' => $idjadwal, ':paraf' => $paraf, ':keterangan' => $keterangan
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM hadir_petugas WHERE idhadir=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}