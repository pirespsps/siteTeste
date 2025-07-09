<?php
require_once __DIR__ . "/../genericPDF/GenericPDF.php";
require_once __DIR__ . "/Disco.php";
class DiscoPDF extends GenericPDF{

    public function __construct($orientation = 'P', $unit = 'mm', $size = 'A4'){
        parent::__construct($orientation,$unit,$size);
    }
    public function generatePDF($args){
    $disco = $args["disco"];
    $tracks = $args["tracks"];

    $imgDIR =  $disco->getPath_img();

    $this->AddPage();

    $this->SetFont("Arial", "B", 16);
    $this->Cell(19, 1, $disco->getTitulo(), 0, 1, "C");

    $this->SetFont("Arial", "", 12);
    $this->Cell(19, 0.5, "Banda: " . $disco->getBanda(), 0, 1, "C");
    $this->Cell(19, 0.5, "Ano: " . $disco->getAno(), 0, 1, "C");

    $this->Image($imgDIR, 5.5,3.3, 10, 10, "jpeg");

    $this->SetY(14);
    $counter = 1;
    foreach ($tracks as $track) {
        $titulo = $track->getNome();
        $this->setX(5.4);

        $this->SetFont("Arial", "B", 12);
        $this->Cell(0.3, 1, "$counter.", 0, 0, "L");

        $this->SetFont("Arial", "", 12);
        $this->Cell(1, 1, " $titulo", 0, 1, "L");

        $counter++;
    }

    $this->Output();

    }

}