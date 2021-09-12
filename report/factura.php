<?php
session_start();
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
$id=$_GET['id'];
$sVenta=ejecutarSQL::consultar("SELECT * FROM venta WHERE NumPedido='$id'");
$dVenta=mysqli_fetch_array($sVenta, MYSQLI_ASSOC);
$sCliente=ejecutarSQL::consultar("SELECT * FROM cliente WHERE DNI='".$dVenta['Cliente_dni']."'");
$dCliente=mysqli_fetch_array($sCliente, MYSQLI_ASSOC);
class PDF extends FPDF{
    
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Times','B',20);
        // Movernos a la derecha
        $this->Cell(71);
        // Título
        $this->Cell(60,10,'Al Carbon Grill',1,0,'C');
        // Salto de línea
        $this->Ln(10);
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        $this->SetFont('Times','I',8);
        $this->Cell(0,10,'www.alcarbongrill.com',0,0,'C');
    }
}
ob_end_clean();
$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont("Times","",20);
$pdf->SetMargins(25,20,25);
$pdf->SetFillColor(0,255,255);
$pdf->SetFont("Times","",10);
$pdf->Cell(50);
$pdf->Cell (100,5,utf8_decode('APV Los libertadores, Huadquiña - Santa Teresa'),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont("Times","b",15);
$pdf->Cell (0,5,utf8_decode('BOLETA DE PEDIDO #'.$id),0,1,'C');
$pdf->Ln(15);
$pdf->SetFont("Times","",12);
$pdf->Cell (40,5,utf8_decode('Fecha del pedido'),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (40,5,utf8_decode(': '.$dVenta['Fecha']),0);
$pdf->Ln(10);
$pdf->SetFont("Times","",12);
$pdf->Cell (40,5,utf8_decode('Nombre del cliente'),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (40,5,utf8_decode(': '.$dCliente['Nombre']." ".$dCliente['Apellidos']),0);
$pdf->Ln(10);
$pdf->SetFont("Times","",12);
$pdf->Cell (40,5,utf8_decode('DNI'),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (40,5,utf8_decode(': '.$dCliente['DNI']),0);
$pdf->Ln(10);
$pdf->SetFont("Times","",12);
$pdf->Cell (40,5,utf8_decode('Telefono'),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (40,5,utf8_decode(': '.$dCliente['Telefono']),0);
$pdf->Ln(10);
$pdf->SetFont("Times","",12);
$pdf->Cell (40,5,utf8_decode('Dirección de envio'),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (40,5,utf8_decode(': '.$dVenta['DirRef']),0);
$pdf->Ln(15);
$pdf->SetFont("Times","b",15);
$pdf->Cell (0,5,utf8_decode('Platillos comprados'),0,1,'C');
$pdf->Ln(3);
$pdf->SetFont("Times","b",12);
$pdf->Cell (76,10,utf8_decode('Nombre'),1,0,'C');
$pdf->Cell (30,10,utf8_decode('Precio U.'),1,0,'C');
$pdf->Cell (30,10,utf8_decode('Cantidad'),1,0,'C');
$pdf->Cell (30,10,utf8_decode('Subtotal'),1,0,'C');
$pdf->Ln(10);
$pdf->SetFont("Times","",12);
$suma=0;
$sDet=ejecutarSQL::consultar("SELECT * FROM detalle WHERE NumPedido='".$id."'");
while($fila1 = mysqli_fetch_array($sDet, MYSQLI_ASSOC)){
    $consulta=ejecutarSQL::consultar("SELECT * FROM producto WHERE CodigoProd='".$fila1['CodigoProd']."'");
    $fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC);
    $pdf->Cell (76,10,utf8_decode($fila['NombreProd']),1,0,'C');
    $pdf->Cell (30,10,utf8_decode('s/.'.$fila1['PrecioProd']),1,0,'C');
    $pdf->Cell (30,10,utf8_decode($fila1['CantidadProductos']),1,0,'C');
    $pdf->Cell (30,10,utf8_decode('s/.'.$fila1['PrecioProd']*$fila1['CantidadProductos']),1,0,'C');
    $pdf->Ln(10);
    $suma += $fila1['PrecioProd']*$fila1['CantidadProductos'];
    mysqli_free_result($consulta);
}
$pdf->SetFont("Times","b",12);
$pdf->Cell (76,10,utf8_decode(''),1,0,'C');
$pdf->Cell (30,10,utf8_decode(''),1,0,'C');
$pdf->Cell (30,10,utf8_decode(''),1,0,'C');
$pdf->Cell (30,10,utf8_decode('s/.'.number_format($suma,2)),1,0,'C');
$pdf->Ln(10);
$pdf->Output('Factura-#'.$id,'I');
mysqli_free_result($sVenta);
mysqli_free_result($sCliente);
mysqli_free_result($sDet);