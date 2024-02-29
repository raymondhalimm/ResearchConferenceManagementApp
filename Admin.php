<?php
include("LogoutController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

	//If logout button is clicked
	if (isset($_POST["logout"]))
	{
		//Construct logout Controller
		new LogoutController();
		
 	}

?>

	<header style = "text-align: center; line-height: 0">
		<h1>SYSTEM ADMIN</h1>
	</header>

	<!-- SysAdmin functions -->
      
	<table class = "mid" cellspacing="0">

		<tr>
			<td class = "homepage_buttons">
			<!-- View account button -->
			<form method="post" action="SAViewAccountBoundary.php">
			<button class="button" name="view_accounts">VIEW ALL ACCOUNTS</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
			<!-- Create account button -->
			<form method="post" action="SACreateAccountBoundary.php">
			<button class="button" name="create_account">CREATE ACCOUNT</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
			<!-- View profiles button -->
			<form method="post" action="SAViewUserProfileBoundary.php">
			<button class="button" name="view_user_profiles">VIEW USER PROFILES</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
				<!-- Create profile button -->
 				<form method="post" action="SACreateProfileBoundary.php">
 				    <button class="button" name="create_profile">CREATE PROFILE</button>
 				</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
			<!-- Change password button -->
			<form method="post" action="SAChangePasswordBoundary.php">
			<button class="button" name="change_password">CHANGE PASSWORD</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "logout_button">
			<!-- logout button -->
			<form method="post" action="">
			<button class="button" name="logout">LOGOUT</button>
			</form>
			</td>
		</tr>

	 </table>

</html>
