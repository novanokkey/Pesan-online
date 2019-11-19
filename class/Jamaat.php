<?php
class Jamaat extends Db
{

    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM jamaat";
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
        $sql = "SELECT * FROM jamaat WHERE idjamaat = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addData($nama, $ktp, $jk, $nowa, $notelp, $email, $alamat)
    {
        $sql = "INSERT INTO jamaat (nama,ktp,jk,nowa,notelp,email, alamat) VALUES (:nama,:ktp,:jk,:nowa,:notelp,:email, :alamat)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':nama' => $nama,
            ':ktp' => $ktp, ':jk' => $jk, ':nowa' => $nowa, ':notelp' => $notelp, ':email' => $email, ':alamat' => $alamat
        ));

        return true;
    }

    public function editData($id, $nama, $ktp, $jk, $nowa, $notelp, $email, $alamat)
    {
        $sql = "UPDATE jamaat
                    SET nama=:nama,ktp=:ktp,jk=:jk,nowa=:nowa,notelp=:notelp,email=:email,alamat=:alamat
        WHERE idjamaat=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':nama' => $nama,
            ':ktp' => $ktp, ':jk' => $jk, ':nowa' => $nowa, ':notelp' => $notelp, ':email' => $email, ':alamat' => $alamat
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM jamaat WHERE idjamaat=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}