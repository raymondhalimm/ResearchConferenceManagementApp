<?php
include("SetMaxWorkloadController.php");
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

	$bool = NULL;

	$workload = new SetMaxWorkloadController();

	//Get the username of the current user and get current max
	$result = $workload->displayMaxWorkload();

	//Get the info from the result variable
	$row = $result->fetch_assoc();

	if (isset($_POST["submit_info"])){

		$bool = $workload->updateMaxWorkload($_POST["set_workload"]);

	}

?>

  	<p>
		<form method="" action="Reviewer.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>

	<div class="mid">

		<?php
		
			if ($bool == true){
				echo "<div class='alert alert-success' align='center'><strong>Workload updated. Returning home.</strong></div>";
				header("refresh:3;url=Reviewer.php");
			}
		
		?>

		<form method="post" action="">
		<table>

			<tr>
				<th class="homepage_buttons">Set Max Workload</th>
			</tr>

			<tr>
				<td class="homepage_buttons">
					<select class="dropdown" name="set_workload" id="workload">
						<?php 
							for ($i = 0; $i<=10; $i++){
								if ($i == $row["max_workload"]){
									echo "<option value=$i selected='selected'>$i</option>";
								}
								else{
									echo "<option value=$i>$i</option>";
								}
							}
						?>
                    </select>
				</td>
			</tr>

			<tr>
				<td class="homepage_buttons"><input class="button" type="submit" name="submit_info"></td>
			</tr>

		</table>
		</form>

	</div>


<?php
	
?>
</html>