<?php
session_start();
if (!$_SESSION["user_data"]) {
        header("Location: notfound.php");
    }
{
?>
<!DOCTYPE html>
<head>
<title> Inserisci Destinazione </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<h1>Inserimento di una destinazione</h1>

<form method="post" action="registra_destinazione.php">
<h2> Completa tutti i campi. Utilizza il formato corretto per i dati.</h2>

Nome della scuola
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 60 caratteri" maxlength="60" name="dest_nome"
id="dest_nome" required/><br /><br />

Descrizione della scuola
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 80 caratteri" maxlength="80" name="dest_desc"
id="dest_desc" required/><br /><br />

Indirizzo della scuola
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 50 caratteri" maxlength="50" name="dest_indirizzo"
id="dest_indirizzo" required/><br /><br />

Nazione della scuola
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="dest_nazione"
id="dest_nazione" required/><br /><br />

<input type="submit" value="Clicca per inserire la destinazione" />
</form>
</body>
</html>
<?php
}
?>