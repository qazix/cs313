<?php
   session_start();
   
?>

<html>
   <body>
      <p>Welcome <?php echo $_SESSION['username']; ?></p>
   </body>
</html>