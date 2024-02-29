<?php
include("LogoutController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

    //if the logout button is clicked
    if (isset($_POST["logout"])){

        //construct a new LogoutController object
        new LogoutController();

    }

?>

     <header style = "text-align: center; line-height: 0">
		<h1>CONFERENCE CHAIR</h1>
	</header>

     <table class = "mid" cellspacing="0">

          <tr>
               <td class = "homepage_buttons">
               <form method="" action="CCViewPapersBoundary.php">
               <button class="button">VIEW BIDS</button>
               </form>
               </td>
          </tr>

          <tr>
               <td class = "homepage_buttons">
               <form method="" action="CCAutoBidBoundary.php">
               <button class="button">AUTOMATE BIDS</button>
               </form>
               </td>
          </tr>

          <tr>
     	     <td class = "homepage_buttons">
               <form method="" action="CCViewReviewedPapersBoundary.php">
          	<button class="button">VIEW REVIEWS</button>
               </form>
     	     </td>
          </tr>

	     <tr>
               <td class = "homepage_buttons">
               <form method="" action="CCChangePasswordBoundary.php">
          	<button class="button">CHANGE PASSWORD</button>
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
