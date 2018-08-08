<?php 
ob_start();
session_start();

if (isset($_SESSION['username'])) {
	header("location:../index.php?page_layout=users");
}

include_once('../configuration/connect.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href='../assets/css/login.css'>
</head>
<body>
	<?php 
	if (isset($_POST['ok'])) {
		$errors = []; 
		if (empty($_POST['username'])) {
			$errors['username'] = "Username can't be blank";
		} else {
			$username = $_POST['username'];
		}
		if (empty($_POST['password'])) {
			$errors['password'] = "Password can't be blank";
		} else {
			$password = $_POST['password'];
		}

		if (empty($errors)) {
			$sql = "SELECT id FROM users WHERE username='".$username."' AND password = '".$password."'";
			$query = mysqli_query($conn, $sql);
			$totalRows = mysqli_num_rows($query);
			$rows = mysqli_fetch_array($query);
			if ($totalRows <= 0) {
				$errors['login'] = "Wrong username or password";
			} else {
				$_SESSION['username'] = $username;
				header("location:../index.php?page_layout=users");
			}

		}
	}
	?>
	<form action="" method="post">

		<div id="login-box">
			<p class="login-title">
				Login system
			</p>

			<!-- Errors -->
			<p>
				<?php 
				if (!empty($errors)) {
				?>
					<div class="login-alert">
						<ul>
							<?php foreach ($errors as $error) { ?>
								<li class="" style="margin-left: 10px; list-style: none;">&#8226; <?php echo $error; ?></li>
							<?php } ?>
						</ul>
					</div>
				<?php 
				}
				?>
			</p>

			<p class="login-input">
				<input type="text" name="username" placeholder="Username">
			</p>	
			<p class="login-input">
				<input type="password" name="password" placeholder="Password">
			</p>
			<p class="login-input">
				<button class="bg-login" type="submit" name="ok">Login</button>
			</p>
			<p class="login-text">&copy; Copyright by Vitasker</p>
		</div>
	</form>


	<?php 
	mysqli_close($conn);
	?>
</body>
</html>