<?php
class Pelanggan extends Db
{
    

    public function login($email, $password)
    {
        try {

            // Ambil data dari database 
            $sql = "SELECT * FROM pelanggan WHERE email = :email and password= :password";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);

            $stmt->execute();
            $data = $stmt->fetch();

            // Jika jumlah baris > 0 

            if ($stmt->rowCount() > 0) {

                $_SESSION['user_session'] = $data['idpelanggan'];

                return true;
            } else {

                $this->error = "Email atau Password Salah !!!";

                return false;
            }
        } catch (PDOException $e) {

            echo $e->getMessage();

            return false;
        }
    }

    public function isLoggedIn()
    {

        // Apakah user_session sudah ada di session 

        if (isset($_SESSION['user_session'])) {

            return true;
        }
    }

    public function getUser()
    {

        // Cek apakah sudah login 

        if (!$this->isLoggedIn()) {

            return false;
        }

        try {

            // Ambil data user dari database 

            $stmt = $this->connect()->prepare("SELECT * FROM pelanggan WHERE idpelanggan = :id");

            $stmt->bindParam(":id", $_SESSION['user_session']);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {

            echo $e->getMessage();

            return false;
        }
    }

    public function logout()
    {

        // Hapus session 

        session_destroy();

        // Hapus user_session 

        unset($_SESSION['user_session']);

        return true;
    }

    public function getLastError()
    {

        return $this->error;
    }
    //------------------------------------------------------------------------------------    
    // select all data
    public function selectall()
    {
        $sql = "SELECT * FROM pelanggan order by idpelanggan";
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
        $sql = "SELECT * FROM pelanggan WHERE idpelanggan = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    

    public function addData($nama_lengkap, $alamat, $kodepos, $nohp, $email, $password)
    {
        try {
            $sql = "SELECT * FROM pelanggan WHERE email = :email";
            $st = $this->connect()->prepare($sql);

            $st->bindParam("email", $email, PDO::PARAM_STR);

            $st->execute();

            $count = $st->rowCount();

            if ($count < 1) {

                $sql1 = "INSERT INTO pelanggan (nama_lengkap, alamat, kodepos, nohp, email, password) VALUES (:nama_lengkap, :alamat, :kodepos, :nohp, :email, :password)";
                $q = $this->connect()->prepare($sql1);
                $q->execute(array(
                    ':nama_lengkap' => $nama_lengkap,
                    ':alamat' => $alamat, ':kodepos' => $kodepos, ':nohp' => $nohp, ':email' => $email, ':password' => $password
                ));

                return true;
            } else {

                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    public function editData($id, $nama_lengkap, $alamat, $kodepos, $nohp, $email, $password)
    {
        $sql = "UPDATE pelanggan
                    SET nama_lengkap=:nama_lengkap, alamat=:alamat, kodepos=:kodepos, nohp=:nohp, email=:email, password=:password
        WHERE idpelanggan=:id";

        $q = $this->connect()->prepare($sql);
        $q->execute(array(
            ':id' => $id, ':nama_lengkap' => $nama_lengkap,
            ':alamat' => $alamat, ':kodepos' => $kodepos, ':nohp' => $nohp, ':email' => $email, ':password' => $password
        ));

        return true;
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM pelanggan WHERE idpelanggan=:id";
        $q = $this->connect()->prepare($sql);
        $q->execute(array(':id' => $id));

        return true;
    }
}