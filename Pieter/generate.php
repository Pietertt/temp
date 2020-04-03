<?php
      session_start();

      include("../tok.php");
      include("../token.php");
      include("../database.php");
      include("../cookie.php");
      include("../user.php");
      include('PDF.php');

      $cookie = new Cookie("token");
      if($cookie->does_cookie_exist()){
            if($cookie->validate_user($_COOKIE["token"])){
                  $_SESSION["logged_in"] = true;
                  $cookie->update();
                  $database = new Database();
                  $database->connect("localhost", "root", "", "ritsemabanck");
                  $result = $database->fetch($database->select("SELECT * FROM User WHERE email = ?", array(Token::decode($cookie->get_value())->username)));
                  
                  $user = new User();
                  $user->id = $result["id"];
                  $user->firstname = $result["firstname"];
                  $user->lastname = $result["lastname"];
                  $user->gender = $result["gender"];
                  $user->birth_date = $result["birth_date"];
                  $user->residence = $result["residence"];
                  $user->house_number = $result["house_number"];
                  $user->addition = $result["addition"];
                  $user->postal_code = $result["postal_code"];
                  $user->phone_number = $result["tnumber"];
                  $user->email = $result["email"];

                  $_SESSION["user"] = $user;
            } else {
                  $_SESSION["logged_in"] = false;
            }
      } else {
            $_SESSION["logged_in"] = false;
      }


      

      $pdf = new PDF();
      $pdf->AliasNbPages();
      $pdf->AddPage();

      $pdf->SetFont('Arial','',8);
      $pdf->WriteHTML("<b>Test</b>");

      $pdf->Cell(20, 10, 'Title', 1, 1);
      $pdf->Ln();

      $pdf->SetFont('Arial','',8);
      $pdf->Cell(0, 0, "Testsdsds", 0, 1);

      // $pdf->SetFont('Arial','',8);
      // $pdf->Write(0.1,"this is not bold, but this ");
      // $pdf->SetFont('Arial','B',8);
      // $pdf->Write(0.1,"is bold.");
      // $pdf->SetFont('Arial','',8);
      $pdf->Ln();


      $pdf->Output();
?>