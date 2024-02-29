<?php
include("ChangePasswordController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

	$success = false;
	$error = false;

	if (isset($_POST["submit"])){

		$control = new ChangePasswordController();

		$current_username = $control->getUsername();
		$current_password = $control->getPassword();

		$old_password = $_POST["old_password"];
		$new_password = $_POST["new_password"];

		if ($new_password == NULL){
			$error = true;
		}
		else if ($old_password != $current_password){
			$error = true;
		}
		else if ($old_password == $new_password){
			$error = true;
		}
		else
		{

			$result = $control->changePassword($current_username, $new_password);

			if ($result == true){
				$success = true;
			}
			else{
				$error = true;
			}

		}
	}

?>

	<p>
		<form method="" action="CC.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>

	<div class="mid">

		<?php

			if ($error == true){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Error changing password.</strong></div>";

			}

			if ($success == true){

				echo "<div class='alert alert-success' align='center'><strong>Password updated. Returning home.</strong></div>";
				header("refresh:3;url=CC.php");

			}

		?>

		<form method="post" action="">
		<table>

			<tr><th class="homepage_buttons">Change Password</th></tr>

			<tr>
				<td class="homepage_buttons">
					<input type="text" class="text_box" name="old_password" placeholder="OLD PASSWORD">
				</td>
			</tr>

			<tr>
				<td class="homepage_buttons">
					<input type="text" class="text_box" name="new_password" placeholder="NEW PASSWORD">
				</td>
			</tr>

			<tr>
				<td class="homepage_buttons">
					<input type="submit" class="button" name="submit" placeholder="SUBMIT">
				</td>
			</tr>

		</table>
		</form>

	</div>

</html>
