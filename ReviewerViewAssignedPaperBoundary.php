<?php
include("ReviewerViewAssignedPaperController.php");
include("ReviewerSearchPaperController.php");
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

  // New ViewPaperController object and run the view paper function which return result
  $control = new ReviewerViewAssignedPaperController();
  $result = $control->ReviewerViewAssignedPaper();
    
  if(isset($_POST["submitReview"])) {
    $_SESSION["paper_id"] = $_POST["submitReview"];
    header("Location:ReviewerSubmitReviewBoundary.php");
  }

  if(isset($_POST["editReview"])) {
    $_SESSION["paper_id"] = $_POST["editReview"];
    header("Location:ReviewerEditReviewBoundary.php");
  }

  //Moves the user to ReviewerViewOtherReviewsBoundary
  if(isset($_POST["viewReview"])) {

    $_SESSION["paper_id"] = $_POST["viewReview"];
    header("Location:ReviewerViewReviewsBoundary.php");

  }

  $searchPapers = new ReviewerSearchPaperController();
  $authors = $searchPapers->getAuthors();

  //sets $result to result set with search criteria
  if(isset($_POST["search"])) {
    $result = $searchPapers->getSearchPaper($_POST["searchTitle"], $_POST["searchAuthor"]);
  }

?>

  <p>
		<form method="" action="Reviewer.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>

  <div class="mid">

    <?php
    
      if (isset($_SESSION["reviewError"])){

        echo "<div class='alert alert-danger fade in' align='center'><strong>No review found for this paper.</strong></div>";
        unset($_SESSION["reviewError"]);

      }
    
    ?>

    <form method="post" action="">
    <table>

      <tr><th class="homepage_buttons" colspan="3">Assigned Papers</th></tr>

      <tr>
        <td class="homepage_buttons"><input type="text" class="text_box" name="searchTitle" placeholder="Enter title..."></td>

        <td class="homepage_buttons">
          <select class="dropdown" name ="searchAuthor" id="searchAuthor">
            <option value ="">Select Author</option>
            <?php
              //while there is still data to display
              while($data = $authors->fetch_assoc()){ ?>
                <!-- display author names from column name to display authors-->
                <option value="<?php echo $data["name"]; ?>"><?php echo $data["name"]; ?></option>
            <?php }; ?>
          </select>
        </td>

        <td class="homepage_buttons"><input type="submit" class="button" name="search" value="SEARCH"></td>
      </tr>

      <tr>
        <th class="homepage_buttons">Title</th>
        <th class="homepage_buttons">Author</th>
        <th class="homepage_buttons"></th>
      </tr>

      <?php 
      while ($row = $result->fetch_assoc()){ 
        ?>

          <!-- Echo each row with their own respective value -->
          <tr>
            <td class="homepage_buttons"><?php echo $row["title"]; ?></td>
            <td class="homepage_buttons"><?php echo $row["name"]; ?></td>
            <td class="homepage_buttons">
              <button type="submit" class ="button" name="submitReview" value="<?php echo $row["paper_id"]; ?>">Submit Review</button>
              <button type="submit" class="button" name="editReview" value="<?php echo $row["paper_id"]?>">Edit Review</button>
              <button type="submit" class="button" name="viewReview" value="<?php echo $row["paper_id"]?>">View Other Review</button>
            </td>
          </tr>

      <?php 
        } ?>

    </table>
    </form>

  </div>

</html>


