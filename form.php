<?php

$name_error = $vorname_error = $email_error = $telefon_error = $mitteilung_error = $checkbox_error = "";
$name = $vorname = $email = $telefon = $mitteilung = $success = $checkbox = "";

function validateForm() {
    $errors = [];

    if (empty($_POST["name"])) {
        $errors["name"] = "Name ist erforderlich";
    } else {
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        if (empty($name)) {
            $errors["name"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["vorname"])) {
        $errors["vorname"] = "Vorname ist erforderlich";
    } else {
        $vorname = filter_var($_POST["vorname"], FILTER_SANITIZE_STRING);
        if (empty($vorname)) {
            $errors["vorname"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["email"])) {
        $errors["email"] = "Email ist erforderlich";
    } else {
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $errors["email"] = "Diese Email Adresse ist nicht korrekt";
        }
    }

    if (empty($_POST["telefon"])) {
        $errors["telefon"] = "Telefon ist erforderlich";
    } else {
        $telefon = filter_var($_POST["telefon"], FILTER_SANITIZE_STRING);
        if (!preg_match("/(\d{3})\s(\d{3})\s(\d{2})\s(\d{2})/", $telefon)) {
            $errors["telefon"] = "Telefonnummer mit folgenden Abständen eintragen 071 000 00 00";
        }
    }

    if (empty($_POST["mitteilung"])) {
        $errors["mitteilung"] = "Bitte schreiben Sie uns eine Nachricht";
    } else {
        $mitteilung = filter_var($_POST["mitteilung"], FILTER_SANITIZE_STRING);
    }

    if (empty($_POST["checkbox"])) {
        $errors["checkbox"] = "Bitte wählen Sie mindestens eine Option aus";
    } else {
        $checkbox = $_POST["checkbox"];
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = validateForm();
    if (empty($errors)) {
        // Speichern der Daten in der Datenbank
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
    } else {
        $name_error = $errors["name"] ?? "";
        $vorname_error = $errors["vorname"] ?? "";
        $email_error = $errors["email"] ?? "";
        $telefon_error = $errors["telefon"] ?? "";
        $mitteilung_error = $errors["mitteilung"] ?? "";
        $checkbox_error = $errors["checkbox"] ?? "";
    }
}

?>