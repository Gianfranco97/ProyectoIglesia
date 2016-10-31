<?php
	//SE LLAMAN LOS ARCHIVOS NECESARIOS
  session_start();
  include ("../conex.php");
  require_once("fpdf/fpdf.php");
 //CREACION CLASE PDF
 $pdf = new FPDF();
 //AÑADE LA PAGINA
$pdf->AddPage();
//CARACTERISTICAS DEL ENCABEZADO, TIPO DE LETRA, CELDAS Y TODO ESO
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/Logo_rm.png' , 10 ,8, 10 , 13,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, '"Centro Cristiano Restauracion Mundial"', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE NIVELES APERTURADOS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(26, 8, 'Cedula lider',1, 0, 'C');
$pdf->Cell(20, 8, 'Nivel',1, 0, 'C');
$pdf->Cell(20, 8, 'estudiantes',1, 0, 'C');
$pdf->Cell(30, 8, 'Fecha inicio',1, 0, 'C');
$pdf->Cell(35, 8, 'Fecha final',1, 0, 'C');
$pdf->Cell(35, 8, 'Estatus',1, 0, 'C');
$pdf->Cell(28, 8, 'Horario',1, 0, 'C');
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$sql = 'SELECT * FROM nivel';
$rec=mysqli_query($enlace,$sql);
//SE MUESTRAN EN LA TABLA LOS DATOS CONSULTADOS DE LA BASE DE DATOS
while($row=mysqli_fetch_assoc($rec)){
	$pdf->Cell(26, 8,$row['ci_lider'],1, 0, 'C');
	$pdf->Cell(20, 8,$row['trimestre'],1, 0, 'C');
	$pdf->Cell(20, 8,$row['cantidad_estudiantes'],1, 0, 'C');
	$pdf->Cell(30, 8,$row['fech_inicio'],1, 0, 'C');
	$pdf->Cell(35, 8,$row['fech_final'],1, 0, 'C');
	$pdf->Cell(35, 8,$row['estatus_nivel'],1, 0, 'C');
	$pdf->Cell(28, 8,$row['horario'],1, 0, 'C');
	$pdf->Ln(8);
}
//MUESTRA EL PDF
$pdf->Output();
?>
