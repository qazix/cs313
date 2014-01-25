<?php
   $timeLimit = 60 * 60 * 24 * 30;
   
   if((isset($_SESSION['responded']) && $_SESSION['responded']) ||
      ($_POST['response']) ||
      (isset($_COOKIE['responded']) && $_COOKIE['responded']))
   {  
      setcookie('responded', true, $timeLimit);
      $_SESSION['responded'] = true;
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
   <?php echo file_get_contents($page);?>
</html>