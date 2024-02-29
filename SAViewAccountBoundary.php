<?php
include("SAViewAccountController.php");
include("SASearchAccountController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Admin.css">

<?php

	$control = new SAViewAccountController();

	$result = $control->getInfo();

	if (isset($_POST["search"])){

		$control = new SASearchAccountController();

		$result = $control->getSearch($_POST["search_field"]);

	}

	if (isset($_POST["edit"])){

		$_SESSION["target_username"] = $_POST["edit"];
		header("Location:SAEditAccountBoundary.php");

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

			<tr><th class="homepage_buttons" colspan="3">View Accounts</th></tr>

			<tr>
				<td class="homepage_buttons" colspan="2"><input type="text" class="text_box" name="search_field" placeholder="Enter Name..."></td>
				<td class="homepage_buttons"><input type="submit" class="button" name="search" value="SEARCH"></td>
			</tr>

			<tr>
				<th class="homepage_buttons">Name</th>
				<th class="homepage_buttons">Profile</th>
				<th class="homepage_buttons"></th>
			</tr>

			<?php while ($row = $result->fetch_assoc()){ ?>

			<tr>
				<td class="homepage_buttons"><?php echo $row["name"]; ?></td>
				<td class="homepage_buttons"><?php echo $row["pname"]; ?></td>
				<td class="homepage_buttons">
					<button type="submit" class="button" name="edit" value="<?php echo $row["username"] ?>">Edit</button>
				</td>
			</tr>

			<?php } ?>

		</table>
		</form>

	</div>

</html>
