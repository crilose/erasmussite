<?php
require 'connect.php';

//Prima prendiamo tutti gli attributi passati dal form col POST
$nomestud = $_POST['stud_nome'];
$cognomestud = $_POST['stud_cognome'];
$datanascitastud = $_POST['stud_data'];
$sessostud = $_POST['stud_sesso'];
$residenzastud = $_POST['stud_resid'];
$emailstud = $_POST['stud_email'];
$telefonostud = $_POST['stud_telefono'];
$certificazione = $_POST['stud_cert'];
$progetto = $_POST['progetto'];
$descmobilita = $_POST['mobilita'];
$nota = $_POST['nota'];
$dataiscr = $_POST['data_iscr'];
$numospiti = $_POST['num_ospiti'];
$sessospiti = $_POST['pref_sesso'];


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

//Verifichiamo se è disponibile a mobilità

if($_POST['stud_dispmob']=="Si")
{
	$dispmob = 1;
}
else
{
	$dispmob = 0;
}

//La query di inserimento vero e proprio
$sql = $database->prepare("INSERT INTO Studenti (cognome, nome,
dataNascita, sesso, residenza, email, telefono, certificazione)
VALUES (?,?,?,?,?,?,?,?)");
$sql->execute(array($cognomestud,$nomestud,$datanascitastud,
$sessostud,$residenzastud,$emailstud,$telefonostud,$certificazione));

//Selezioniamo il codice dell'accompagnatore appena inserito sulla base del suo nome
$sql = $database->prepare("SELECT codStudente FROM Studenti WHERE email = '$emailstud'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codStud = $r['codStudente'];


//Inseriamo i due codici ottenuti nella tabella di associazione tra studente e progetto
$sql = $database->prepare("INSERT INTO StudentiProgetti (codStudente, codProgetto, dataDomanda, dispOspitare,
sessoOspite, dispMobilita, note)
VALUES (?,?,?,?,?,?,?)");
$sql->execute(array($codStud,$codprog,$dataiscr,$numospiti, $sessospiti,$dispmob, $nota ));

//Inseriamo i due codici ottenuti nella tabella di associazione tra mobilità e progetto
$sql = $database->prepare("INSERT INTO StudentiMobilita (codStudente, codMobilita, numOspiti, note)
VALUES (?,?,?)");
$sql->execute(array($codStud,$codmob,$numospiti,$nota));

header("Location: complete.php");



?>