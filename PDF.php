<?php

require('fpdf.php');

class PDF extends FPDF {

// Cabecera de página
    function Header() {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Ficha Detallada de la Propiedad', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
    }

// Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function WriteSubtitle($word) {
        $this->SetFont('Arial', 'B', 12);
        $this->Write(5, "" . utf8_decode($word));
        $this->Ln();
        $this->SetFont('Times', '', 12);
    }

}
