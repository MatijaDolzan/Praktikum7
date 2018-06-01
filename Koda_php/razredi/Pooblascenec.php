<?php
require_once   '\Iprivolitev.php';
class Pooblascenec implements Iprivolitev {
    private $id;
    private $ime;
    private $priimek;
    private $naslov;
    
    
    function Pooblascenec($ime,$priimek,$naslov) {
        $this->id = NULL;
        $this->ime=$ime;
        $this->priimek=$priimek;
        $this->naslov=$naslov;
    }
    

    
    public function getIzBazeVse(){
        
    }
    
    public function addBaza($pooblascenec){
        $ime=$pooblascenec->ime;
        $priimek=$pooblascenec->priimek;
        $naslov=$pooblascenec->naslov;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "INSERT INTO Pooblascenec (ime, priimek, naslov) VALUES ('$ime', '$priimek','$naslov');";
        $result = mysqli_query($db_server,$query);
        
    }
    
    public function getIzBaze($pooblascenec){
        $ime=$pooblascenec->ime;
        $priimek=$pooblascenec->priimek;
        $naslov=$pooblascenec->naslov;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "SELECT id FROM Pooblascenec where ime='$ime' AND priimek='$priimek' AND naslov='$naslov';";
        $result = mysqli_query($db_server, $query);
        if (!$result)
        {
            die ("Dostop do PB ni uspel");
        }
        else
        {
            $st_vrstic = mysqli_num_rows($result);
            if($st_vrstic=1){
                $id = mysqli_fetch_row($result);
                $return=new Pooblascenec($ime,$priimek,$naslov);
                $return->setId($id[0]);
                return $return;
            }
        }
    }
    
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
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * @return mixed
     */
    public function getPriimek()
    {
        return $this->priimek;
    }

    /**
     * @return mixed
     */
    public function getNaslov()
    {
        return $this->naslov;
    }

    /**
     * @param NULL $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $ime
     */
    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    /**
     * @param mixed $priimek
     */
    public function setPriimek($priimek)
    {
        $this->priimek = $priimek;
    }

    /**
     * @param mixed $naslov
     */
    public function setNaslov($naslov)
    {
        $this->naslov = $naslov;
    }

 
    
    
    
}