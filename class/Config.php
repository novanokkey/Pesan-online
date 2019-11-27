<?php
	class Config extends Db {

		// select all data
		public function select()
		{
			$sql = "SELECT * FROM config";
			$result = $this->connect()->query($sql);
			if ($result->rowCount() > 0)
			{
				while($row = $result->fetch())
				{
					$data[] = $row;
				}
				return $data;
			}
		}

		public function selectByid($id)
        {
            $sql = "SELECT * FROM about WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
		}
		
		public function selectAll()
		{
			$sql = "SELECT * FROM about";
			$result = $this->connect()->query($sql);
			if ($result->rowCount() > 0)
			{
				while($row = $result->fetch())
				{
					$data[] = $row;
				}
				return $data;
			}
		}

		public function editData($id,$nama_instansi,$no_telp,$email,$map,$alamat,$onboard)
        {
            $sql = "UPDATE about
                    SET nama_instansi=:nama_instansi,no_telp=:no_telp,no_fax=:email,map=:map,alamat=:alamat,onboard=:onboard
                     WHERE id=:id";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(':id'=>$id,':nama_instansi'=>$nama_instansi,
                        ':no_telp'=>$no_telp,':email'=>$email,':map'=>$map,':alamat'=>$alamat,':onboard'=>$onboard));
            
            return true;

     
        }



	}
?>