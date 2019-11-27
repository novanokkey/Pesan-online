<?php
	class Slider extends Db {

		// select all data
		public function selectall()
		{
			$sql = "SELECT * FROM slider";
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
            $sql = "SELECT * FROM slider WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        public function addData($judul,$url,$status,$konten,$file)
        {
            $sql = "INSERT INTO slider (judul,url,status,konten,file) VALUES (:judul,:url,:status,:konten,:file)";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(':judul'=>$judul,
                            ':url'=>$url,':status'=>$status,':konten'=>$konten,':file'=>$file));

            return true;
        }

        public function editData($id,$judul,$url,$status,$konten)
        {
            $sql = "UPDATE slider
                    SET judul=:judul,url=:url,status=:status,konten=:konten
                     WHERE id=:id";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(':id'=>$id,':judul'=>$judul,
                        ':url'=>$url,':status'=>$status,':konten'=>$konten));
            
            return true;

     
        }

        public function deleteData($id){
             $sql="DELETE FROM slider WHERE id=:id";
             $q = $this->connect()->prepare($sql);
             $q->execute(array(':id'=>$id));

             return true;
        }
            
    }

?>