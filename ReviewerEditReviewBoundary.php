<?php
include("ReviewerEditReviewController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

  //Get paper_id
  $paper_id = $_SESSION["paper_id"];

  //Create a new ReviewerEditReviewController object
  $review = new ReviewerEditReviewController();

  //gets title of the paper_id to display on the page
  $titleRow = $review->getTitle($paper_id);
  $title = $titleRow["title"];

  //gets username of current reviewer
  $username = $review->getReviewer();

  //gets review associated with the paper_id and username
  $reviewRow = $review->getReview($paper_id, $username);
  $currentReview = $reviewRow["review_text"];
  $currentRating = $reviewRow["review_rating"];

  //if no review exists it redirects back to the view assigned paper boundary
  if($reviewRow == NULL) {
    $_SESSION["reviewError"] = true;
    header("Location:ReviewerViewAssignedPaperBoundary.php");
  }

  $error = false;
  $success = false;

  if (isset($_POST["submit"])) {

    //make sure user fills in all values
    if ($_POST["review_text"] == NULL || $_POST["review_rating"] == NULL) {

      $error = true;

    }
    else {

      //if all values are filled then
      //create a new ReviewerEditReviewController object
      $editReview = new ReviewerEditReviewController();

      /*call editReview(review_id, review_text, review_rating) to update the
        review associated with that review_id*/
      $result = $editReview->editReview($reviewRow["review_id"], $_POST["review_text"], $_POST["review_rating"]);

      if ($result == true){
        $success = true;
        $reviewRow = $review->getReview($paper_id, $username);
        $currentReview = $reviewRow["review_text"];
        $currentRating = $reviewRow["review_rating"];
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
                  <?php 
                    for ($i = -3; $i <= 3; $i++){
                      if ($i == $currentRating){
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
            <td class="homepage_buttons" colspan="2">
                <textarea class="text_field" name="review_text" type="text" cols="100" rows="10"><?php echo $currentReview; ?></textarea>
            </td>
        </tr>

        <tr><td class="homepage_buttons" colspan="2"><input type="submit" class="button" name="submit"></td></tr>

    </table>
    </form>

  </div>

</html>
