<?php
session_start();
if (!$_SESSION["user_data"]) {
        header("Location: notfound.php");
    }
{
?>
<!DOCTYPE html>
<head>
<title> Homepage </title>
<script src="get_as.js">//AJAX
</script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Pagina principale</h1>
<a href="addprogetto.php" class="btn btn-default btn-lg"><p>Aggiungi progetto </p> </a>
<a href="adddestinazione.php" class="btn btn-default btn-lg"><p>Aggiungi destinazione </p> </a>
<a href="addaccompagnatore.php" class="btn btn-default btn-lg"><p>Aggiungi accompagnatore </p> </a>
<a href="addmobilita.php" class="btn btn-default btn-lg"><p>Aggiungi mobilita' </p> </a>
<a href="addstudente.php" class="btn btn-default btn-lg"><p>Aggiungi studente </p> </a>
<a href="ricerca.php" class="btn btn-default btn-lg"><p>Ricerca informazioni </p></a>
</body>
</html>
<?php
}
?>