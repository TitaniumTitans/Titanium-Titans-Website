<?php
	$sql = mysqli_connect("localhost", "root", "", "main");
	if ($sql->connect_error) {
		die("Connection failed: " . $sql->connect_error);
	}
?>