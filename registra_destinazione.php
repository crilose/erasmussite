<?php
require 'connect.php';

$nomedest = $_POST['dest_nome'];
$descdest = $_POST['dest_desc'];
$indirizzodest = $_POST['dest_indirizzo'];
$nazionedest = $_POST['dest_nazione'];

$sql = $database->prepare("INSERT INTO Destinazioni (nomeScuola, descrizioneScuola,
indirizzoScuola, nazione)
VALUES (?,?,?,?)");
$sql->execute(array($nomedest,$descdest,$indirizzodest,$nazionedest));

header("Location: complete.php");





?>