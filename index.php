<?php
?>

<html>
<head>
	<title> Sito Erasmus - Homepage </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<h1> Accesso al sito </h1>
<h2> Possono accedere al sito solo utenti registrati.. </h2>
<form action="login.php" method="post">
<p> Username: 
<input type="text" name="username" id="usernameAcc">
<p> Password: 
<input type="password" name="password" id="passwordAcc">
<input type="submit" value="Entra">
</form>
	
    
</body>
</html>