<!DOCTYPE html>
<html lang = 'en'>
	<head>
		<?php include('dependencies.php');?>
	</head>
	<body>
		<?php include('navbar.php');?>
		<?php
			include ('database.php');
			if (isset($_GET["page"])) {
				$page_name = $_GET["page"];
				$page = $sql->query("SELECT id FROM pages WHERE url='$page_name'")->fetch_assoc();
				if (in_array($page, ["index", "home"])) {
					header("Location: /");
				} else if (!empty($page)) {
					$id = $page["id"];
					$page_details = $sql->query("SELECT type, content FROM pages WHERE id='$id'")->fetch_assoc()["content"];
					$type = $page_details["type"];
					$content = $page_details["content"];
					if ($type == 0) {
						echo $content;
					} else if ($type == 1) {
						if (file_exists($content . ".php")) {
							include($page . ".php");
						} else {
							header("HTTP/1.1 404 Not Found");
							echo "404";
						}
					}
				} else {
					header("HTTP/1.1 404 Not Found");
					echo "404";
				}
			} else {
				// include("slideshow.php");
				echo $sql->query("SELECT content FROM pages WHERE url='home'")->fetch_assoc()["content"];
			}
		?>
	</body>
</html>