<?php
include("SAEditProfileController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

    $pname = $_SESSION["pname"];

    $control = new SAEditProfileController();

    $error = false;
    $success = false;

    if (isset($_POST["submit"])){

        $result = $control->updateProfile($pname, $_POST["pname"]);

        if ($result == true){
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

                echo "<div class='alert alert-danger fade in' align='center'><strong>Error updating profile.</strong></div>";

            }

            if ($success == true){

                echo "<div class='alert alert-success' align='center'><strong>Profile updated. Returning home.</strong></div>";
                header("refresh:3;url=Admin.php");

            }

        ?>

        <form method="post" action="">
		<table>
			<tr>
				<th class="homepage_buttons">Edit Profile</th>
			</tr>
			<tr>
				<td class="homepage_buttons"><input type="text" class="text_box" name="pname" value="<?php echo $pname; ?>"></td>
			</tr>
			<tr>
				<td class="homepage_buttons"><input type="submit" class="button" name="submit" value="SUBMIT"></td>
			</tr>
		</table>
		</form>

    </div>

</html>