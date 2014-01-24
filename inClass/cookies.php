<?php 
	$visits = 1;
	
	if (isset($_COOKIE["visits"]))
	{
		$visits = $_COOKIE["visits"] + 1;
	}
	
	setcookie("visits", $visits, time() + 600);
?>

<!DOCTYPE html>
<html>
<body>
	<p>You have visited <?php echo $visits ?> times in the past 10 minutes</p>
</body>
</html>