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
<title> Inserisci Accompagnatore </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<h1>Inserimento di un accompagnatore</h1>

<form method="post" class="form-horizontal" action="registra_acc.php">
<h2> Completa tutti i campi. Utilizza il formato corretto per i dati.</h2>

<div class="form-group">
 <label class="control-label col-sm-2" for="acc_nome">Nome del docente</label>
<div class="col-sm-4">
<input type="text" class="form-control" size="50" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="acc_nome"
id="acc_nome" required/>
</div>
</div>


<div class="form-group">
 <label class="control-label col-sm-2" for="acc_cognome">Cognome del docente</label>
<div class="col-sm-4">
<input type="text" class="form-control" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="50" name="acc_cognome"
id="acc_cognome" required/>
</div>
</div>


<div class="form-group">
 <label class="control-label col-sm-2" for="acc_datanascita">Data di nascita</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="acc_datanascita" id="acc_datanascita" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="acc_sesso">Sesso</label>
<div class="col-sm-4">
<input type="text" class="form-control" pattern="[a-zA-Z ]*"
title="M o F" maxlength="1" name="acc_sesso"
id="acc_sesso" required/>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="acc_residenza">Residenza</label>
<div class="col-sm-4">
<input type="text" class="form-control" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="20" name="acc_residenza"
id="acc_residenza" required/></div></div>

<div class="form-group">
 <label class="control-label col-sm-2" for="acc_email">Email</label>
<div class="col-sm-4">
<input type="email" class="form-control"  name="acc_email" id="acc_email" required> </div></div>


<div class="form-group">
 <label class="control-label col-sm-2" for="acc_telefono">Telefono</label>
<div class="col-sm-4">
<input type="number" class="form-control"
title="Fino a 20 numeri" maxlength="20" name="acc_telefono"
id="acc_telefono" required/></div></div>


<div class="form-group">
 <label class="control-label col-sm-2" for="acc_cert">Certificazione</label>
<div class="col-sm-4">
<div class="radio">
<input type="radio"  name="acc_cert" id="acc_cert"
value="first">First<br /></div>
<div class="radio">
<input type="radio" name="acc_cert" id="acc_cert"
value="pet">Pet<br /></div>
<div class="radio">
<input type="radio"  name="acc_cert" id="acc_cert" value="altro"
checked >altro</div>
</div></div>

<div class="form-group">
 <label class="control-label col-sm-2" for="acc_qualifica">Qualifica</label>
<div class="col-sm-4">
<div class="radio">
<input type="radio"  name="acc_qualifica" id="acc_qualifica"
value="docente">Docente<br /></div>
<div class="radio">
<input type="radio" name="acc_qualifica" id="acc_qualifica"
value="preside">Preside<br /></div>
<div class="radio">
<input type="radio" name="acc_qualifica" id="acc_qualifica" value="altro"
checked >Altro<br /><br /></div>
</div></div>

Disciplina <br />
<input type="radio" name="acc_materia" id="acc_materia"
value="informatica">Informatica<br />
<input type="radio"  name="acc_materia" id="acc_materia"
value="matematica">Matematica<br />
<input type="radio" ame="acc_materia" id="acc_materia"
value="italiano">Italiano<br />
<input type="radio" name="acc_materia" id="acc_materia"
value="telecomunicazioni">Telecomunicazioni<br />
<input type="radio"  name="acc_materia" id="acc_materia"
value="sistemi e reti">Sistemi e Reti<br />
<input type="radio"  name="acc_materia" id="acc_materia"
value="inglese">Inglese<br />
<input type="radio"  name="acc_materia" id="acc_materia"
value="fisica">Fisica<br />
<input type="radio"  name="acc_materia" id="acc_materia"
value="chimica">Chimica<br />
<input type="radio"  name="acc_materia" id="acc_materia"
value="meccanica">Meccanica<br />
<input type="radio" name="acc_materia" id="acc_materia"
value="grafica">Grafica<br />
<br />

Seleziona il progetto
<select name='progetto' class="form-control" id='progetto'>
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
Coordinatore progetto? <br>
 <input name="acc_coord" type="checkbox" value="Si"> Si <br>
 <input name="acc_coord" type="checkbox" value="No"> No <br> 

Seleziona la mobilità
<select name='mobilita' class="form-control" id='mobilita'>
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
 <input name="acc_dispmob"  type="checkbox" value="Si"> Si <br>
 <input name="acc_dispmob" type="checkbox" value="No"> No <br> 
 
 <br>
Eventuali note di mobilità?
<input type="text" class="form-control" pattern="[a-zA-Z ]*"
title="Fino a 30 caratteri" maxlength="30" name="nota"
id="nota"/><br /><br />

<input type="submit" class="form-control" value="Clicca per inserire l'accompagnatore" />
</form>
</body>
</html>
<?php
}
?>