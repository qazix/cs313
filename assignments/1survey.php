<?php
   $timeLimit = 60 * 60 * 24 * 30;
   
   if(isset($_SESSION['responded']) && $SESSION['responded'])
   {  
      setcookie('responded', true, $timeLimit);
   }
   
   if(isset($_COOKIE['responded']))
   {
      $page = "phphelper/results.php";
   }
   else
   {
      session_start();    
      $_SESSION['responded'] = false;
      $page = "phphelper/survey.php";
   }
?>

<!DOCTYPE html>
<html>
   <?php echo $page;?>
</html>