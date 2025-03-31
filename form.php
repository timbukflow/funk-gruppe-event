<?php
// Funktion zum Absichern von Nutzereingaben
function sanitizeInput($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function validateForm() {
    global $teilnahme, $vorname, $name, $firma, $email, $mitteilung;
    $errors = [];

    if (empty($_POST["teilnahme"])) {
        $errors["teilnahme"] = "Bitte wählen Sie mindestens eine Option aus";
    } else {
        $teilnahme = sanitizeInput($_POST["teilnahme"]);
    }

    if (empty($_POST["vorname"])) {
        $errors["vorname"] = "Vorname ist erforderlich";
    } else {
        $vorname = filter_var($_POST["vorname"], FILTER_SANITIZE_STRING);
        if (empty($vorname)) {
            $errors["vorname"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["name"])) {
        $errors["name"] = "Name ist erforderlich";
    } else {
        $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        if (empty($name)) {
            $errors["name"] = "Es sind nur Buchstaben erlaubt";
        }
    }

    if (empty($_POST["firma"])) {
        $errors["firma"] = "Firma ist erforderlich";
    } else {
        $firma = filter_var($_POST["firma"], FILTER_SANITIZE_STRING);
        if (empty($firma)) {
            $errors["firma"] = "Es sind nur Buchstaben erlaubt";
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

    if (!empty($_POST["mitteilung"])) {
        $mitteilung = sanitizeInput($_POST["mitteilung"]);
    }

    // Rechenaufgabe prüfen (feste Aufgabe: 3 + 4 = 7)
    if (!isset($_POST["captcha"]) || trim($_POST["captcha"]) === "") {
        $errors["captcha"] = "Bitte beantworten Sie die Rechenfrage.";
    } elseif (intval($_POST["captcha"]) !== 7) {
        $errors["captcha"] = "Die Antwort auf die Rechenfrage ist nicht korrekt.";
    }

    return $errors;
}

// Formularverarbeitung
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = validateForm();

    if (empty($errors)) {
        if ($teilnahme == "Ja, ich nehme gerne teil") {
            $teilnahme_kurz = "Ja ohne Töggeliturnier";
        } elseif ($teilnahme == "Ja, ich nehme gerne teil und mache am Töggeliturnier mit") {
            $teilnahme_kurz = "Ja mit Töggeliturnier";
        } elseif ($teilnahme == "Leider bin ich verhindert") {
            $teilnahme_kurz = "Nein";
        } else {
            $teilnahme_kurz = "Unbekannt";
        }

        // Nachricht erstellen
        $message_body = "Anmeldung zur Veranstaltung\n\n";
        $message_body .= "Teilnahme: " . $teilnahme_kurz . "\n";
        $message_body .= "Vorname: " . sanitizeInput($vorname) . "\n";
        $message_body .= "Name: " . sanitizeInput($name) . "\n";
        $message_body .= "Firma: " . sanitizeInput($firma) . "\n";
        $message_body .= "Email: " . sanitizeInput($email) . "\n";
        $message_body .= "Mitteilung: " . sanitizeInput($mitteilung) . "\n";

        // E-Mail senden
        $headers = "From: anmeldung@funk-gruppe-event.ch";
        $to = "ivoschwizer@gmail.com";
        $subject = "Funk Gruppe Event - Anmeldung zum Grillabend";
        $headers .= "\r\nContent-Type: text/plain; charset=utf-8\r\n";

        if (mail($to, $subject, $message_body, $headers)) {
            $success = "Vielen Dank für deine Anmeldung!";
            $teilnahme = $essenspraferenz = $vorname = $name = $firma = $email = $mitteilung = "";
        }
    } else {
        // Fehlerhafte Eingaben wiederherstellen
        $teilnahme = $_POST["teilnahme"] ?? "";
        $vorname = $_POST["vorname"] ?? "";
        $name = $_POST["name"] ?? "";
        $firma = $_POST["firma"] ?? "";
        $email = $_POST["email"] ?? "";
        $mitteilung = $_POST["mitteilung"] ?? "";
    }
}
?>