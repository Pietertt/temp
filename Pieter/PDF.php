<?php
      include_once("fpdf.php");

      class PDF extends FPDF {
            function Header(){
                  $this->Image('../img/Ritsema Banck logo.png', 10, 6, 50);
                  $this->SetFont('Arial', 'B', 15);
                  $this->Cell(80);
                  $this->Cell(30, 10, 'Hypotheekaanvraag', 0, 0, 'C');
                  $this->Ln(20);
            } 
            
            function Footer(){
                  $this->SetY(-15);
                  $this->SetFont('Arial', 'I', 8);
                  $this->Cell(0, 10, 'Pagina '. $this->PageNo() . ' / {nb}', 0, 0, 'C');
            }
      }
?>