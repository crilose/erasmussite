<?php
require 'connect.php';

//Prima prendiamo tutti gli attributi passati dal form col POST
$nomeprogetto = $_POST['progetto_name'];
$descrizioneprogetto = $_POST['progetto_desc'];
$destinatariprogetto = $_POST['progetto_dest'];
$referenteprogetto = $_POST['progetto_ref'];
$tipologiaprogetto = $_POST['progetto_tipologia'];
$asinizio = $_POST['asinizio'];
$asfine = $_POST['asfine'];
$concluso = 0;

//Compresa la destinazione del progetto
$destinazioneprogetto = $_POST['destinazione'];

//La prima query seleziona il codice di destinazione della destinazione corrispondente al nome inserito
$sql = $database->prepare("SELECT codDestinazione FROM Destinazioni WHERE nomeScuola = '$destinazioneprogetto'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codDest = $r['codDestinazione'];

//Verifichiamo se il progetto è concluso con la spunta
if($_POST['progetto_concluso']!=null)
{
	$concluso = 1;
    echo "E' concluso";
}

//La query di inserimento vero e proprio
$sql = $database->prepare("INSERT INTO Progetti (titoloProgetto, descrizioneProgetto,
destinatari, Referente, AnnoScolasticoInizio, AnnoScolasticoFine, Tipologia, concluso)
VALUES (?,?,?,?,?,?,?,?)");
$sql->execute(array($nomeprogetto,$descrizioneprogetto,$destinatariprogetto,$referenteprogetto,$asinizio,$asfine,$tipologiaprogetto,$concluso));

//Selezioniamo il codice del progetto appena inserito sulla base del suo nome
$sql = $database->prepare("SELECT codProgetto FROM Progetti WHERE titoloProgetto = '$nomeprogetto'");
$sql->execute();
$r = $sql->fetch(PDO::FETCH_ASSOC);
$codProg = $r['codProgetto'];


//Inseriamo i due codici ottenuti nella tabella di associazione tra progetto e destinazione
$sql = $database->prepare("INSERT INTO ProgettiDestinazioni (codProgetto, codDestinazione)
VALUES (?,?)");
$sql->execute(array($codProg,$codDest));

header("Location: complete.php");



?>