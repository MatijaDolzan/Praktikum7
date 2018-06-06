<?php
require_once   '\Iprivolitev.php';
class Upravljalec implements Iprivolitev {
    private $id;
    private $name;
    private $subname;
    private $address;
    private $FK_upr_priv;
    
    
    function Upravljalec($ime,$priimek,$naslov,$fk) {
        $this->id = NULL;
        $this->name=$ime;
        $this->subname=$priimek;
        $this->address=$naslov;
        $this->FK_upr_priv=$fk;
    }
    
    
    
    /**
     * @return NULL
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSubname()
    {
        return $this->subname;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param NULL $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $subname
     */
    public function setSubname($subname)
    {
        $this->subname = $subname;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getIzBazeVse(){
        
    }
    
    public function addBazaU($upravljalec){
        $ime=$upravljalec->name;
        $priimek=$upravljalec->subname;
        $naslov=$upravljalec->address;
        $FK_upr_priv=$upravljalec->FK_upr_priv;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "INSERT INTO Upravljalec (ime, priimek, naslov,FK_upr_priv) VALUES ('$ime', '$priimek','$naslov','$FK_upr_priv');";
        $result = mysqli_query($db_server,$query);
        
    }
    
    public function getIzBaze($idPrivolitve){
        $id=$idPrivolitve;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "SELECT * FROM Upravljalec where FK_upr_priv='$id';";
        $result = mysqli_query($db_server,$query);
        if (!$result)
        {
            die ("Dostop do PB ni uspel");
        }
        else
        {
            $st_vrstic = mysqli_num_rows($result);
            if($st_vrstic >0){
                $vrstica = mysqli_fetch_row($result);
                $return=new Upravljalec($vrstica[0],$vrstica[1],$vrstica[2],$vrstica[3]);
                $return->setId($vrstica[0]);
                $return->setName($vrstica[1]);
                $return->setSubname($vrstica[2]);
                $return->setAddress($vrstica[3]);
                return $return;
            }
        }
    }
    
    /**
     * @param NULL $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return NULL
     */
    public function getFK_upr_priv()
    {
        return $this->FK_upr_priv;
    }

    /**
     * @param NULL $FK_upr_priv
     */
    public function setFK_upr_priv($FK_upr_priv)
    {
        $this->FK_upr_priv = $FK_upr_priv;
    }

    /**
     * @return NULL
     */
    public function getId()
    {
        return $this->id;
    }
    public function addBaza($privolitev)
    {}

    
    /**
     * @return mixed
     */
   
    
    
    
    
    
}