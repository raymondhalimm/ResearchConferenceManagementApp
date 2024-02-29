<?php
include("CCViewReviewedPapersController.php");
include("CCSearchReviewedPapersController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

  //creates new CCViewPapersController object
	$viewControl = new CCViewReviewedPapers();

  $searchControl = new CCSearchReviewedPapers();

  /*calls the viewPapers() function in the CCViewPapersController
    which returns an array of the results from the query*/
  $result = $viewControl->viewPapers();

  /*calls the getAuthors() function in the CCSearchPapersController
    which returns an array of all Author accounts*/
  $authors = $searchControl->getAuthors();

  //sets $result to result set with search criteria
  if(isset($_POST["search"])){
    $result = $searchControl->getSearchPaper($_POST["searchTitle"], $_POST["searchAuthor"]);
  }

  if(isset($_POST["view"])){
    $_SESSION["paper_id"] = $_POST["view"];
    header("Location:CCViewReviewsBoundary.php");
  }

?>

  <p>
    <form method="" action="CC.php">
    <button class="homepageButton">HOME</button>
    </form>
  </p>

  <div class="mid">

    <form method="post" action="">
    <table>

      <tr><th class="homepage_buttons" colspan="4">Reviewed Papers</th></tr>

      <tr>
        <td class="homepage_buttons"></td>
        <td class="homepage_buttons"><input type="text" class="text_box" name="searchTitle" placeholder="Enter title..."></td>
        <td class="homepage_buttons">
          <select class="dropdown" name="searchAuthor">
            <option value="">Select Author</option>
            <?php while ($row = $authors->fetch_assoc()){ ?>

              <option value="<?php echo $row["name"]; ?>"><?php echo $row["name"]; ?></option>

            <?php } ?>
          </select>
        </td>
        <td class="homepage_buttons"><input type="submit" class="button" name="search" value="SEARCH"></td>
      </tr>

      <tr>
        <th class="homepage_buttons">ID</th>
        <th class="homepage_buttons">Title</th>
        <th class="homepage_buttons">Author</th>
        <th class="homepage_buttons"></th>
      </tr>

      <?php while ($row = $result->fetch_assoc()){ ?>

        <tr>
          <td class="homepage_buttons"><?php echo $row["paper_id"]; ?></td>
          <td class="homepage_buttons"><?php echo $row["title"]; ?></td>
          <td class="homepage_buttons"><?php echo $row["name"]; ?></td>
          <td class="homepage_buttons">
            <button type="submit" class="button" name="view" value="<?php echo $row["paper_id"]; ?>">View Reviews</button>
          </td>
        </tr>

      <?php } ?>

    </table>
    </form>

  </div>

</html>
