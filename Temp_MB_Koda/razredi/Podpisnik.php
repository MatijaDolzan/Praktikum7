<?php
class Podpisnik {
    private $id;
    private $email;
    private $ip;
    private $cas;
    private $fk_ver;
    
    function Podpisnik($id=null, $email=null, $ip=null, $cas=null, $fk_ver=null) {
        $this->id = $id;
        $this->email=$email;
        $this->ip=$ip;  
        $this->cas=$cas;
        $this->fk_ver=$fk_ver;
    }
    
    public function getId (){
        return $this->id;
    }
    public function getEmail (){
        return $this->email;
    }
    public function getIp (){
        return $this->ip;
    }
    public function getCas (){
        return $this->cas;
    }
    public function getFk_ver (){
        return $this->fk_ver;
    }
    
    public function setId ($setVar){
        return $this->id = $setVar;
    }
    public function setEmail ($setVar){
        return $this->email = $setVar;
    }
    public function setIp ($setVar){
        return $this->ip = $setVar;
    }
    public function setCas ($setVar){
        return $this->cas = $setVar;
    }
    public function setFk_ver ($setVar){
        return $this->fk_ver = $setVar;
    }
    
    //VRNE DOLOCENEGA PODPISNIKA GLEDE NA NJEGOV ID V BAZI
    public function getPodpisnikViaId($id){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM podpisnik where id='$id';";
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
                $sign = new Podpisnik($row[0], $row[1], $row[2], $row[3], $row[4]);
                return $sign;
            }
        }
    }
   
    //VRNE VSE PODPISNIKE KI SO PODPISALI NEKAJ OD DOLOECENEGA UPORABNIKA
    public function getPodpisnikViaUserId($id){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM podpisnik WHERE fk_pod_ver IN (SELECT id FROM verzija WHERE fk_ver_priv IN (SELECT id FROM privolitve WHERE fk_priv_upo = '$id'));";
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
                $sign = new Podpisnik($row[0], $row[1], $row[2], $row[3], $row[4]);
                return $sign;
            }
        }
    }
    
    //VRNE VSE PODPISNIKE Z DOLOCENIM EMAILOM, KI SO PODPISALI NEKAJ OD DOLOCENEGA UPORABNIKA (PREDVIDOMA TRENUTNO PRIJAVLJENEGA)
    public function getPodpisnikViaUserIdAndEmail($id, $email){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM podpisnik WHERE fk_pod_ver IN (SELECT id FROM verzija WHERE fk_ver_priv IN (SELECT id FROM privolitve WHERE fk_priv_upo = '$id')) AND email = '$email';";
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
                $sign = new Podpisnik($row[0], $row[1], $row[2], $row[3], $row[4]);
                return $sign;
            }
        }
    }
    
    //VRNE PODPISNIKE DOLOCENE VERZIJE - SPECIFICIRANE V $fk kot FK_pod_priv IZ PODATKOVNE BAZE
    public function getPodpisnikViaFk($fk){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM podpisnik where FK_pod_ver='$fk';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return NULL;
        }else{
            $count = mysqli_num_rows($result);
            if ($count === 0){
                return FALSE;
            }else{
                $signatures = array();
                while ($row=mysqli_fetch_row($result)){
                    $sign = new Podpisnik($row[0], $row[1], $row[2], $row[3], $row[4]);
                    array_push($signatures, $sign);
                }
                return $signatures;
            }
        }
    }
    
    //ZACASNI ADDPOPDISNIK - PO MOZNSOTI POTREBNO SPREMENITI RETURN VREDNOSTI - ODVISNO OD KODE NA PRIKAZU PRIVOLITVE (Za podpisnika - ne za uporabnika)
    public function addPodpisnik(Podpisnik $sign){
        $sign_email = $sign->getEmail();
        $sign_ip = $sign->getIp();
        $sign_fk_ver = $sign->getFk_ver();
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "INSERT INTO podpisnik (email, ip_add, cas, fk_pod_ver) VALUES ('$sign_email', '$sign_ip', NOW(), '$sign_fk_ver');";
        $result = mysqli_query($connection, $sql);
        if ($result === FALSE){
            mysqli_close($connection);
            return FALSE;
        }else{
            $sign_id = mysqli_insert_id($connection);
            mysqli_close($connection);
            $sign->setId($sign_id);
            return $sign;
        }
    }
    
}
?>