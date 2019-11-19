<?php
class Jadwal_petugas extends Db
{

    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM jadwal_petugas";
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
        $sql = "SELECT * FROM jadwal_petugas WHERE idjadwalpetugas = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($idpetugas, $idpetugas_pengganti, $idjadwal, $idsesi, $konfirm_hdr)
    {
        $sql = "INSERT INTO jadwal_petugas (idpetugas,idpetugas_pengganti,idjadwal,idsesi,konfirm_hdr) VALUES (:idpetugas,:idpetugas_pengganti,:idjadwal,:idsesi,:konfirm_hdr)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idpetugas' => $idpetugas,
            ':idpetugas_pengganti' => $idpetugas_pengganti, ':idjadwal' => $idjadwal, ':idsesi' => $idsesi, ':konfirm_hdr' => $konfirm_hdr
        ));

        return true;
    }

    public function editData($id, $idpetugas, $idpetugas_pengganti, $idjadwal, $idsesi, $konfirm_hdr)
    {
        $sql = "UPDATE jadwal_petugas
                    SET idpetugas=:idpetugas,idpetugas_pengganti=:idpetugas_pengganti,idjadwal=:idjadwal,idsesi=:idsesi,konfirm_hdr=:konfirm_hdr
        WHERE idjadwalpetugas=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':idpetugas' => $idpetugas,
            ':idpetugas_pengganti' => $idpetugas_pengganti, ':idjadwal' => $idjadwal, ':idsesi' => $idsesi, ':konfirm_hdr' => $konfirm_hdr
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM jadwal_petugas WHERE idjadwalpetugas=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}