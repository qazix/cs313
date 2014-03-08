<?php
   
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Sign up</title>
      <script src="inClass3.js" type="text/javascript"></script>
   </head>
   <body>
      <form action="addUser.php" method="POST" onsubmit="return validate()">
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
               <td>Repeat Password</td>
               <td><input id="rpass" name="rpass" type="password"></input>
            </tr>
            <tr>
               <td colspan="2" align="right"><button>Create Account</button></td>
            </tr>
         </table>
      </form>
   </body>
</html>