<?php
include("ReviewerSubmitReviewController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

    $controller = new ReviewerSubmitReviewController();

    $paper_id = $_SESSION["paper_id"];
    $username = $controller->getReviewerName();

    $titlerow = $controller->getPaperName($paper_id);

    $title = $titlerow["title"];

    $error = false;
    $success = false;

    if (isset($_POST["submit_Review"])){

		// if any of the values are empty, output error
		if ($_POST["review_text"] == NULL || $_POST["review_rating"] == NULL){

			$error = true;

		}
		else{

			$result = $controller->createReview($paper_id, $username, $_POST["review_text"], $_POST["review_rating"]);

			if ($result == true){

				$success = true;

            }
			else{

				$error = true;
                
			}

		}

	 }

?>

    <p>
		<form method="" action="Reviewer.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>

    <div class="mid">

        <?php
            
            if ($success == true){
                echo "<div class='alert alert-success' align='center'><strong>Review submitted. Returning home.</strong></div>";
                header("refresh:3;url=Reviewer.php");
            }

            if ($error == true){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Error submitting review.</strong></div>";

			}
        
        ?>

        <form method="post" action="">
        <table>

            <tr><th class="homepage_buttons" colspan="2">Submit Review</th></tr>

            <tr>

                <th class="homepage_buttons">Paper Title: <?php echo $title; ?></th>

                <td class="homepage_buttons">
                    <select name="review_rating" class="dropdown">
                        <option value="" selected hidden>Choose Ratings...</option>
                        <option value="-3">-3</option>
                        <option value="-2">-2</option>
                        <option value="-1">-1</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </td>

            </tr>

            <tr>
                <td class="homepage_buttons" colspan="2">
                    <textarea class="text_field" name="review_text" type="text" placeholder="Reviews here..." cols="100" rows="10"></textarea>
                </td>
            </tr>

            <tr>

                <td class="homepage_buttons" colspan="2"><input type="submit" class="button" name="submit_Review"></td>

            </tr>

        </table>
        </form>

    </div>

</html>