<?php
include("SAEditAccountController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

	$control = new  SAEditAccountController();

	$result = $control->getAccountInfo($_SESSION["target_username"]);

	$row = $result->fetch_assoc();

	$profiles = $control->getCurrentProfiles();

	$success = false;
	$error = false;

	if (isset($_POST["submit"])){

		if($control->edit($_POST["username"], $_POST["password"], $_POST["status"], $_POST["name"], $_POST["email"], $_POST["profile"])){
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

				echo "<div class='alert alert-danger fade in' align='center'><strong>Error updating account.</strong></div>";

			}

			if ($success == true){

				echo "<div class='alert alert-success' align='center'><strong>Account updated. Returning home.</strong></div>";
				header("refresh:3;url=Admin.php");

			}

		?>

		<form method="post" action="">
		<table>

			<tr><th class="homepage_buttons">Edit Account</th></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="username" value="<?php echo $row["username"]; ?>" readonly="true">
			</td></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="password" value="<?php echo $row["password"]; ?>">
			</td></tr>

			<tr><td class="homepage_buttons">
				<select name="status" class="dropdown">
					<option value="<?php echo $row["account_status"]; ?>" selected hidden><?php echo $row["account_status"]; ?></option>
					<option value="Active" class="dropdown">Active</option>
					<option value="Disabled" class="dropdown">Disabled</option>
				</select>
			</td></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="name" value="<?php echo $row["name"]?>">
			</td></tr>

			<tr><td class="homepage_buttons">
				<input type="text" class="text_box" name="email" value="<?php echo $row["email"]?>">
			</td></tr>

			<tr><td class="homepage_buttons">
				<select name="profile" class="dropdown">
					<option value="<?php echo $row["pname"]; ?>" selected hidden><?php echo $row["pname"]; ?></option>
					<?php while ($profileRow = $profiles->fetch_assoc()){ ?>

						<option value="<?php echo $profileRow['pname']; ?>"><?php echo $profileRow['pname']; ?></option>

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
