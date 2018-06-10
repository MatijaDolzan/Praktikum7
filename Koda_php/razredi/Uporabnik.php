<?php
class Uporabnik {
    private $id;
    private $username;
    private $email;
    private $password;
    
    function Uporabnik($id, $username, $email, $password) {
        $this->id = $id;
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
    }
    
    public function getId (){
        return $this->id;
    }
    public function getUsername (){
        return $this->username;
    }
    public function getEmail (){
        return $this->email;
    }
    public function getPassword (){
        return $this->password;
    }
    
    public function setId ($setVar){
        return $this->id = $setVar;
    }
    public function setUsername ($setVar){
        return $this->username = $setVar;
    }
    public function setEmail ($setVar){
        return $this->email = $setVar;
    }
    public function setPassword ($setVar){
        return $this->password = $setVar;
    }
    
    public function unsetPassword (){
        return $this->password = null;
    }
    
    public function getUporabnikViaEmail($email){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM uporabnik where email='$email';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return NULL;
        }else{
            $count = mysqli_num_rows($result);
            if ($count === 0){
                return FALSE;
            }else{
                $row=mysqli_fetch_row($result);
                $user = new Uporabnik($row[0], $row[1], $row[2], $row[3]);
                return $user;
            }
        }   
    }
    
    public function getUporabnikViaId($id){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM uporabnik where id='$id';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return NULL;
        }else{
            $count = mysqli_num_rows($result);
            if ($count === 0){
                return FALSE;
            }else{
                $row=mysqli_fetch_row($result);
                $user = new Uporabnik($row[0], $row[1], $row[2], $row[3]);
                return $user;
            }
        }
    }
    
    public function getUporabnikLogin($email, $password){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM uporabnik where email='$email' AND password='$password';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return NULL;
        }else{
            $count = mysqli_num_rows($result);
            if ($count === 0){
                return FALSE;
            }else{
                $row=mysqli_fetch_row($result);
                $user = new Uporabnik($row[0], $row[1], $row[2], $row[3]);
                $user->unsetPassword();
                return $user;
            }
        }   
    }
  
    public function updateUporabnik($id, $var_name, $var_value){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "UPDATE uporabnik SET $var_name = '$var_value' WHERE id = $id;";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
    public function addUporabnik(Uporabnik $user){
        $user_name = $user->username;
        $user_email = $user->email;
        $user_password = $user->password;
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "INSERT INTO uporabnik (username, email, password) VALUES ('$user_name', '$user_email', '$user_password');";
        $result = mysqli_query($connection, $sql);
        if ($result === FALSE){
            mysqli_close($connection);
            return FALSE;
        }else{
            $user_id = mysqli_insert_id($connection);
            mysqli_close($connection);
            $user->setId($user_id);
            $user->unsetPassword();
            $new_user = $user;
            return $new_user;
        }
    }
    
}
?>