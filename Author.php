<?php
include("LogoutController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Author.css">

<?php

    //if the logout button is clicked
    if (isset($_POST["logout"])){

        //construct a new LogoutController object
        new LogoutController();
        
    }

?>


    <header style = "text-align: center; line-height: 0">
		<h1>AUTHOR</h1>
	</header>

    <table class = "mid" cellspacing="0">

        <tr>
			<td class = "homepage_buttons">
			<form method="" action="AuthorAddPaperBoundary.php">
			<button class="button">ADD SUBMISSION</button>
			</form>
			</td>
		</tr>

        <tr>
			<td class = "homepage_buttons">
			<form method="" action="AuthorViewPaperBoundary.php">
			<button class="button">VIEW SUBMISSION</button>
			</form>
			</td>
		</tr>

        <tr>
			<td class = "homepage_buttons">
			<form method="" action="AuthorChangePasswordBoundary.php">
			<button class="button">CHANGE PASSWORD</button>
			</form>
			</td>
		</tr>

        <tr>
            <td class = "logout_button">
            <form method="post" action="">
            <a href=""><button class="button" name="logout">LOGOUT</button> </a>
            </form>
            </td>
        </tr>

    </table>


</html>
