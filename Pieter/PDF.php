<?php
      include_once("../vendor/fpdf/fpdf.php");

      class PDF extends FPDF {
            protected $B = 0;
            protected $I = 0;
            protected $U = 0;
            protected $HREF = '';
            
            function Header(){
                  $this->Image('../img/Ritsema Banck logo.png', 10, 6, 50);
                  $this->SetFont('Arial', 'B', 15);
                  $this->Cell(80);
                  $this->Cell(30, 10, 'Uw informatie', 0, 0, 'C');
                  $this->Ln(20);
                  $this->SetLineWidth(1);
            } 
            
            function Footer(){
                  $this->SetY(-15);
                  $this->SetFont('Arial', 'I', 8);
                  $this->Cell(0, 10, 'Pagina '. $this->PageNo() . ' / {nb}', 0, 0, 'C');
            }
      }
      
?>