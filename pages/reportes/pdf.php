<?php
include('../../databases/db.php');
require_once ('../../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
    $this->Ln(20);
    // Arial bold 15
    $this->SetFont('Arial','B',30);
  
    // Movernos a la derecha
    $this->Cell(50);

    // Título
    $this->Cell(70,10,'Tabla de usuarios ',0,0,'C');
    // Salto de línea
   
    $this->Ln(50);
    $this->SetFont('Arial','B',8);
    $this->SetX(10);
    $this->Cell(25,10,'Nombre',1,0,'C',0);
    $this->Cell(30,10,'Tipo de documento',1,0,'C',0,);
    $this->Cell(30,10,'Numero de documento',1,0,'C',0);
    $this->Cell(30,10,'Fecha de nacimiento',1,1,'C',0);
    $this->Cell(25,10,'Email',1,1,'C',0);
    $this->Cell(25,10,'Contacto',1,1,'C',0);

	

  
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(1);
    
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
  
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
   //$this->SetFillColor(223, 229,235);
    //$this->SetDrawColor(181, 14,246);
    //$this->Ln(0.5);
}
}

$query="SELECT users.name, users.type_document, users.number_document, users.region, 
users.date_of_birth,users.email, users.contact FROM users LEFT JOIN roles ON users.role = roles.id";
$resultado = mysqli_query($conn, $query);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row=$resultado->fetch_assoc()) {

    $pdf->SetX(12);

    $pdf->Cell(25,10,$row['name'],1,0,'C',0);
    $pdf->Cell(30,10,$row['type_document'],1,0,'C',0);
	$pdf->Cell(30,10,$row['number_document'],1,0,'C',0);
    $pdf->Cell(25,10,$row['region'],1,0,'C',0);
    $pdf->Cell(30,10,$row['date_of_birth'],1,1,'C',0);
    $pdf->Cell(25,10,$row['email'],1,1,'C',0);
    $pdf->Cell(25,10,$row['contact'],1,1,'C',0);



} 


	$pdf->Output();
?>