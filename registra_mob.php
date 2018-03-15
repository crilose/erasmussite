<?php
require 'connect.php';

//Prima prendiamo tutti gli attributi passati dal form col POST
$descmob = $_POST['desc_mob'];
$datainizio= $_POST['mob_datainizio'];
$datafine= $_POST['mob_datafine'];
$nacc = $_POST['mob_numacc'];
$nstud = $_POST['mob_numstud'];
$linkevento = $_POST['mob_link'];
$numinc = $_POST['mob_numinc'];
$note = $_POST['mob_note'];
$annoscolastico = $_POST['mob_anno'];
$progetto = $_POST['progetto'];
$destinazione = $_POST['destinazione'];


//La prima query seleziona il codice del progetto
$sql = $database->prepare("SELECT codProgetto FROM Progetti WHERE titoloProgetto = '$progetto'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codprog = $r['codProgetto'];

//La seconda query seleziona il codice della destinazione
$sql = $database->prepare("SELECT codDestinazione FROM Destinazioni WHERE nomeScuola = '$destinazione'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$coddest = $r['codDestinazione'];

//Verifichiamo se la mobilità è in ingresso
if($_POST['mob_acc']=="Si")
{
	$ingresso = 1;
}
else
{
	$ingresso = 0;
}

//La query di inserimento vero e proprio
$sql = $database->prepare("INSERT INTO Mobilita (codProgetto, codDestinazione,
descrizione, inAccoglienza, annoScolastico, dataInizio, dataFine, numAccompagnatori, numStudenti, link, numIncontro, note)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
$sql->execute(array($codprog,$coddest,$descmob,
$ingresso,$annoscolastico,$datainizio,$datafine,$nacc,$nstud,$linkevento,$numinc,$note));

header("Location: complete.php");



?>