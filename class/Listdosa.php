<?php
class Listdosa extends Db
{

    public function selectall()
    {
        $sql = "SELECT * FROM listdosa
                        INNER JOIN jadwal ON jadwal.idjadwal=listdosa.idjadwal
                        ORDER BY listdosa.iddosa desc";
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
        $sql = "SELECT * FROM listdosa
        INNER JOIN jadwal ON jadwal.idjadwal=listdosa.idjadwal WHERE listdosa.iddosa = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function addData($namapetugas, $idjadwal, $alasan, $step)
    {
        $sql1 = "INSERT INTO listdosa (namapetugas,idjadwal,alasan,step) VALUES (:namapetugas,:idjadwal,:alasan,:step)";
        $q = $this->connect()->prepare($sql1);
        $q->execute(array(
            ':namapetugas' => $namapetugas,
            ':idjadwal' => $idjadwal, ':alasan' => $alasan, ':step' => $step
        ));

        return true;
    }

    public function editData($id, $namapetugas, $idjadwal, $alasan, $step)
    {
        $sql = "UPDATE listdosa
                    SET namapetugas=:namapetugas,idjadwal=:idjadwal,alasan=:alasan,step=:step
        WHERE iddosa=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':namapetugas' => $namapetugas,
            ':idjadwal' => $idjadwal, ':alasan' => $alasan, ':step' => $step, ':step' => $step
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM listdosa WHERE iddosa=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}