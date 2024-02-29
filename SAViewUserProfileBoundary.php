<?php
include("SAViewUserProfileController.php");
include("SASearchProfileController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

    //creates new SAViewUserProfileController object
    $viewProfiles = new SAViewUserProfileController();

    /*calls the viewPofiles() function in the SAViewUserProfileController
      which returns an array of the results from the query*/
    $result = $viewProfiles->viewProfiles();

    if (isset($_POST["submit"])){

        $searchProfiles = new SASearchProfileController();

        $result = $searchProfiles->searchProfile();

    }

    if (isset($_POST["edit"])){

        $_SESSION["pname"] = $_POST["edit"];

        header("Location:SAEditProfileBoundary.php");

    }

?>

    <p>
		<form method="" action="Admin.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>

    <div class="mid">

        <form method="post" action="">
        <table>

            <tr><th class="homepage_buttons" colspan="2">View Profiles</th></tr>

            <tr>
                <td class="homepage_buttons"><input type="text" class="text_box" name="searchpname" placeholder="Search Profile"></td>
                <td class="homepage_buttons"><input type="submit" class="button" name="submit" value="SEARCH"></td>
            </tr>

            <?php while ($data = $result->fetch_assoc()){ ?>
                <tr>
                    <td class="homepage_buttons"><?php echo $data["pname"]; ?></td>
                    <td class="homepage_buttons"><button type="submit" class="button" name="edit" value="<?php echo $data["pname"]; ?>">Edit</button></td>
                </tr>     
            <?php } ?>
        
        </table>
        </form>

    </div>

</html>