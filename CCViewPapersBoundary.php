<?php
include("CCViewPapersController.php");
include("CCSearchPapersController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

  //creates new CCViewPapersController object
  $viewPapers = new CCViewPapersController();

  /*calls the viewPapers() function in the CCViewPapersController
    which returns an array of the results from the query*/
  $result = $viewPapers->viewPapers();

  //creates new CCSearchPapersController object
  $searchPapers = new CCSearchPapersController();

  /*calls the getAuthors() function in the CCSearchPapersController
    which returns an array of all Author accounts*/
  $authors = $searchPapers->getAuthors();

  //sets $result to result set with search criteria
  if(isset($_POST["search"])) {

    $result = $searchPapers->getSearchPaper($_POST["searchTitle"], $_POST["searchAuthor"]);

  }

  //shows the bid for a paper
  if(isset($_POST["viewBids"])) {

    $_SESSION["paper_id"] = $_POST["viewBids"];

    header("Location:CCViewBidsBoundary.php");

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
      
      <tr>
        <th class="homepage_buttons" colspan="5">View Bids for Papers</th>
      </tr>

      <!-- search function -->
      <tr>
        <td class="homepage_buttons" colspan="2"><input type="text" class="text_box" name="searchTitle" placeholder="Enter title..."></td>
        <td class="homepage_buttons" colspan="2">
          <select class="dropdown" name ="searchAuthor" id="searchAuthor">
            <option value ="">Select Author</option>
              <?php
                //while there is still data to display
                while($data = $authors->fetch_assoc()) {
              ?>
                <!-- display author names from column name to display authors-->
                <option value ="<?php echo $data["name"]; ?>"><?php echo $data["name"]; ?></option>
              <?php } ?>
          </select>
        </td>
        <td class="homepage_buttons"><input type="submit" class="button" name="search" value="SEARCH"></td>
      </tr>

      <!-- headers -->
      <tr>
        <th class="homepage_buttons">ID</th>
        <th class="homepage_buttons">Title</th>
        <th class="homepage_buttons">Author</th>
        <th class="homepage_buttons">No. of Bids</th>
        <th class="homepage_buttons"></th>
      </tr>

      <!-- display papers -->
      <?php
        while($data = $result->fetch_assoc()) {
      ?>

      <tr>
        <td class="homepage_buttons"><?php echo $data["paper_id"]; ?></td>
        <td class="homepage_buttons"><?php echo $data["title"]; ?></td>
        <td class="homepage_buttons"><?php echo $data["name"]; ?></td>
        <td class="homepage_buttons"><?php echo $data["bids"]; ?></td>
        <td class="homepage_buttons">
          <button type="submit" class="button" name="viewBids" value="<?php echo $data["paper_id"]?>">View</button>
        </td>
      </tr>

      <?php } ?>

    </table>
    </form>

  </div>

</html>
