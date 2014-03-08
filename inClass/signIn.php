<?php
   session_start();
   $DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
   $DBUser   = 'DFUser';
   $DBPass   = 'DF_PASS';
   $DBName   = 'drinkingFountains';
   $mysqli = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
   
   $username = $_POST['username'];
   $password = md5($_POST['pass']);
   
   $results = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
   
   if($results->num_rows > 0)
   {
      $failed = false;
      $row = $results->fetch_assoc();
   
      if ($row['password'] == $password)
      {
         $_SESSION['username'] = $username;
         header('location: homepage.php'); 
      }
      else
      {
         $failed = true;
      }
   }
   else
   {  
      $failed = true;
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Sign In</title>
      <script src="inClass3.js" type="text/javascript"></script>
   </head>
   <body>
      <?php 
         if($failed) 
            echo "<p>Failed login $results->num_rows</p>"; 
      ?>
      <form action="signIn.php" method="POST" onsubmit="return authenticate()">
         <table>
            <tr>
               <td>UserName</td>
               <td><input id="username" name="username" type="text"></input>
            </tr>
            <tr>
               <td>Password</td>
               <td><input id="pass" name="pass" type="password"></input>
            </tr>
            <tr>
               <td><a href="signUp.php"><input type="button" value="Sign Up"/>
               <td><button>Sign In</button></td>
            </tr>
         </table>
      </form>
   </body>
</html>