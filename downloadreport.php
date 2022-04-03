<?php
require('FPDF/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table


// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45,40,45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    
    foreach($data as $row)
    {
        $fill = false;
    $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
    $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
    $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
    $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
    $this->Cell($w[4],6,$row[4],'LR',0,'L',$fill);
    $this->Cell($w[5],6,$row[5],'LR',0,'L',$fill);
    $this->Ln();
    $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

if(isset($_POST['downloadbtn'])){

    
$pdf = new PDF();
// Column headings
$header = array('Id', 'Full Name', 'Age','Ward No', 'Test no','condition' );
// Data loading
$data = array("a"=>'sample',"a"=>'sample1',"a"=>'sample2',"a"=>'sample3',"a"=>'sample4',"a"=>'sample5');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
}

?>
