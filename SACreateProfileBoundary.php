<?php
include("SACreateProfileController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="admin.css">

<?php

	$error = false;
	$success = false;

	//if the form has been submitted,
	if (isset($_POST["submit"])){

		//create a new create profile controller object.
		$profile = new CreateProfileController();

		
		//if name is not empty
		if ($_POST["pname"] != NULL){

			//calls the createProfile() function in the controller, returns boolean if successfully added.
			if ($profile->createProfile($_POST["pname"])){
				$success = true;
			}
			else{
				$error = true;
			}

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

			//if profile already exists, output error message.
			if ($error == true){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Error creating new profile.</strong></div>";

			}

			//if new profile is created, output success message and redirect to home.
			if ($success == true){

				echo "<div class='alert alert-success' align='center'><strong>New profile created. Returning home.</strong></div>";
				header("refresh:3;url=Admin.php");

			}
			
		?>

		<form method="post" action="">
		<table>
			<tr>
				<th class="homepage_buttons">Create Profile</th>
			</tr>
			<tr>
				<td class="homepage_buttons"><input type="text" class="text_box" name="pname" placeholder="Profile Name"></td>
			</tr>
			<tr>
				<td class="homepage_buttons"><input type="submit" class="button" name="submit" value="SUBMIT"></td>
			</tr>
		</table>
		</form>

	</div>

</html>
