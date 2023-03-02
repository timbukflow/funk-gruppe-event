<?php

// Funktion, um unerwünschte Zeichen aus Benutzereingaben zu entfernen
function clean_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5);
    return $input;
}

// Variablen initialisieren
$errors = array();
$name = $vorname = $email = $telefon = $mitteilung = '';
$success = false;

// Überprüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Überprüfen des Namens
    if (empty($_POST["name"])) {
        $errors["name"] = "Name ist erforderlich";
    } else {
        $name = clean_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-ÖöÄäÜüéè ]*$/",$name)) {
            $errors["name"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    // Überprüfen des Vornamens
    if (empty($_POST["vorname"])) {
        $errors["vorname"] = "Vorname ist erforderlich";
    } else {
        $vorname = clean_input($_POST["vorname"]);
        if (!preg_match("/^[a-zA-Z-ÖöÄäÜüéè ]*$/",$vorname)) {
            $errors["vorname"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    // Überprüfen der E-Mail-Adresse
    if (empty($_POST["email"])) {
        $errors["email"] = "E-Mail ist erforderlich";
    } else {
        $email = clean_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Diese E-Mail-Adresse ist nicht korrekt";
        }
    }

    // Überprüfen der Telefonnummer
    if (empty($_POST["telefon"])) {
        $errors["telefon"] = "Telefonnummer ist erforderlich";
    } else {
        $telefon = clean_input($_POST["telefon"]);
        if (!preg_match("/(\d{3})\s(\d{3})\s(\d{2})\s(\d{2})/",$telefon)) {
            $errors["telefon"] = "Telefonnummer mit folgenden Abständen eintragen 071 000 00 00";
        }
    }

    // Überprüfen der Mitteilung
    if (empty($_POST["mitteilung"])) {
        $errors["mitteilung"] = "Bitte schreiben Sie uns eine Nachricht";
    } else {
        $mitteilung = clean_input($_POST["mitteilung"]);
    }

    // CSRF-Schutzmaßnahme (optional)
    // if (!isset($_POST["csrf_token"]) || $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
