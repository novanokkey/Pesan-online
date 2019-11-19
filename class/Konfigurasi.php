<?php
class Konfigurasi extends Db
{

	// select all data
	public function select()
	{
		$sql = "SELECT * FROM konfigurasi";
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
		$sql = "SELECT * FROM konfigurasi WHERE idkonfig = :id";
		$stmt = $this->connect()->prepare($sql);
		$stmt->bindValue(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

	public function selectAll()
	{
		$sql = "SELECT * FROM konfigurasi";
		$result = $this->connect()->query($sql);
		if ($result->rowCount() > 0) {
			while ($row = $result->fetch()) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public function editData($id, $nama_instansi, $no_telp, $email, $alamat, $logo)
	{
		$sql = "UPDATE konfigurasi
                    SET nama_instansi=:nama_instansi,no_telp=:no_telp,email=:email,alamat=:alamat,logo=:logo
                     WHERE idkonfig=:id";
		$q = $this->connect()->prepare($sql);
		$q->execute(array(
			':id' => $id, ':nama_instansi' => $nama_instansi,
			':no_telp' => $no_telp, ':email' => $email, ':alamat' => $alamat, ':logo' => $logo
		));

		return true;
	}
}