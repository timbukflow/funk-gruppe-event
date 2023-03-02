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
        <h1>
        Funk-Grill-Plausch Versichereranlass mit Fussball-Special
        </h1>
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

        <div class="containerform">
          <h2>Anmeldung</h2>
          <p class="small">Anmeldeschluss ist der 31. März 2023.</p>
          <?php include('form.php'); ?>

          <div>
          <form id="contact" action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
            <fieldset>
                <input placeholder="Name&#42;" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
                <span class="error"><?= $name_error ?></span>
            </fieldset>
            <fieldset>
                <input placeholder="Vorname&#42;" type="text" name="vorname" value="<?= $vorname ?>" tabindex="2">
                <span class="error"><?= $vorname_error ?></span>
            </fieldset>
            <fieldset>
                <input placeholder="Email&#42;" type="text" name="email" value="<?= $email ?>" tabindex="3" >
                <span class="error"><?= $email_error ?></span>
            </fieldset>
            <fieldset>
                <input placeholder="Telefon&#42;" type="text" name="telefon" value="<?= $telefon ?>" tabindex="4" >
                <span class="error"><?= $telefon_error ?></span>
            </fieldset>
            <fieldset>
                <textarea placeholder="Schreiben Sie uns eine Nachricht...." name="mitteilung" tabindex="5"><?= $mitteilung ?></textarea>
                <span class="error"><?= $mitteilung_error ?></span>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="checkbox1" name="checkbox[]" value="ja">
                <label for="checkbox1">Ja</label>
                <input type="checkbox" id="checkbox2" name="checkbox[]" value="vielleicht">
                <label for="checkbox2">Vielleicht</label>
                <input type="checkbox" id="checkbox3" name="checkbox[]" value="nein">
                <label for="checkbox3">Nein</label>
                <span class="error"><?= $checkbox_error ?></span>
            </fieldset>
            <fieldset>
                <input type="hidden" name="csrf_token" value="<?= csrf_token(); ?>">
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Senden</button>
            </fieldset>
            <div class="success"><?= $success; ?></div>
          </form>
         </div>
      </div>



      </article>
    </section>

    
    <?php require_once 'script.php'; ?>
</body>
</html>
