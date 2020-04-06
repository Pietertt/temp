<?php
      session_start();

      include("../tok.php");
      include("../token.php");
      include("../database.php");
      include("../cookie.php");
      include("../user.php");
      include("PDF.php");

      $cookie = new Cookie("token");
      if($cookie->does_cookie_exist()){
            if($cookie->validate_user($_COOKIE["token"])){
                  $_SESSION["logged_in"] = true;
                  $cookie->update();
                  $database = new Database();
                  $database->connect("localhost", "root", "", "ritsemabanck");
                $mortgage_result = $database->fetch($database->select("SELECT * FROM HypotheekInfo WHERE Email = ?", array(Token::decode($cookie->get_value())->username)));

                $user = new User();

                if (!empty($mortgage_result)) {
                    $user->birthdate = $mortgage_result["Geboortedatum"];
                    $user->bank_number = $mortgage_result["Rekeningnummer"];
                    $user->gross_anual_income = $mortgage_result["Bruto jaarinkomen"];
                    $user->input_money = $mortgage_result["Eigen inbreng"];
                    $user->dept = $mortgage_result["Schulden"];
                    $user->purchase_price = $mortgage_result["Koopprijs"];
                    $user->email = $mortgage_result["Email"];
                    $user->mortgage_duration = $mortgage_result["Hypotheek looptijd"];
                    $user->mortgage = $mortgage_result["Hypotheek"];
                }

                  $result = $database->fetch($database->select("SELECT * FROM User WHERE email = ?", array(Token::decode($cookie->get_value())->username)));

                  $user->id = $result["id"];
                  $user->firstname = $result["firstname"];
                  $user->lastname = $result["lastname"];
                  $user->gender = $result["gender"];
                  $user->birth_date = $result["birth_date"];
                  $user->residence = $result["residence"];
                  $user->street = $result["street"];
                  $user->house_number = $result["house_number"];
                  $user->addition = $result["addition"];
                  $user->postal_code = $result["postal_code"];
                  $user->phone_number = $result["tnumber"];
                  $user->email = $result["email"];

                  $_SESSION["user"] = $user;
            } else {
                  $_SESSION["logged_in"] = false;
                  header("Location: ../Pieter/index.php");
            }
      } else {
            $_SESSION["logged_in"] = false;
      }

      $pdf = new PDF();
      $pdf->AliasNbPages();
      $pdf->AddPage();

      $pdf->setFont("Arial", "I", 12);
      $pdf->write(5, "In dit document kunt u alle informatie vinden van uw hypotheekaanvraag. Deze gegevens zijn ook bekend bij Ritsema Banck en zijn beschermd. Na de aanvraag van uw hypotheek wordt zo spoedig mogelijk contact met u opgenomen.\n\nHeeft u verder nog vragen of opmerkingen dan kunt u altijd mailen naar info@ritsemabanck.frl.\n");
      $pdf->Ln();

      $pdf->setFont("Arial", "B", 12);
      $pdf->write(5, "Naam\n");
      $pdf->setFont("Arial", "", 12);
      $pdf->write(5, $_SESSION["user"]->firstname . " " . $_SESSION["user"]->lastname . "\n");

      $pdf->Ln();

      $pdf->setFont("Arial", "B", 12);
      $pdf->write(5, "Geslacht\n");
      $pdf->setFont("Arial", "", 12);
      $pdf->write(5, $_SESSION["user"]->gender . "\n");

      $pdf->Ln();

      $pdf->setFont("Arial", "B", 12);
      $pdf->write(5, "Geboortedatum\n");
      $pdf->setFont("Arial", "", 12);
      $pdf->write(5, $_SESSION["user"]->birth_date . "\n");

      $pdf->Ln();

      $pdf->setFont("Arial", "B", 12);
      $pdf->write(5, "Adres\n");
      $pdf->setFont("Arial", "", 12);
      $pdf->write(5, $_SESSION["user"]->street . " " . $_SESSION["user"]->house_number . " " . $_SESSION["user"]->addition .  "\n");
      $pdf->write(5, $_SESSION["user"]->postal_code . ", " . $_SESSION["user"]->residence . "\n");

      $pdf->Ln();

      $pdf->setFont("Arial", "B", 12);
      $pdf->write(5, "Telefoonnummer\n");
      $pdf->setFont("Arial", "", 12);
      $pdf->write(5, $_SESSION["user"]->phone_number . "\n");

      $pdf->Ln();

      $pdf->setFont("Arial", "B", 12);
      $pdf->write(5, "E-mailadres\n");
      $pdf->setFont("Arial", "", 12);
      $pdf->write(5, $_SESSION["user"]->email . "\n");

      $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Rekeningnummer\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->bank_number . "\n");

    $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Bruto jaarinkomen\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->gross_anual_income . "\n");

    $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Eigen inbreng\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->input_money . "\n");

    $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Schulden\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->dept . "\n");

    $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Koopprijs\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->purchase_price . "\n");

    $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Hypotheek looptijd\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->mortgage_duration . "\n");

    $pdf->Ln();

    $pdf->setFont("Arial", "B", 12);
    $pdf->write(5, "Hypotheek\n");
    $pdf->setFont("Arial", "", 12);
    $pdf->write(5, $_SESSION["user"]->mortgage . " euro\n");

    $pdf->Ln();

$pdf->setFont("Arial", "I", 12);
      $pdf->write(5, "Voor meer informatie over onze gegevensverwerking verwijzen wij u graag door naar onze\n");

      $pdf->SetFont("Arial", "U", 12);
      $pdf->Cell(0, 4.3, "privacyverklaring.", "", "", "", false, "http://localhost/temp/privacyverklaring.php");
      $pdf->Output();
?>