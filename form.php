<?php

$name_error = $vorname_error = $email_error = $telefon_error = $mitteilung_error = "";
$name = $vorname = $email = $telefon = $mitteilung = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "Name ist erforderlich";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-ÖöÄäÜüéè ]*$/",$name)) {
            $name_error = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["vorname"])) {
        $vorname_error = "Vorname ist erforderlich";
    } else {
        $vorname = test_input($_POST["vorname"]);
        if (!preg_match("/^[a-zA-Z-ÖöÄäÜüéè ]*$/",$vorname)) {
            $vorname_error = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["email"])) {
        $email_error = "Email ist erforderlich";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Diese Email Adresse ist nicht korrekt";
        }
    }

    if (empty($_POST["telefon"])) {
        $telefon_error = "Telefon ist erforderlich";
    } else {
        $telefon = test_input($_POST["telefon"]);
        if (!preg_match("/(\d{3})\s(\d{3})\s(\d{2})\s(\d{2})/",$telefon)) {
            $telefon_error = "Telefonnummer mit folgenden Abständen eintragen 071 000 00 00";
        }
    }

    if (empty($_POST["mitteilung"])) {
        $mitteilung_error = "Bitte schreiben Sie uns eine Nachricht";
    } else {
        $mitteilung = test_input($_POST["mitteilung"]);
    }

    if ($name_error == "" and $vorname_error == "" and $email_error == "" and $telefon_error == "" and $mitteilung_error == "" ){
        $message_body = "";
        unset($_POST["submit"]);
        foreach($_POST as $key => $value){
            $message_body .= "$key: $value\n";
        }

        $headers = "From:anfrage@stepcube.ch";
        $to = "janine.schmuckli@sur.ag";
        $subject = "Stepcube Anfrage";
        if (mail($to, $subject, $message_body, $headers)){
            $success = "Ihre Anfrage wurde erfolgreich gesendet.";
            $name = $vorname = $email = $telefon = $mitteilung = "";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
