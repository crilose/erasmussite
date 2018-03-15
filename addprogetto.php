<?php
session_start();
require 'connect.php';
if (!$_SESSION["user_data"]) {
        header("Location: notfound.php");
    }
{
?>
<!DOCTYPE html>
<head>
<title> Inserisci Progetto </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<h1>Inserimento di un progetto</h1>

<form method="post" action="registra_progetto.php">
<h2> Completa tutti i campi. Utilizza il formato corretto per i dati.</h2>

Nome del progetto (max 20 caratteri)
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="progetto_name"
id="progetto_name" required/><br /><br />

Descrizione del progetto (max 50 caratteri)
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 50 caratteri" maxlength="50" name="progetto_desc"
id="progetto_desc" required/><br /><br />

Destinatari del progetto (max 20 caratteri)
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="progetto_dest"
id="progetto_dest" required/><br /><br />

Referente del progetto (max 20 caratteri)
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="progetto_ref"
id="progetto_ref" required/><br /><br />

Tipologia progetto:<br />
<input type="radio" name="progetto_tipologia" id="progetto_tipologia"
value="erasmus">erasmus<br />
<input type="radio" name="progetto_tipologia" id="progetto_tipologia"
value="scambio">scambio<br />
<input type="radio" name="progetto_tipologia" id="progetto_tipologia" value="altro"
checked >altro<br /><br />

Seleziona l'a.s. di inizio
<select name='asinizio' id='asinizio'>
<option value='-1' selected>Seleziona un a.s.</option>
<option value='2015/16'>2015/16</option>
<option value='2016/17'>2016/17</option>
<option value='2017/18'>2017/18</option>
</select><br>

Seleziona l'a.s. di fine
<select name='asfine' id='asfine'>
<option value='-1' selected>Seleziona un a.s.</option>
<option value='2015/16'>2015/16</option>
<option value='2016/17'>2016/17</option>
<option value='2017/18'>2017/18</option>
</select><br>

Seleziona la destinazione
<select name='destinazione' id='destinazione'>
<?php 
$sql = $database->prepare("SELECT nomeScuola FROM Destinazioni");
$sql->execute();
while ($row = $sql->fetch())
{
	echo "<option value='". $row['nomeScuola'] . "'" . ">" . $row['nomeScuola'] . "</option>";
}
?>


Progetto concluso? (Se si, spunta):<br />
<input type="checkbox" name="progetto_concluso" id="progetto_concluso"
value="concluso">Conluso!<br />

<input type="submit" value="Clicca per inserire il progetto" />
</form>
</body>
</html>
<?php
}
?>