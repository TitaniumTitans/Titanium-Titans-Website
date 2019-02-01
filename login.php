<div class = 'container'>
	<div class = 'jumbotron'>
		<h2>Login</h2>
		<form>
			<div class = 'form-group'>
				<label for = 'email'>Email Address</label>
				<input type = 'email' class = 'form-control' id = 'email' name = 'email' placeholder = 'Enter Email Address'>
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
	if (isset($_GET['email']) && isset($_GET['password'])) {
		$email = mysqli_real_escape_string($sql, $_GET['email']);
		$password = mysqli_real_escape_string($sql, $_GET['password']);
		$result = $sql->query("SELECT password_hash, password_salt FROM users WHERE email='$email'")->fetch_assoc();
		$password_salt = $result["password_salt"];
		$password_hash = $result["password_hash"];
		if (hash('sha512', hex2bin($password_salt) . $password) == $password_hash) {
			echo "<script>location.href = '/success'</script>";
		} else {
			echo "<script>location.href = '/error'</script>";
		}
	}
?>