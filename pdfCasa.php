<?php

require_once 'PDF.php';
require_once 'datos.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$casa = getCasa($id)["casa"];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->WriteSubtitle("Titulo:");
$pdf->Write(5, "" . utf8_decode($casa["titulo"]));
$pdf->Ln(10);

$pdf->WriteSubtitle('Descripcion:');
$pdf->Write(5, "" . utf8_decode($casa["texto"]));
$pdf->Ln(10);

$pdf->WriteSubtitle('Precio:');
$pdf->Write(5, "$ " . $casa["precio"]);
$pdf->Ln(10);

$pdf->WriteSubtitle('Metros Cuadrados:');
$pdf->Write(5, $casa["mts2"] . " m^2");
$pdf->Ln(10);

$pdf->WriteSubtitle('Tipo:');
$tipo = $casa["tipo"] == "C" ? "Casa" : "Apartamento";
$pdf->Write(5, $tipo);
$pdf->Ln(10);

$pdf->WriteSubtitle('Operacion:');
$op = $casa["operacion"] == "A" ? "Alquiler" : "Compra";
$pdf->Write(5, $op);
$pdf->Ln(10);

$pdf->WriteSubtitle('Habitaciones:');
$pdf->Write(5, $casa["habitaciones"]);
$pdf->Ln(10);

$pdf->WriteSubtitle('Barrio:');
$pdf->Write(5, $casa["barrio"]);
$pdf->Ln(10);

$pdf->WriteSubtitle('Baño:');
$pdf->Write(5, $casa["banios"]);
$pdf->Ln(10);

$pdf->WriteSubtitle('Garage:');
$gar = $casa["garage"] == "1" ? "Si" : "No";
$pdf->Write(5, $gar);

$pdf->Output();


