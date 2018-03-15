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
<title> Inserisci Studente </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<h1>Inserimento di uno studente</h1>

<form method="post" action="registra_stud.php">
<h2> Completa tutti i campi. Utilizza il formato corretto per i dati.</h2>

Nome dello studente
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="stud_nome"
id="stud_nome" required/><br /><br />

Cognome dello studente
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="50" name="stud_cognome"
id="stud_cognome" required/><br /><br />

Data di nascita
<input type="date" name="stud_data" id="stud_data" required> <br /> <br />

Sesso
<input type="text" pattern="[a-zA-Z ]*"
title="M o F" maxlength="1" name="stud_sesso"
id="stud_sesso" required/><br /><br />

Residenza dello studente
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="stud_resid"
id="stud_resid" required/><br /><br />

Email dello studente
<input type="email" name="stud_email" id="stud_email" required> <br /><br />

Telefono dello studente
<input type="number"
title="Fino a 20 numeri" maxlength="20" name="stud_telefono"
id="stud_telefono" required/><br /><br />

Certificazione dello studente<br />
<input type="radio" name="stud_cert" id="stud_cert"
value="first">First<br />
<input type="radio" name="stud_cert" id="stud_cert"
value="pet">Pet<br />
<input type="radio" name="stud_cert" id="stud_cert" value="altro"
checked >altro<br /><br />


Seleziona il progetto cui partecipare
<select name='progetto' id='progetto'>
<?php 
$sql = $database->prepare("SELECT titoloProgetto FROM Progetti");
$sql->execute();
while ($row = $sql->fetch())
{
	echo "<option value='". $row['titoloProgetto'] . "'" . ">" . $row['titoloProgetto'] . "</option>";
}
?>
</select>
<br>
Data di richiesta iscrizione (inserisci oggi se ti iscrivi oggi)
<input type="date" name="data_iscr" id="data_iscr"> <br /> <br />

Quanti studenti ospiteresti?
<input type="number"
title="Fino a 20 numeri" maxlength="20" name="num_ospiti"
id="num_ospiti"/><br /><br />

Preferenze sul sesso degli ospiti?
<input type="text" pattern="[a-zA-Z ]*"
title="M o F" maxlength="1" name="pref_sesso"
id="pref_sesso" required/><br /><br />

Seleziona la mobilità
<select name='mobilita' id='mobilita'>
<?php 
$sql = $database->prepare("SELECT descrizione FROM Mobilita");
$sql->execute();
while ($row = $sql->fetch())
{
	echo "<option value='". $row['descrizione'] . "'" . ">" . $row['descrizione'] . "</option>";
}
?>
</select>
<br>
Disponibile a mobilità?<br>
 <input name="stud_dispmob" type="checkbox" value="Si"> Si <br>
 <input name="stud_dispmob" type="checkbox" value="No"> No <br> 
 
 <br>
Eventuali note di mobilità?
<input type="text" pattern="[a-zA-Z ]*"
title="Fino a 30 caratteri" maxlength="30" name="nota"
id="nota"/><br /><br />

<input type="submit" value="Clicca per inserire lo studente" />
</form>
</body>
</html>
<?php
}
?>