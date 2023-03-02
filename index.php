<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" />

    <meta name="description" content="Funk-Grill-Plausch Versichereranlass mit Fussball-Special">
    <title>Funk Gruppe Event</title>
</head>

<body>
    <header>
        <h1>Funk-Grill-Plausch Versichereranlass mit Fussball-Special</h1>
        <div class="grill"><img src="./img/funk-grill.svg" alt="funk-grill"></div>
    </header>
    <section>
      <article>
        <h1>Geschätzte Geschäftspartner</h1>
        <p>
          <span>
            Als Dankeschön für unsere erfolgreiche Zusammenarbeit laden wir Sie herzlich ein, zusammen mit uns einen gemütlichen Grillabend zu verbringen. Freuen Sie sich auch dieses Jahr auf unser packendes Fussball-Special!
          </span>
          <span>
            Wir freuen uns, Sie an diesem Anlass zu begrüssen und erwarten gerne Ihre Anmeldung über das Anmeldeformular auf der letzten Seite.
          </span>
          <span>
            Herzliche Grüsse <br>
            Ihre Funkianer
          </span>
        </p>
      </article>

      <article>
        <div class="acctitle">
          <h2>Programm</h2>
          <div class="pmcontainer">
            <div class="plus"></div>
            <div class="minus"></div>
          </div>
          <div class="acclist">
            <div class="acclistc">
              <p>17.00 Uhr</p>
              <p>Eintreffen der Gäste <span>be/at</span></p>
              <p>17.45 Uhr</p>
              <p>Begrüssung<span>be/at</span></p>
              <p>18.00 Uhr</p>
              <p>Grill-Plausch<span>be/at / Terrasse</span></p>
              <p>19.00 Uhr</p>
              <p>Start Töggeliturnier<span>Agora</span></p>
              <p class="noline">21.15 Uhr</p>
              <p class="noline">Ende Töggeliturnier und Rangverkündung<span>be/at</span></p>
            </div>
          </div>
        </div>
        <div class="acctitle">
          <h2>Anreise</h2>
          <div class="pmcontainer">
            <div class="plus"></div>
            <div class="minus"></div>
          </div>
          <div class="acclist">
            <div class="acclistc">
              <p class="green">Adresse</p>
              <p class="green">Hagenholzstrasse 56, 8050 Zürich</p>
              <p>zu Fuss</p>
              <p>ab Bahnhof Oerlikon Fussweg ca. 10 Minuten</p>
              <p>mit ÖV</p>
              <p>ab Bahnhof Oerlikon mit Bus Nr 781 bis Haltestelle «Hagenholz» oder Tram 11 bis Haltestelle «Leutschenbach » und kurzer Fussweg</p>
              <p>mit PW</p>
              <p>folgen Sie dem Zeichen «Messe Zürich» und parkieren Sie im Parkhaus Messe Zürich AG</p>
              <p class="noline gitem02">Kontaktperson bei Fragen: karin.deutsch@funk-gruppe.ch</p>
            </div>
          </div>
        </div>
      </article>
      <div class="containerform">
            <h2>Anmeldung</h2>
            <p>Anmeldeschluss ist der 31. März 2023.</p>
            <?php include('form.php'); ?>

            <form id="contact" action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
            <fieldset>
                  <label class="form-control" for="checkbox1">
                    <input  type="radio" id="checkbox1" name="checkbox[]" value="Ja, ich nehme gerne teil" <?= (is_array($checkbox) && in_array("Ja, ich nehme gerne teil", $checkbox)) ? "checked" : "" ?>> Ja, ich nehme gerne teil
                  </label>
                  <label class="form-control" for="checkbox2">
                    <input type="radio" id="checkbox2" name="checkbox[]" value="Ja, ich nehme gerne teil und mache am Töggeliturnier mit" <?= (is_array($checkbox) && in_array("Ja, ich nehme gerne teil und mache am Töggeliturnier mit", $checkbox)) ? "checked" : "" ?>> Ja, ich nehme gerne teil und mache am Töggeliturnier mit
                  </label>
                  <label class="form-control" for="checkbox3">
                    <input type="radio" id="checkbox3" name="checkbox[]" value="Leider bin ich verhindert" <?= (is_array($checkbox) && in_array("Leider bin ich verhindert", $checkbox)) ? "checked" : "" ?>> Leider bin ich verhindert
                  </label>
                  <span class="error"><?= isset($errors["checkbox"]) ? $errors["checkbox"] : $checkbox_error ?></span>
              </fieldset>
              <fieldset>
                  <input placeholder="Vorname&#42;" type="text" name="vorname" value="<?= $vorname ?>" tabindex="1">
                  <span class="error"><?= isset($errors["vorname"]) ? $errors["vorname"] : $vorname_error ?></span>
              </fieldset>
              <fieldset>
                  <input placeholder="Name&#42;" type="text" name="name" value="<?= $name ?>" tabindex="2" autofocus>
                  <span class="error"><?= isset($errors["name"]) ? $errors["name"] : $name_error ?></span>
              </fieldset>
              <fieldset>
                  <input placeholder="Firma&#42;" type="text" name="firma" value="<?= $firma ?>" tabindex="3" autofocus>
                  <span class="error"><?= isset($errors["firma"]) ? $errors["firma"] : $firma_error ?></span>
              </fieldset>
              <fieldset>
                  <input placeholder="Email&#42;" type="text" name="email" value="<?= $email ?>" tabindex="4">
                  <span class="error"><?= isset($errors["email"]) ? $errors["email"] : $email_error ?></span>
              </fieldset>
              <fieldset>
                  <input placeholder="Telefon&#42;" type="text" name="telefon" value="<?= $telefon ?>" tabindex="5">
                  <span class="error"><?= isset($errors["telefon"]) ? $errors["telefon"] : $telefon_error ?></span>
              </fieldset>
              <fieldset>
                  <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Senden</button>
              </fieldset>
              <div class="success"><?= $success; ?></div>
            </form>
      </div>

        
      



      
    </section>

    
    <?php require_once 'script.php'; ?>
</body>
</html>
