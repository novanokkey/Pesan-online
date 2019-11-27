<?php
	class Page extends Db {

		// select all data
		public function selectall()
		{
			$sql = "SELECT * FROM pages";
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

        

        public function selectByUrl($url)
        {
            $sql = "SELECT * FROM pages WHERE url = :url";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":url",$url);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        

        


        public function selectByid($id)
        {
            $sql = "SELECT * FROM pages WHERE id = :id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result1;
        }
    
        public function addData($judul,$url,$konten_singkat,$konten,$status,$file)
        {
            $sql = "INSERT INTO pages (judul,url,konten_singkat,konten,status,file) VALUES (:judul,:url,:konten_singkat,:konten,:status,:file)";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(
                            ':judul'=>$judul,':url'=>$url,':konten_singkat'=>$konten_singkat,':konten'=>$konten,':status'=>$status,':file'=>$file));

            return true;
        }

        public function editData($id,$judul,$url,$konten_singkat,$konten,$status)
        {
            $sql = "UPDATE pages
                    SET judul=:judul,url=:url,konten_singkat=:konten_singkat,konten=:konten,status=:status
                     WHERE id=:id";
            $q = $this->connect()->prepare($sql);
            $q->execute(array(':id'=>$id,
                        ':judul'=>$judul,':url'=>$url,':konten_singkat'=>$konten_singkat,':konten'=>$konten,':status'=>$status));
            
            return true;

     
        }

        public function deleteData($id){
             $sql="DELETE FROM pages WHERE id=:id";
             $q = $this->connect()->prepare($sql);
             $q->execute(array(':id'=>$id));

             return true;
        }
        
    
    }
        

?>