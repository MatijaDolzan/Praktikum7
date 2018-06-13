<?php
class Boolbox {
    private $id;
    private $agreed;
    private $fk_checkbox;
    private $fk_podpisnik;
    
    function Boolbox($id=null, $agreed=null, $fk_checkbox=null, $fk_podpisnik=null) {
        $this->id = $id;
        $this->agreed= $agreed;
        $this->fk_checkbox=$fk_checkbox;
        $this->fk_podpisnik=$fk_podpisnik;
    }
    
    public function getId (){
        return $this->id;
    }
    public function getAgreed(){
        return $this->agreed;
    }
    public function getFk_checkbox(){
        return $this->fk_checkbox;
    }
    public function getFk_podpisnik(){
        return $this->fk_podpisnik;
    }
    
    public function setId ($setVar){
        return $this->id = $setVar;
    }
    public function setAgreed($setVar){
        return $this->agreed = $setVar;
    }
    public function setFk_checkbox($setVar){
        return $this->fk_checkbox = $setVar;
    }
    public function setFk_podpisnik($setVar){
        return $this->fk_podpisnik = $setVar;
    }
    
    public function getBoolboxViaFk($fk){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT * FROM boolbox where fk_bol_pod='$fk';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return NULL;
        }else{
            $count = mysqli_num_rows($result);
            if ($count === 0){
                return FALSE;
            }else{
                $boxes = array();
                while ($row=mysqli_fetch_row($result)){
                    $box = new Boolbox($row[0], $row[1], $row[2], $row[3]);
                    array_push($boxes, $box);
                }
                return $boxes;
            }
        }
    }

    
    public function addBoolbox(Boolbox $box){
        $agreed = $box->getAgreed();
        $fk_checkbox = $box->getFk_checkbox();
        $fk_podpisnik = $box->getFk_podpisnik();
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "INSERT INTO boolbox (agreed, fk_bol_che, fk_bol_pod) VALUES ($agreed, '$fk_checkbox', '$fk_podpisnik');";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if ($result === FALSE){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
}
?>