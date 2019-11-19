<?php
class Jadwal extends Db
{

    public function addDataHadirJamaat($idjamaat, $idsesi, $idjadwal, $kegiatan)
    {
        $sql = "INSERT INTO hadir_jamaat (idjamaat,idsesi,idjadwal,kegiatan) VALUES (:idjamaat,:idsesi,:idjadwal,:kegiatan)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idjamaat' => $idjamaat, ':idsesi' => $idsesi, ':idjadwal' => $idjadwal, ':kegiatan' => $kegiatan
        ));

        return true;
    }

    public function selectalljamaatbysesi1($idjadwal)
    {
        $sql = "SELECT * FROM hadir_jamaat  
                                INNER JOIN jamaat ON jamaat.idjamaat=hadir_jamaat.idjamaat  
                                INNER JOIN jadwal ON jadwal.idjadwal=hadir_jamaat.idjadwal
                                INNER JOIN sesi ON sesi.idsesi=hadir_jamaat.idsesi
		  WHERE hadir_jamaat.idjadwal='$idjadwal' AND hadir_jamaat.idsesi='01'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectalljamaatbysesi2($idjadwal)
    {
        $sql = "SELECT * FROM hadir_jamaat  
                                INNER JOIN jamaat ON jamaat.idjamaat=hadir_jamaat.idjamaat  
                                INNER JOIN jadwal ON jadwal.idjadwal=hadir_jamaat.idjadwal
                                INNER JOIN sesi ON sesi.idsesi=hadir_jamaat.idsesi
		  WHERE hadir_jamaat.idjadwal='$idjadwal' AND hadir_jamaat.idsesi='02'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectalljamaatbysesi3($idjadwal)
    {
        $sql = "SELECT * FROM hadir_jamaat  
                                INNER JOIN jamaat ON jamaat.idjamaat=hadir_jamaat.idjamaat  
                                INNER JOIN jadwal ON jadwal.idjadwal=hadir_jamaat.idjadwal
                                INNER JOIN sesi ON sesi.idsesi=hadir_jamaat.idsesi
		  WHERE hadir_jamaat.idjadwal='$idjadwal' AND hadir_jamaat.idsesi='03'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectalljamaatbysesi4($idjadwal)
    {
        $sql = "SELECT * FROM hadir_jamaat  
                                INNER JOIN jamaat ON jamaat.idjamaat=hadir_jamaat.idjamaat  
                                INNER JOIN jadwal ON jadwal.idjadwal=hadir_jamaat.idjadwal
                                INNER JOIN sesi ON sesi.idsesi=hadir_jamaat.idsesi
		  WHERE hadir_jamaat.idjadwal='$idjadwal' AND hadir_jamaat.idsesi='04'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectalljamaatbysesi5($idjadwal)
    {
        $sql = "SELECT * FROM hadir_jamaat  
                                INNER JOIN jamaat ON jamaat.idjamaat=hadir_jamaat.idjamaat  
                                INNER JOIN jadwal ON jadwal.idjadwal=hadir_jamaat.idjadwal
                                INNER JOIN sesi ON sesi.idsesi=hadir_jamaat.idsesi
		  WHERE hadir_jamaat.idjadwal='$idjadwal' AND hadir_jamaat.idsesi='05'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectalljamaatbysesi6($idjadwal)
    {
        $sql = "SELECT * FROM hadir_jamaat  
                                INNER JOIN jamaat ON jamaat.idjamaat=hadir_jamaat.idjamaat  
                                INNER JOIN jadwal ON jadwal.idjadwal=hadir_jamaat.idjadwal
                                INNER JOIN sesi ON sesi.idsesi=hadir_jamaat.idsesi
		  WHERE hadir_jamaat.idjadwal='$idjadwal' AND hadir_jamaat.idsesi='06'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function ubahHadirPetugas($idjadwalpetugas, $absen_hadir)
    {
        $sql = "UPDATE jadwal_petugas
                    SET absen_hadir=:absen_hadir
        WHERE idjadwalpetugas=:idjadwalpetugas";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idjadwalpetugas' => $idjadwalpetugas, ':absen_hadir' => $absen_hadir
        ));

        return true;
    }

    public function selectJadwalidpegawai($idpetugas)
    {
        $sql = "SELECT COUNT(jadwal_petugas.idpetugas) AS 'totalpernah' FROM jadwal_petugas WHERE idpetugas = :idpetugas AND konfirm_hdr='Y'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":idpetugas", $idpetugas);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM jadwal order by idjadwal desc";
        $result = $this->connect()->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallpetugasbysesi1($idjadwal)
    {
        $sql = "SELECT jadwal.idjadwal,jadwal_petugas.absen_hadir,petugas.nama, jadwal_petugas.idjadwalpetugas,jadwal_petugas.kode, jadwal_petugas.status,
        jadwal_petugas.idpetugas, jadwal_petugas.konfirm_hdr, jadwal_petugas.idsesi,jadwal_petugas.idjadwal FROM jadwal_petugas
        INNER JOIN jadwal ON jadwal.idjadwal=jadwal_petugas.idjadwal
        INNER JOIN petugas ON petugas.idpetugas=jadwal_petugas.idpetugas  WHERE jadwal_petugas.idsesi = '01' and jadwal_petugas.idjadwal='$idjadwal'";


        $stmt = $this->connect()->query($sql);

        // $stmt->bindValue(":idjadwal", $idjadwal);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallpetugasbysesi2($idjadwal)
    {
        $sql = "SELECT jadwal.idjadwal,jadwal_petugas.absen_hadir,petugas.nama, jadwal_petugas.idjadwalpetugas,jadwal_petugas.kode, jadwal_petugas.status,
        jadwal_petugas.idpetugas, jadwal_petugas.konfirm_hdr, jadwal_petugas.idsesi,jadwal_petugas.idjadwal FROM jadwal_petugas
        INNER JOIN jadwal ON jadwal.idjadwal=jadwal_petugas.idjadwal
        INNER JOIN petugas ON petugas.idpetugas=jadwal_petugas.idpetugas  WHERE jadwal_petugas.idsesi = '02' and jadwal_petugas.idjadwal='$idjadwal'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallpetugasbysesi3($idjadwal)
    {
        $sql = "SELECT jadwal.idjadwal,jadwal_petugas.absen_hadir,petugas.nama, jadwal_petugas.idjadwalpetugas,jadwal_petugas.kode, jadwal_petugas.status,
        jadwal_petugas.idpetugas, jadwal_petugas.konfirm_hdr, jadwal_petugas.idsesi,jadwal_petugas.idjadwal FROM jadwal_petugas
        INNER JOIN jadwal ON jadwal.idjadwal=jadwal_petugas.idjadwal
        INNER JOIN petugas ON petugas.idpetugas=jadwal_petugas.idpetugas  WHERE jadwal_petugas.idsesi = '03' and jadwal_petugas.idjadwal='$idjadwal'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallpetugasbysesi4($idjadwal)
    {
        $sql = "SELECT jadwal.idjadwal,jadwal_petugas.absen_hadir,petugas.nama, jadwal_petugas.idjadwalpetugas,jadwal_petugas.kode, jadwal_petugas.status,
        jadwal_petugas.idpetugas, jadwal_petugas.konfirm_hdr, jadwal_petugas.idsesi,jadwal_petugas.idjadwal FROM jadwal_petugas
        INNER JOIN jadwal ON jadwal.idjadwal=jadwal_petugas.idjadwal
        INNER JOIN petugas ON petugas.idpetugas=jadwal_petugas.idpetugas  WHERE jadwal_petugas.idsesi = '04' and jadwal_petugas.idjadwal='$idjadwal'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallpetugasbysesi5($idjadwal)
    {
        $sql = "SELECT jadwal.idjadwal,jadwal_petugas.absen_hadir,petugas.nama, jadwal_petugas.idjadwalpetugas,jadwal_petugas.kode, jadwal_petugas.status,
        jadwal_petugas.idpetugas, jadwal_petugas.konfirm_hdr, jadwal_petugas.idsesi,jadwal_petugas.idjadwal FROM jadwal_petugas
        INNER JOIN jadwal ON jadwal.idjadwal=jadwal_petugas.idjadwal
        INNER JOIN petugas ON petugas.idpetugas=jadwal_petugas.idpetugas  WHERE jadwal_petugas.idsesi = '05' and jadwal_petugas.idjadwal='$idjadwal'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectallpetugasbysesi6($idjadwal)
    {
        $sql = "SELECT jadwal.idjadwal,jadwal_petugas.absen_hadir,petugas.nama, jadwal_petugas.idjadwalpetugas,jadwal_petugas.kode, jadwal_petugas.status,
        jadwal_petugas.idpetugas, jadwal_petugas.konfirm_hdr, jadwal_petugas.idsesi,jadwal_petugas.idjadwal FROM jadwal_petugas
        INNER JOIN jadwal ON jadwal.idjadwal=jadwal_petugas.idjadwal
        INNER JOIN petugas ON petugas.idpetugas=jadwal_petugas.idpetugas  WHERE jadwal_petugas.idsesi = '06' and jadwal_petugas.idjadwal='$idjadwal'";

        $stmt = $this->connect()->query($sql);

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function selectsesiall()
    {
        $sql = "SELECT * FROM sesi order by idsesi asc";
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
        $sql = "SELECT * FROM jadwal WHERE idjadwal = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function selectByidsesi($id)
    {
        $sql = "SELECT * FROM jadwal_petugas WHERE idjadwalpetugas = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    public function addDataJadwalSesi($kode, $idjadwal, $idpetugas, $idsesi)
    {
        $sql = "INSERT INTO jadwal_petugas (kode,idpetugas,idjadwal,idsesi) VALUES (:kode,:idpetugas,:idjadwal,:idsesi)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':kode' => $kode, ':idpetugas' => $idpetugas, ':idjadwal' => $idjadwal, ':idsesi' => $idsesi
        ));

        return true;
    }
    public function addData($tgl, $tempat, $tahun_grj, $bacaan, $seragam, $tglpersiapan, $dipimpin, $tema, $note)
    {
        $sql = "INSERT INTO jadwal (tgl,tempat,tahun_grj,bacaan,seragam,tglpersiapan,dipimpin,tema,note) VALUES (:tgl,:tempat,:tahun_grj,:bacaan,:seragam,:tglpersiapan,:dipimpin,:tema,:note)";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':tgl' => $tgl,
            ':tempat' => $tempat, ':tahun_grj' => $tahun_grj, ':bacaan' => $bacaan, ':seragam' => $seragam, ':tglpersiapan' => $tglpersiapan, ':dipimpin' => $dipimpin, ':tema' => $tema, ':note' => $note
        ));

        return true;
    }

    public function editData($id, $tgl, $tempat, $tahun_grj, $bacaan, $seragam, $tglpersiapan, $dipimpin, $tema, $note)
    {
        $sql = "UPDATE jadwal
                    SET tgl=:tgl,tempat=:tampat,tahun_grj=:tahun_grj,bacaan=:bacaan,
        seragam=:seragam,tglpersiapan=:tglpersiapan,dipimpin=:dipimpin,tema=:tema,note=:note
        WHERE idjadwal=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':tgl' => $tgl, ':tempat' => $tempat, ':tahun_grj' => $tahun_grj, ':bacaan' => $bacaan, ':seragam' => $seragam, ':tglpersiapan' => $tglpersiapan, ':dipimpin' => $dipimpin, ':tema' => $tema, ':note' => $note
        ));

        return true;
    }

    public function ubahDataJadwalSesi($idjadwalpetugas, $kode, $idjadwal, $idpetugas, $idsesi, $konfirm_hdr, $status)
    {
        $sql = "UPDATE jadwal_petugas
                    SET kode=:kode,idpetugas=:idpetugas,idjadwal=:idjadwal,idsesi=:idsesi,konfirm_hdr=:konfirm_hdr,status=:status
        WHERE idjadwalpetugas=:idjadwalpetugas";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':idjadwalpetugas' => $idjadwalpetugas, ':kode' => $kode, ':idpetugas' => $idpetugas, ':idjadwal' => $idjadwal, ':idsesi' => $idsesi, ':konfirm_hdr' => $konfirm_hdr, ':status' => $status
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM jadwal WHERE idjadwal=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }

    public function deleteDataDetail($idjadwalpetugas)
    {
        $sql = "DELETE FROM jadwal_petugas WHERE idjadwalpetugas=:idjadwalpetugas";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':idjadwalpetugas' => $idjadwalpetugas));

        return true;
    }
}