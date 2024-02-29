<?php
include("LogoutController.php");
session_start();
?>

<html>

<!-- Style sheets-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

    //if the logout button is clicked
    if (isset($_POST["logout"])){

        //construct a new LogoutController object
        new LogoutController();

    }

?>

	<header style = "text-align: center; line-height: 0">
		<h1>REVIEWER</h1>
	</header>

	<table class = "mid" cellspacing="0">

		<tr>
			<td class = "homepage_buttons">
			<form method="" action="ReviewerViewBidBoundary.php">
			<button class="button">BID FOR PAPER</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
			<form method="" action="ReviewerViewAssignedPaperBoundary.php">
			<button class="button">VIEW ASSIGNED PAPER</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
			<form method="" action="SetMaxWorkloadBoundary.php">
			<button class="button">SET MAX ASSIGNED PAPER</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class = "homepage_buttons">
			<form method="" action="ReviewerChangePasswordBoundary.php">
			<button class="button">CHANGE PASSWORD</button>
			</form>
			</td>
		</tr>

		<tr>
			<td class="logout_button">
			<form method="post" action="">
			<button class="button" name="logout">LOGOUT</button>
			</form>
			</td>
		</tr>

	</table>

</html>
