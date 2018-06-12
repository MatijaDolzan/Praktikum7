<?php
session_start();

require('fpdf.php');


require    'razredi\Privolitev.php';
require    'razredi\Verzija.php';
require    'razredi\Pooblascenec.php';
require    'razredi\Upravljalec.php';

$idVerz=1;
if(!empty($_SESSION['izbranaVerzijaSes'])){
    $idVerz=$_SESSION['izbranaVerzijaSes'];
    
}

class PDF extends FPDF
{
    private $something;
    
    function PDF($idVerz){
        
        $verzija_id = $idVerz;
        
        $privolitve =new Privolitev(null);
        $version = new Verzija(null, null);
        $poob = new Pooblascenec(null, null, null);
        $upra = new Upravljalec(null, null, null, null);
        //$checkbox= new Checkbox(null, null);
        
        $current_version = $version->getIzBazeV($verzija_id);
        $poob_id = $current_version->getPoob();
        $privolitev_id = $current_version->getFK_ver_priv();
        $current_upra = $upra->getIzBaze($privolitev_id);
        $current_privolitve= $privolitve->getIzBazeId($privolitev_id);
        //$checkbox_id= $current_version->  MISLIM DA ŠE NI METODE
        //$current_checkbox= $checkbox->getVseCheckboxe($fk);
        
        //echo "<br><b> Naslov privolitve: </b>";
        //echo $current_privolitve->getNaslov();
        
        //echo "<p><b> Verzija: </b>";
        //echo $current_version->getVerzija();
        //echo "<p><b> Besedilo: </b>";
        //echo $current_version->getText();
        
        //echo "<p><b> Ime upravljalca: </b>";
        //echo $current_upra->getName();
        //echo "<p><b> Priimek upravljalca: </b>";
        //echo $current_upra->getSubname();
        //echo "<p><b> Naslov upravljalca: </b>";
        //echo $current_upra->getAddress();
        
        /*if($poob_id !== NULL){
         $current_poob = $poob->getIzBazePoob($poob_id);
         echo "<p><b> Ime pooblascenca: </b>";
         echo $current_poob->getIme();
         echo "<p><b> Priimek pooblascenca: </b>";
         echo $current_poob->getPriimek();
         echo "<p><b> Naslov pooblascenca: </b>";
         echo $current_poob->getNaslov();
         }
         */
        //if($checkbox_id !== NULL){
        //    $current_checkbox = $checkbox->getVseCheckboxe($fk);
        //    echo "<p><b> Checkbox: </b>";
        //echo $current_checkbox->;
        
        //}
    }
    // Page header
    function Header()
    {
        // Logo
        $this->Image('gdpr.png',20,6,20);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,$this->something,0,0,'C');
        // Line break
        $this->Ln(20);
    }
    
    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Stran '.$this->PageNo(),0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Output();

?>