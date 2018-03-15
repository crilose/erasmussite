<?php

require 'connect.php';
$username = $_POST["username"];
$password = $_POST["password"];

$sql = $database->prepare("SELECT Username,Password FROM registrati");
$sql->execute();

while ($r = $sql->fetch(PDO::FETCH_ASSOC)) {
	if($r['Username'] == $username && $r['Password'] == $password)
    {
    	session_start();
    	echo "Corrispondenza";
        $_SESSION["user_data"] = $username;
    	header("Location: home.php");
        
    }
    else
    {
    	header("Location: notfound.php");
    }
 }




?>