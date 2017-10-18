<?php
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT * from form");


require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(95,12,$column,1);
}
$pdf->Output();
?>