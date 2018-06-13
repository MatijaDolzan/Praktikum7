<?php
require_once   '\Iprivolitev.php';
class Verzija implements Iprivolitev {
    private $id;
    private $verzija;
    private $text;
    private $hramba;
    private $FK_ver_priv;
    private $poob;
    
    function Verzija($text,$hramba) {
        $this->id = NULL;
        $this->text=$text;
        $this->hramba=$hramba;
        $this->verzija=1;
        $this->FK_ver_priv=null;
        $this->poob=0;
    }
    
    public function getVerzija(){
        return $this->verzija;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param NULL $poob
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return NULL
     */
    public function getPoob()
    {
        return $this->poob;
    }
    
    /**
     * @param NULL $poob
     */
    public function setPoob($poob)
    {
        $this->poob = $poob;
    }
    
    public function getText(){
        return $this->text;
    }
    
    public function getHramba(){
        return $this->hramba;
    }
    public function setVerzija($verzija){
        $this->verzija = $verzija;
    }
    
    public function setText($text){
        $this->text = $text;
    }
    
    
    public function setHramba($hramba){
        $this->hramba = $hramba;
    }
    
    public function getIzBazeVse()
    {}
    
    public function addBazaV($verzija){
        $st=$verzija->verzija;
        $text=$verzija->text;
        $hramba=$verzija->hramba;
        $FKid=$verzija->FK_ver_priv;
        $FKpoob=$verzija->poob;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "INSERT INTO Verzija (verzija, text,rok_hrambe,FK_ver_priv,FK_ver_poob) VALUES ('$st', '$text','$hramba','$FKid','$FKpoob');";
        $result = mysqli_query($db_server, $query);
        $query ="SELECT id from Verzija where verzija='$st' AND text='$text' AND rok_hrambe='$hramba' AND FK_ver_priv='$FKid' AND FK_ver_poob='$FKpoob'";
        $result=mysqli_query($db_server, $query);
        if(!$result){
            die;
        }else{
            $st_vrstic = mysqli_num_rows($result);
            if($st_vrstic =1){
                $vrstica = mysqli_fetch_row($result);
                return $vrstica[0];
            }
        }
    }
    
    public function getIzBazeV($id){
        $isci=$id;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "praktikum";
        $db_server = @mysqli_connect ($servername, $username, $password, $dbname) OR die ('Povezava do podatkovne baze ni uspela: ' . mysqli_connect_error() );
        $query = "SELECT * FROM verzija where id='$isci';";
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
                $staraVerzija=new Verzija($vrstica[2],$vrstica[3]);
                $staraVerzija->setId($vrstica[0]);
                $staraVerzija->setVerzija($vrstica[1]);
                $staraVerzija->setFK_ver_priv($vrstica[4]);
                $staraVerzija->setPoob($vrstica[5]);
                return $staraVerzija;
            }
        }
    }
    /**
     * @return NULL
     */
    public function getFK_ver_priv()
    {
        return $this->FK_ver_priv;
    }
    
    /**
     * @param NULL $FK_ver_priv
     */
    public function setFK_ver_priv($FK_ver_priv)
    {
        $this->FK_ver_priv = $FK_ver_priv;
    }
    public function addBaza($privolitev)
    {}
    public function getIzBaze($index)
    {}

    
    
    
    
}