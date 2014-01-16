<!doctype html>
<html>
	<head>
		<title>PHP test</title>
	</head>
	<body>
		<div>
		<?php
			$list["friend"] = "Bob";
			$list["enemy"] = "Fran";
			$list[1] = "me";
			$list[0] = "you";
			
			foreach ($list as $key => $val)
			{
				echo "<div id = $key><p>This is div $val </p></div>";
			}
		?>
		</div>
	</body>
</html>