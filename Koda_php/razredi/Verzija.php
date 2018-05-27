<?php
include_once  'C:\wamp64\www\Praktikum\razredi\Iprivolitev.php';
class Verzija implements Iprivolitev {
    private $verzija;
    private $text;
    
    function Verzija($naslov,$upor) {
        $this->id = NULL;
        $this->naslov=$naslov;
        $this->upor=$upor;
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
    
    
    
    
    
    
    
    public function getIzBazeVse()
    {}

    public function addBaza($privolitev)
    {}

    public function getIzBaze($index)
    {}


}