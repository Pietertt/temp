<?php
      require("token.php");
      require("tok.php");
      require("cookie.php");
      // require('Pieter/PDF.php');

      // $pdf = new PDF();
      // $pdf->AliasNbPages();
      // $pdf->AddPage();
      // $pdf->SetFont('Times', '', 12);
      // for($i = 1; $i <= 10; $i++)
      //       $pdf->Cell(0, 10, 'Belangrijke informatie', 0, 1);
      // $pdf->Output();

      $cookie = new Cookie("token");
      print_r($cookie->get_value());

?>