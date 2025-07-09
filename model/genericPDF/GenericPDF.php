<?php
require_once __DIR__ . "/../../lib/fpdf186/fpdf.php";
abstract class GenericPDF extends FPDF{

    public function __construct($orientation = 'P', $unit = 'mm', $size = 'A4'){
        parent::__construct($orientation,$unit,$size);
    }

    public abstract function generatePDF($args);

}