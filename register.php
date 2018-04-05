<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");
	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Slotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js">
	</script>
</head>
<body>
	<?php
	if(isset($_POST['registerButton'])){
		echo '<script>
					$(document).ready(function() {

						$("#loginForm").hide();
				    $("#registerForm").show();
					});
					</script>';
	}
	else {
		echo '<script>
					$(document).ready(function() {
						$("#loginForm").show();
						$("#registerForm").hide();
					});
					</script>';
	}
	 ?>

	<div id="background">
		<div id="loginContainer">
				<div id="inputContainer">
					<form id="loginForm" action="register.php" method="POST">
						<h2>Login to your Account</h2>
						<p>
							<?php echo $account->getError(Constants::$loginFailed); ?>
							<label for="LoginUsername">Username</label>
							<input id="LoginUsername" name="LoginUsername" type="text" placeholder="e.g. McMurphy" value="<?php getInputValue('LoginUsername')?>"required>
						</p>
						<p>
							<label for="LoginPassword">Password</label>
							<input id="LoginPassword" name="LoginPassword" type="password" placeholder="your password" required>
						</p>
						<button type="submit" name="LoginButton">Log In</button>
						<div class="hasAccountText">
							<span id="hideLogin">Don't have an account yet?Sign Up here.</span>
						</div>
					</form>

					<form id="registerForm" action="register.php" method="POST">
						<h2>Create new free account</h2>
						<p>
							<?php echo $account->getError(Constants::$userNameCharacters); ?>
							<?php echo $account->getError(Constants::$userNameTaken); ?>
							<label for="username">Username</label>
							<input id="username" name="username" type="text" placeholder="e.g. McMurphy" value="<?php getInputValue('username') ?>" required>
						</p>
							<p>
								<?php echo $account->getError(Constants::$firstNameCharacters); ?>
							<label for="firstname">First Name</label>
							<input id="firstname" name="firstname" type="text" placeholder="e.g. McMurphy" placeholder="your firstname" value="<?php getInputValue('firstname') ?>"required>
						</p>
							<p>
								<?php echo $account->getError(Constants::$lastNameCharacters); ?>
							<label for="lastname">Last Name</label>
							<input id="lastname" name="lastname" type="text" placeholder="e.g. McMurphy" placeholder="your lastname" value="<?php getInputValue('lastname') ?>" required>
						</p>
							<p>
								<?php echo $account->getError(Constants::$emailDoNotMatch); ?>
								<?php echo $account->getError(Constants::$emailInvalid); ?>
								<?php echo $account->getError(Constants::$emailTaken); ?>
							<label for="email">Email</label>
							<input id="email" name="email" type="email" placeholder="e.g. McMurphy" placeholder="your email"  value="<?php getInputValue('email') ?>"required>
						</p>
							<p>

							<label for="email2">Confirm Email</label>
							<input id="email2" name="email2" type="text" placeholder="e.g. McMurphy" placeholder="your email" required>
						</p>
						<p>
							<?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
							<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
							<?php echo $account->getError(Constants::$passwordCharacters); ?>
							<label for="password">Password</label>
							<input id="password" name="password" type="password" placeholder="your password" required>
						</p>
							<p>
							<label for="password2">Confirm Password</label>
							<input id="password2" name="password2" type="password" placeholder="e.g. McMurphy" placeholder="your password" required>
						</p>
						<button type="submit" name="registerButton">SIGN UP</button>
						<div class="hasAccountText">
							<span id="hideRegister">Already have an Account? Log In here.</span>

					</form>
				</div>

			</div>
			<div id="LoginText">
				<h1>Get Great Music , Right Now</h1>
				<h2>Listen to loads of songs for free.</h2>
				<ul>
					<li>Discover Music you'll fall in love with </li>
					<li>Create Your Own Playlist </li>
					<li>Follow your Favourite Artists</li>
				</ul>
			</div>
		</div>

</body>
</html>
