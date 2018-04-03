<?php
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account(); 
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
</head>
<body>
	<div id="inputContainer">
		<form id="loginForm" action="register.php" method="POST">
			<h2>Login to your Account</h2>
			<p>
				
				<label for="LoginUsername">Username</label>
				<input id="LoginUsername" name="LoginUsername" type="text" placeholder="e.g. McMurphy" required>
			</p>
			<p>
				<label for="LoginPassword">Password</label>
				<input id="LoginPassword" name="LoginPassword" type="password " placeholder="your password" required>
			</p>
			<button type="submit" name="LoginButton">Log In</button>
			
		</form>
		
		<form id="registerForm" action="register.php" method="POST">
			<h2>Create new free account</h2>
			<p>
				<?php echo $account->getError(Constants::$userNameCharacters); ?>
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
			<button type="submit" name="registerButton">Log In</button>
			
		</form>
	</div>


</body>
</html> 