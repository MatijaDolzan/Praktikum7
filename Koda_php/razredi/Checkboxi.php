<?php
class Checkbox {
    private $id;
    private $checkbox;
    private $fk_che_ver;
    
    /**
     * @return NULL
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCheckbox()
    {
        return $this->checkbox;
    }

    /**
     * @return mixed
     */
    public function getFk_che_ver()
    {
        return $this->fk_che_ver;
    }

    /**
     * @param NULL $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $checkbox
     */
    public function setCheckbox($checkbox)
    {
        $this->checkbox = $checkbox;
    }

    /**
     * @param mixed $fk_che_ver
     */
    public function setFk_che_ver($fk_che_ver)
    {
        $this->fk_che_ver = $fk_che_ver;
    }

    function Checkbox($checkbox,$fk_che_ver) {
        $this->id = null;
        $this->checkbox=$checkbox;
        $this->fk_che_ver=$fk_che_ver;
    }
    //Dodaja checkboxe v bazo pri doloceni verziji
    public function addCheckbox(Checkbox $check){
        $vrednost = $check->getCheckbox();
        $FK = $check->getFk_che_ver();
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "INSERT INTO checkbox (checkbox, FK_che_ver) VALUES ('$vrednost', '$FK');";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
    }
    public function getVseCheckboxe($fk){
        $connection = mysqli_connect("localhost", "root", "", "praktikum") OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $sql = "SELECT *  FROM checkbox where FK_che_ver='$fk';";
        $result = mysqli_query($connection, $sql);
        mysqli_close($connection);
        if (!$result)
        {
            die ("Dostop do PB ni uspel");
        }
        else
        {
            
            $st_vrstic = mysqli_num_rows($result);
            $array=array();
            for ($j=0;$j<$st_vrstic;$j++) {
                $vrstica = mysqli_fetch_row($result);
                $ch=new Checkbox($vrstica[1], $vrstica[2]);
                array_push($array, $ch);
            }
            $_SESSION['countArray']=count($array);
            return $array;
        }
    }
    
}
?>