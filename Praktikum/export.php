<?php

//REQUIRE MAIN TCPDF LIBRARY
require_once('tcpdf/tcpdf.php');
require_once 'razredi/Privolitev.php';
require_once 'razredi/Verzija.php';
require_once 'razredi/Upravljalec.php';
require_once 'razredi/Pooblascenec.php';
require_once 'razredi/Checkboxi.php';
require_once 'razredi/Podpisnik.php';
require_once 'razredi/Boolbox.php';

session_start();


//CREATE NEW PDF DOCUMENT
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



//SET DEFAULTS - POSSIBLY UNNECESSARY BUT BETTER TO JUST SET THEM
//SET DEFAULT_MONOSPACED_FONT
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//SET MARGINS
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//SET AUTO_PAGE_BREAKS
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);



//SET FONT
$pdf->SetFont('times', '', 12);



//IZPIS PRIVOLITVE
if(isset($_POST['export_id_verz'])){
//ADD PAGE 1
$pdf->AddPage();

//HTML ONE
$verzija_id = $_POST['export_id_verz'];

$privolitve =new Privolitev(null);
$version = new Verzija(null, null);
$poob = new Pooblascenec(null, null, null);
$upra = new Upravljalec(null, null, null, null);
$checkbox_console = new Checkbox(null, null, null);

$current_version = $version->getIzBazeV($verzija_id);
$poob_id = $current_version->getPoob();
$privolitev_id = $current_version->getFK_ver_priv();
$current_upra = $upra->getIzBaze($privolitev_id);
$current_privolitve= $privolitve->getIzBazeId($privolitev_id);
$checkboxes= $checkbox_console->getVseCheckboxe($verzija_id);

$privolitev_naslov = $current_privolitve->getNaslov();
$verzija_verzija = $current_version->getVerzija();
$verzija_text = $current_version->getText();
$verzija_hramba = $current_version->getHramba();
$upravljalec_name = $current_upra->getName();
$upravljalec_surname = $current_upra->getSubname();
$upravljalec_address = $current_upra->getAddress();

$html ='<br><div style="text-align:center"><h1>' . $privolitev_naslov . '</h1></div>
        <p><div style="text-align:center"><b>Verzija: </b>' . $verzija_verzija . '</div>
        <p><div style="text-align:center"><b>Trajanje hrambe podatkov: </b>' . $verzija_hramba . '</div>
        <p><b>Ime upravljalca: </b>' . $upravljalec_name . '
        <p><b>Priimek upravljalca: </b>' . $upravljalec_surname . '
        <p><b>Naslov upravljalca: </b>' . $upravljalec_address;

if(($poob_id !== NULL) && ($poob_id !== "0")){
    
    $current_poob = $poob->getIzBazePoob($poob_id);
    $pooblascenec_name = $current_poob->getIme();
    $pooblascenec_surname = $current_poob->getPriimek();
    $pooblascenec_address = $current_poob->getNaslov();
    $html = $html . "<p><b>Ime pooblascenca: </b>$pooblascenec_name
    <p><b>Priimek pooblascenca: </b>$pooblascenec_surname
    <p><b>Naslov pooblascenca: </b>$pooblascenec_address";
}

ob_end_clean();

//WRITE "HTML ONE" TO PAGE ONE
$pdf->writeHTML($html, true, false, true, false, '');

//RESET POINTER TO LAST PAGE
$pdf->lastPage();

$pdf->AddPage();

$html = '<br><p><div style="text-align:center"><h2>Besedilo privolitve: </h2></div><br>' . $verzija_text;

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->lastPage();

if (count($checkboxes) === 0){
    
}else{

    $pdf->AddPage();

    $html = '<br><br><div style="text-align:center"><h2>Opcijske privolitve glede namena uporabe podatkov:</h2></div><br>';
    
    foreach ($checkboxes as $cb){
        $checkbox_text = $cb->getCheckbox();
        $html = $html . "$checkbox_text<br><br>";
    }

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->lastPage();
}
//KONEC IZPISA PRIVOLITVE



//IZPIS PODPISNIKA
}else if(isset($_POST['export_id_podp'])){
    
    $podpisnik = $_SESSION['podpisnik'];
    $privolitev = $_SESSION['privolitev'];
    $verzija = $_SESSION['verzija'];
    $checkboxes = $_SESSION['checkboxes'];
    $boolboxes = $_SESSION['boolboxes'];
    
    $podpisnik_email =$podpisnik->getEmail();
    $podpisnik_ip =$podpisnik->getIp();
    $podpisnik_cas =$podpisnik->getCas();
    $pod_privolitev_naslov =$privolitev->getNaslov();
    $pod_verzija_verzija =$verzija->getVerzija();
    
    $pdf->AddPage();
    
    $html = "<b>EMAIL PODPISNIKA </b><br>$podpisnik_email
        <p><b>IP NASLOV PODPISNIKA </b><br>$podpisnik_ip
        <p><b>CAS PODPISA PODPISNIKA </b><br>$podpisnik_cas
        <p><b><br>NASLOV PODPISANE PRIVOLITVE</b><br>$pod_privolitev_naslov
        <p><b>VERZIJA PODPISANE VERZIJE</b><br>$pod_verzija_verzija
        <p>";
    if($checkboxes === FALSE){
        //DO NOTHING
    }else{
        $html = $html . "<p><b>OPCIJSKE PRIVOLITVE:</b><br><br>";
        foreach ($checkboxes as $cb){
            $html = $html . $cb->getCheckbox() . "<br>";
            if($boolboxes === FALSE){
                //DO NOTHING
            }else{
                foreach ($boolboxes as $bb){
                    if (($bb->getFk_checkbox()) === ($cb->getId())){
                        $html = $html . "<i>PRIVOLIL</i>";
                    }
                }
                $html = $html . "<br>";
            }
            $html = $html . "<br>";
        }
    }
    
    $pdf->writeHTML($html, true, false, true, false, '');
    
    $pdf->lastPage();
    //KONEC IZPISA PODPISNIKA
    
    
    
}else{
    header("Location: index.php");
    exit();
}

//REPEAT CODE
//ADD PAGE 2
//$pdf->AddPage();
//HTML TWO
//$html = 'PAGE TWO HTML';  
//WRITE "HTML TWO" TO PAGE TWO
//$pdf->writeHTML($html, true, false, true, false, '');
//RESET POINTER TO LAST PAGE
//$pdf->lastPage();
//END REPEAT CODE


//CLOSE AND OUTPUT PDF DOCUMENT - SET NAME HERE AS WELL
$pdf->Output('privolitev_export.pdf', 'I');

?>