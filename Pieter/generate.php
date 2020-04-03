<?php
      require('PDF.php');

      $pdf = new PDF();
      $pdf->AliasNbPages();
      $pdf->AddPage();
      $pdf->SetFont('Times', '', 12);
      for($i = 1; $i <= 10; $i++)
            $pdf->Cell(0, 10, 'Belangrijke informatie', 0, 1);
      $pdf->Output();
?>