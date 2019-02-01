<div class = 'container'>
	<div class = 'jumbotron'>
		<h2>Register</h2>
		<form method = 'get'>
			<div class = 'form-group'>
				<label for = 'email'>Email Address</label>
				<input type = 'email' class = 'form-control' id = 'email' name = 'email' placeholder = 'Enter Email Address'>
			</div>
			<div class = 'form-group'>
				<label for = 'username'>Username</label>
				<input type = 'text' class = 'form-control' id = 'username' name = 'username' placeholder = 'Enter Username'>
			</div>
			<div class = 'form-group'>
				<label for = 'password'>Password</label>
				<input type = 'password' class = 'form-control' id = 'password' name = 'password' placeholder = 'Enter Password'>
			</div>
			<button type = 'submit' class = 'btn btn-primary'>Submit</button>
		</form>
	</div>
</div>
<?php
	include('database.php');
	if (isset($_GET['email']) && isset($_GET['username']) && isset($_GET['password'])) {
		$email = mysqli_real_escape_string($sql, $_GET['email']);
		$username = mysqli_real_escape_string($sql, $_GET['username']);
		$password = mysqli_real_escape_string($sql, $_GET['password']);
		$password_salt = bin2hex(random_bytes(64));
		$password_hash = hash('sha512', hex2bin($password_salt) . $password);
		$reset_token = bin2hex(random_bytes(64));
		$query = "INSERT INTO USERS (email, username, password_salt, password_hash, reset_token) VALUES ('$email', '$username', '$password_salt', '$password_hash', '$reset_token')";
		if ($sql->query($query)) {
			echo "<script>location.href = '/success'</script>";
		} else {
			echo "<script>location.href = '/error'</script>";
		}
	}
?>