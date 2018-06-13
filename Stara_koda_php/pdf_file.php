<?php

require('fpdf.php');

$db = new PDO('mysql:host=localhost;dbname=praktikum','root','');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('gdpr.png',10,6,20);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',0,0,'C');
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
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
        
    function headerTable()
    {
        
     $this->SetFont('Arial','B',12);
     $this->Cell(30,10,'ID',1,0,'C');
     $this->Cell(30,10,'Uporabnisko ime',1,0,'C');
     $this->Cell(30,10,'Email',1,0,'C');
     $this->Cell(30,10,'Geslo',1,0,'C');
     
     
    }
    
    function viewTable()
    {
        
        $this->SetFont('Arial','B',12);
        
        $stmt = $db->query('select * from uporabnik');
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)){
        
            $this->Cell(30,10,$data->id,1,0,'L');
            $this->Cell(30,10,$data->username,1,0,'L');
            $this->Cell(30,10,$data->email,1,0,'L');
            $this->Cell(30,10,$data->password,1,0,'L');
            $this->Ln();
        
        }
        
    }
    
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->headerTable();
$pdf->viewTable();
$pdf->SetFont('Times','',12);
/*for($i=1;$i<=10;$i++)
    $pdf->Cell(0,5,'Printing line number '.$i,0,1);*/
$pdf->Output();
    ?>