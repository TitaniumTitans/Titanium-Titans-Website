<!DOCTYPE html>
<html lang = 'en'>
	<head>
		<?php include('dependencies.php');?>
	</head>
	<body>
		<?php include('navbar.php');?>
		<?php
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
				if (in_array($page, ["index", "home"])) {
					header("Location: /");
				}
				if (file_exists($page . ".php")) {
					include($page . ".php");
				} else {
					header("HTTP/1.1 404 Not Found");
					echo "404";
				}
			} else {
				// include("slideshow.php");
				include("home.php");
			}
		?>
	</body>
</html>