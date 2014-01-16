<!doctype html>
<html>
	<head>
		<title>PHP test</title>
	</head>
	<body>
		<div>
		<?php
			$x = 1;
			while($x <= 10)
			{
				echo "<div><p>This is div $x </p></div>";
				$x++;
			}
		?>
		</div>
	</body>
</html>