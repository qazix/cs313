<?php
   $timeLimit = 60 * 60 * 24 * 30;
   
   session_start();   
   
   if((isset($_SESSION['responded']) && $_SESSION['responded']) ||
      ($_POST['response'] == "true"))
   {  
      setcookie('responded', true, time() + $timeLimit);
      $_SESSION['responded'] = true;
   }
   
   if($_SESSION['responded'] || 
      $_POST['response'] == "true" ||
      (isset($_COOKIE) && $_COOKIE['responded'] == true))
   {
      $_SESSION['responded'] = true;
      $page = "phphelper/results.php";
   }
   else
   { 
      $_SESSION['responded'] = false;
      $page = "phphelper/survey.php";
   }
   
   $sesVal = $_SESSION['responded'];
   $posVal = $_POST['response'];
?>

<!DOCTYPE html>
<html>
   <?php echo file_get_contents($page);
         echo "session" . $sesVal;
         echo "post" . $posVal;
         ?>
</html>