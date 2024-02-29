<?php
include("LoginController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

	//if $profile is NULL, it triggers error handling. "" counts as NULL also, so i have to use a placeholder value.
	$profile = "placeholder";

	//if the form has been submitted,
	if (isset($_POST["submit"])){

		//create a new login controller object
		$user = new LoginController();

		//call the login() function in the controller, returns the profile
		$profile = $user->login($_POST["username"], $_POST["password"]);

		//sends the user to homepage based on profile
		if ($profile == "Admin"){
			header("Location:Admin.php");
		}
		else if ($profile == "Conference Chair"){
			header("Location:CC.php");
		}
		else if ($profile == "Author"){
			header("Location:Author.php");
		}
		else if ($profile == "Reviewer"){
			header("Location:Reviewer.php");
		}

	}

?>

	<div class="mid">

		<?php
			//if there is no profile found, output error message.
			if ($profile == NULL){

				echo "<div class='alert alert-danger fade in' align='center'>";
				echo "Incorrect username or password.</div>";

			}
		?>

		<!-- Standard form, make sure you name your fields properly so everyone can understand.
		Also, when leaving comments, remember that comments in php and comments in html have different formats -->
		<form method="post" action="">
		<table>

			<tr>
				<td class="homepage_buttons">
					Welcome to Sc(r)um!
				</td>
			</tr>

			<tr>
				<td class="homepage_buttons">
					<input class="text_box" type="text" name="username" placeholder="Username">
				</td>
			</tr>

			<tr>
				<td class="homepage_buttons">
					<input class="text_box" type="password" name="password" placeholder="Password">
				</td>
			</tr>

			<tr>
				<td class = "homepage_buttons">
					<input type="submit" class="button" name="submit" value="Login">
				</td>
			</tr>

		</table>
		</form>

	</div>

</html>
