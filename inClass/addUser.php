<?php
   $DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
   $DBUser   = 'DFUser';
   $DBPass   = 'DF_PASS';
   $DBName   = 'drinkingFountains';
   $mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
   
   $username = $_POST['username'];
   $password = md5($_POST['pass']);
   
   $mysqli->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
   
   header('location: signIn.php'); 
?>