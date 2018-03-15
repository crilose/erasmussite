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
<title> Inserisci Mobilità </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<h1>Inserimento di una mobilità</h1>

<form method="post" class="form-horizontal" action="registra_mob.php">
<h2> Completa tutti i campi. Utilizza il formato corretto per i dati.</h2>

<div class="form-group">
 <label class="control-label col-sm-2" for="desc_mob">Descrizione</label>
<div class="col-sm-4">
<input type="text" class="form-control" size="50" pattern="[a-zA-Z ]*"
title="Fino a 20 caratteri" maxlength="30" name="desc_mob"
id="desc_mob" required/>
</div>
</div>



<div class="form-group">
 <label class="control-label col-sm-2" for="mob_datainizio">Data di inizio</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="mob_datainizio" id="mob_datainizio" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="mob_datafine">Data di fine</label>
<div class="col-sm-4">
<input type="date" class="form-control" name="mob_datafine" id="mob_datafine" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="mob_numacc">Numero accompagnatori</label>
<div class="col-sm-4">
<input type="number" class="form-control" name="mob_numacc" id="mob_numacc" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="mob_numstud">Numero studenti</label>
<div class="col-sm-4">
<input type="number" class="form-control" name="mob_numstud" id="mob_numstud" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="mob_link">Link evento</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="mob_link" id="mob_link" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="mob_numinc">Numero incontro</label>
<div class="col-sm-4">
<input type="number" class="form-control" name="mob_numinc" id="mob_numinc" required>
</div>
</div>

<div class="form-group">
 <label class="control-label col-sm-2" for="mob_note">Note eventuali</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="mob_note" id="mob_note" required>
</div>
</div>


<div class="form-group">
 <label class="control-label col-sm-2" for="mob_anno">Anno scolastico</label>
<div class="col-sm-4">
<div class="radio">
<input type="radio"  name="mob_anno" id="mob_anno"
value="2015/16">2015/16<br /></div>
<div class="radio">
<input type="radio" name="mob_anno" id="mob_anno"
value="2016/17">2016/17<br /></div>
<div class="radio">
<input type="radio" name="mob_anno" id="mob_anno" value="2017/18"
checked >2017/18<br /><br /></div>
</div></div>

<div class="form-group">
<label class="control-label col-sm-2" for="mob_acc">Seleziona il progetto</label>
<div class="col-sm-4">
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
</div></div>
<br>

<div class="form-group">
<label class="control-label col-sm-2" for="mob_acc">Accoglienza in ingresso? </label><br>
<div class="col-sm-4">
 <input name="mob_acc" type="checkbox" value="Si"> Si <br>
 <input name="mob_acc" type="checkbox" value="No"> No <br> 
 </div></div>

<div class="form-group">
<label class="control-label col-sm-2" for="destinazione">Seleziona la destinazione</label>
<div class="col-sm-4">
<select name='destinazione' class="form-control" id='destinazione'>
<?php 
$sql = $database->prepare("SELECT nomeScuola FROM Destinazioni");
$sql->execute();
while ($row = $sql->fetch())
{
	echo "<option value='". $row['nomeScuola'] . "'" . ">" . $row['nomeScuola'] . "</option>";
}
?>
</select>
</div></div>

<div class="form-group">
<input type="submit" value="Clicca per inserire la mobilità" />
<div class="col-sm-4">
</div></div>
</form>
</body>
</html>
<?php
}
?>