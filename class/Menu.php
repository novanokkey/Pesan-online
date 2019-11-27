<?php
	class Menu extends Db {

        // select all data
        public function selectall()
		{
			$sql = "SELECT * FROM menu";
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

		public function selectallAtas()
		{
			$sql = "SELECT * FROM menu WHERE posisi='atas'";
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

        public function selectallBawah()
		{
			$sql = "SELECT * FROM menu WHERE posisi='bawah'";
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
            $sql = "SELECT * FROM menu WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        public function addData($judul,$url,$status,$posisi)
        {
            $sql = "INSERT INTO menu (judul,url,status,posisi) VALUES (:judul,:url,:status,:posisi)";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(':judul'=>$judul,
                            ':url'=>$url,':status'=>$status,':posisi'=>$posisi));
            return true;
    
        }

        public function editData($id,$judul,$url,$status,$posisi)
        {
            $sql = "UPDATE menu
                    SET judul=:judul,url=:url,status=:status,posisi=:posisi
                     WHERE id=:id";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(':id'=>$id,':judul'=>$judul,
                        ':url'=>$url,':status'=>$status,':posisi'=>$posisi));
            
            return true;

     
        }

        public function deleteData($id){
             $sql="DELETE FROM menu WHERE id=:id";
             $q = $this->connect()->prepare($sql);
             $q->execute(array(':id'=>$id));

             return true;
        }
            

    }
    


?>