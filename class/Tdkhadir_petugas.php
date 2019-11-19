<?php
class Tdkhadir_petugas extends Db
{

    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM tdkhadir_petugas";
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
        $sql = "SELECT * FROM tdkhadir_petugas WHERE idtdkhadir = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($idpetugas_tdkhadir, $idpetugas_pengganti, $idjadwal_awal, $idjadwal_pengganti, $alasan)
    {
        $sql = "INSERT INTO tdkhadir_petugas (idpetugas_tdkhadir,idpetugas_pengganti,idjadwal_awal,idjadwal_pengganti,alasan) VALUES (:idpetugas_tdkhadir,:idpetugas_pengganti,:idjadwal_awal,:idjadwal_pengganti,:alasan)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idpetugas_tdkhadir' => $idpetugas_tdkhadir, ':idpetugas_pengganti' => $idpetugas_pengganti, ':idjadwal_awal' => $idjadwal_awal, ':idjadwal_pengganti' => $idjadwal_pengganti, ':alasan' => $alasan
        ));

        return true;
    }

    public function editData($id, $idpetugas_tdkhadir, $idpetugas_pengganti, $idjadwal_awal, $idjadwal_pengganti, $alasan)
    {
        $sql = "UPDATE tdkhadir_petugas
                    SET idpetugas_tdkhadir:=idpetugas_tdkhadir,idpetugas_pengganti:=idpetugas_pengganti,idjadwal_awal:=idjadwal_awal,idjadwal_pengganti:=idjadwal_pengganti,alasan:=alasan
                     WHERE idtdkhadir=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':idpetugas_tdkhadir' => $idpetugas_tdkhadir, ':idpetugas_pengganti' => $idpetugas_pengganti, ':idjadwal_awal' => $idjadwal_awal, ':idjadwal_pengganti' => $idjadwal_pengganti, ':alasan' => $alasan
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM tdkhadir_petugas WHERE idtdkhadir=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}