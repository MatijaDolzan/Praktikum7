<?php
include_once  '\Iprivolitev.php';
class Privolitev implements Iprivolitev {
    private $id;
    private $naslov;
    private $upor;
    
    function Privolitev($naslov) {
        $this->id = NULL;
        $this->naslov=$naslov;
        $this->upor=NULL;
    }
    public function setNaslov($naslov){
        $this->naslov = $naslov;
    }
 
    public function getNaslov(){
        return $this->naslov;
    }
    public function getUpor(){
        return $this->upor;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUpor($upor){
        $this->upor = $upor;
    }
   

    public function getIzBaze($privolitev){
        $isci=$privolitev->naslov;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "SELECT * FROM privolitve where naslov='$isci';";
        $result = mysqli_query($db_server, $query);
        if (!$result)
        {
            die ("Dostop do PB ni uspel");
        }
        else
        {
            $st_vrstic = mysqli_num_rows($result);
            if($st_vrstic > 0){
                $vrstica = mysqli_fetch_row($result);
                $staraPriv=new Privolitev($isci);
                $staraPriv->setId($vrstica[0]);
                $staraPriv->setUpor($vrstica[2]);
                return $staraPriv;
            }
        }
       
    }
    public function spremeniNaslov($privolitev){
        $id=$privolitev->id;
        $update=$privolitev->naslov;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "UPDATE privolitve SET naslov = '$update' WHERE id='$id';";
        $result = mysqli_query($db_server, $query);
        
   
        
    }
    public function getIzBazeId($id){
        $isci=$id;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "SELECT * FROM privolitve where id='$isci';";
        $result = mysqli_query($db_server, $query);
        if (!$result)
        {
            die ("Dostop do PB ni uspel");
        }
        else
        {
            $st_vrstic = mysqli_num_rows($result);
            if($st_vrstic > 0){
                $vrstica = mysqli_fetch_row($result);
                $staraPriv=new Privolitev($vrstica[1]);
                $staraPriv->setId($vrstica[0]);
                $staraPriv->setUpor($vrstica[2]);
                return $staraPriv;
            }
        }
        
    }

    public function getIzBazeVse(){
        
    }
    public function addBaza($privolitev){
        $naslov=$privolitev->naslov;
        $uporabnik=$privolitev->upor;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "INSERT INTO privolitve (naslov, FK_priv_upo) VALUES ('$naslov', '$uporabnik');";
        $result = mysqli_query($db_server, $query);
        
    }


   
}  