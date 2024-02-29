<?php
include("SACreateAccountController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

	$control = new SACreateAccountController();

	$result = $control->getCurrentProfiles();

	$success = false;
	$error = false;

	if (isset($_POST["submit"])){

		if($control->create($_POST["username"], $_POST["password"], $_POST["status"], $_POST["name"], $_POST["email"], $_POST["profile"])){
			$success = true;
		}
		else{
			$error = true;
		}

	}

?>

	<p>
		<form method="" action="Admin.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>

	<div class="mid">

		<?php

			if ($error == true){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Error creating new account.</strong></div>";

			}

			if ($success == true){

				echo "<div class='alert alert-success' align='center'><strong>New account created. Returning home.</strong></div>";
				header("refresh:3;url=Admin.php");

			}

		?>

		<form method="post" action="">
		<table>

			<tr><th class="homepage_buttons">Create New Account</th></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="username" placeholder="Username">
			</td></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="password" placeholder="Password">
			</td></tr>

			<tr><td class="homepage_buttons">
				<select name="status" class="dropdown">
					<option value="" disabled selected hidden>Account Status</option>
					<option value="Active" class="dropdown">Active</option>
					<option value="Disabled" class="dropdown">Disabled</option>
				</select>
			</td></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="name" placeholder="Name">
			</td></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="email" placeholder="E-mail Address">
			</td></tr>

			<tr><td class="homepage_buttons">
				<select name="profile" class="dropdown">
					<option value='' disabled selected hidden>Profile</option>
					<?php while ($row = $result->fetch_assoc()){ ?>

						<option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?></option>

					<?php } ?>
				</select>
			</td></tr>

			<tr><td class="homepage_buttons">
				<button type="submit" class="button" name="submit">SUBMIT</button>
			</td></tr>

		</table>
		</form>

	</div>



</html>
