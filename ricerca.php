<?php
session_start();
require 'connect.php';
if (!$_SESSION["user_data"]) {
        header("Location: notfound.php");
    }
{
?>
<!DOCTYPE html>
<html>
<head>
<title> Ricerca dati </title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Studenti</h1>


<?php 
$sql = $database->prepare("SELECT * FROM Studenti");
$sql->execute();

echo "<table border='1'>
<tr>
<th>Cognome</th>
<th>Nome</th>
<th>Data di nascita</th>
<th>Sesso</th>
<th>Residenza</th>
<th>Email</th>
<th>Telefono</th>
<th>Certificazione</th>
</tr>";

while ($row = $sql->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>" . $row['cognome'] . "</td>";
	echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['dataNascita'] . "</td>";
    echo "<td>" . $row['sesso'] . "</td>";
    echo "<td>" . $row['residenza'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['telefono'] . "</td>";
    echo "<td>" . $row['certificazione'] . "</td>";
	echo "</tr>";
}
echo "</table>";

?>

<h1>Progetti</h1>

<?php 
$sql = $database->prepare("SELECT * FROM Progetti");
$sql->execute();

echo "<table border='1'>
<tr>
<th>Titolo progetto</th>
<th>Descrizione progetto</th>
<th>Destinatari</th>
<th>Referente</th>
<th>Anno scolastico inizio</th>
<th>Anno scolastico fine</th>
<th>Tipologia</th>
<th>Concluso</th>
</tr>";

while ($row = $sql->fetch(PDO::FETCH_ASSOC))
{
	echo "<tr>";
	echo "<td>" . $row['titoloProgetto'] . "</td>";
	echo "<td>" . $row['descrizioneProgetto'] . "</td>";
    echo "<td>" . $row['destinatari'] . "</td>";
    echo "<td>" . $row['Referente'] . "</td>";
    echo "<td>" . $row['AnnoScolasticoInizio'] . "</td>";
    echo "<td>" . $row['AnnoScolasticoFine'] . "</td>";
    echo "<td>" . $row['Tipologia'] . "</td>";
    echo "<td>" . $row['concluso'] . "</td>";
	echo "</tr>";
}
echo "</table>";

?>

</body>
</html>
<?php
}
?>