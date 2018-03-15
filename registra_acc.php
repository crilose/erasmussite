<?php
require 'connect.php';

//Prima prendiamo tutti gli attributi passati dal form col POST
$nomeacc = $_POST['acc_nome'];
$cognomeacc = $_POST['acc_cognome'];
$datanascitaacc = $_POST['acc_datanascita'];
$sessoacc = $_POST['acc_sesso'];
$residenzaacc = $_POST['acc_residenza'];
$emailacc = $_POST['acc_email'];
$telefonoacc = $_POST['acc_telefono'];
$certificazione = $_POST['acc_cert'];
$qualifica = $_POST['acc_qualifica'];
$disciplina = $_POST['acc_materia'];
$progetto = $_POST['progetto'];
$descmobilita = $_POST['mobilita'];
$nota = $_POST['nota'];


//La prima query seleziona il codice del progetto
$sql = $database->prepare("SELECT codProgetto FROM Progetti WHERE titoloProgetto = '$progetto'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codprog = $r['codProgetto'];

//La seconda query seleziona il codice della mobilità
$sql = $database->prepare("SELECT codMobilita FROM Mobilita WHERE descrizione = '$descmobilita'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codmob = $r['codMobilita'];

//Verifichiamo se il progetto è concluso con la spunta
if($_POST['acc_coord']=="Si")
{
	$coord = 1;
    echo "E' coordinatore";
}
else
{
	$coord = 0;
}

if($_POST['acc_dispmob']=="Si")
{
	$dispmob = 1;
    echo "E' coordinatore";
}
else
{
	$dispmob = 0;
}

//La query di inserimento vero e proprio
$sql = $database->prepare("INSERT INTO Accompagnatori (nomeDocente, cognomeDocente,
dataNascitaDocente, sessoDocente, residenzaDocente, emailDocente, telefonoDocente, certificazione, qualifica, disciplina)
VALUES (?,?,?,?,?,?,?,?,?,?)");
$sql->execute(array($nomeacc,$cognomeacc,$datanascitaacc,
$sessoacc,$residenzaacc,$emailacc,$telefonoacc,$certificazione,$qualifica,$disciplina));

//Selezioniamo il codice dell'accompagnatore appena inserito sulla base del suo nome
$sql = $database->prepare("SELECT codAccompagnatore FROM Accompagnatori WHERE emailDocente = '$emailacc'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codAcc = $r['codAccompagnatore'];


//Inseriamo i due codici ottenuti nella tabella di associazione tra accompagnatore e progetto
$sql = $database->prepare("INSERT INTO AccompagnatoriProgetto (codAccompagnatore, codProgetto, coordinatoreProgetto, dispMobilita)
VALUES (?,?,?,?)");
$sql->execute(array($codAcc,$codprog,$coord,$dispmob));

//Inseriamo i due codici ottenuti nella tabella di associazione tra mobilità e progetto
$sql = $database->prepare("INSERT INTO AccompagnatoreMobilita (codAccompagnatore, codMobilita, note)
VALUES (?,?,?)");
$sql->execute(array($codAcc,$codmob,$nota));

header("Location: complete.php");



?>