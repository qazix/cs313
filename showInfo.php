<html>
	<body>
		<h1>Hello <?php echo $_POST["name"]; ?></h1>
		<p>Email:   <a href="mailto:<?php echo $_POST["email"]; ?>">
						<?php echo $_POST["email"]; ?>
					</a></p>
		<p>Major: <?php echo $_POST["major"]; ?></p>
		<?php 
			$places = $_POST['places'];
			if(empty($places))
			{
				echo ("<p>You have no life</p>");
			}
			else
			{
				$numPlaces = count($places);
				echo ("<p>Places you've been:<br/>");
				for ($i = 0; $i < $numPlaces; $i++)
				{
					echo ("$places[$i]<br/>");
				}
				echo "</p>";
			}
		?>
		<p><?php echo $_POST["comment"]; ?></p>
	</body>
</html>