<?php
include("CCViewBidsController.php");
include("CCEditBidController.php");
include("CCDeleteBidController.php");
include("CCSearchBidsController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

  //creates new CCViewBidsController object
  $viewBids = new CCViewBidsController();

  /*calls the getPaper() function in the CCViewBidsController
    which returns an array of the results from the query about the selected paper*/
  $resultPaper = $viewBids->getPaper($_SESSION["paper_id"]);

  /*calls the getAllBiders() function in the CCViewBidsController
    which returns an array of the results from the query*/
  $result = $viewBids->getAllBiders($_SESSION["paper_id"]);
  
  $paper = $resultPaper->fetch_assoc();

  //creates new CCEditBidController object to be used to accept/reject bids
  $editBid = new CCEditBidController();

  $accept = true;
  $reject = true;
  $delete = true;

  if(isset($_POST["accept"])) {

    //takes reviewer username of selected bid
    $reviewer = $_POST["accept"];

    //gets paper_id from session
    $paper_id = $_SESSION["paper_id"];

    /*calls acceptBid() function in CCEditBidController
      which changes the status to accepted and increments current workload of reviewer*/
    $bool = $editBid->acceptBid($paper_id, $reviewer);

    //if successfully updated, reload page to remove table row
    if($bool){
      header("Location:CCViewBidsBoundary.php");
    }
    else{
      $accept = false;
    }
    
  }

  if(isset($_POST["reject"])) {

    //take reviewer username of selected bid
    $reviewer = $_POST["reject"];

    //get paper_id from session
    $paper_id = $_SESSION["paper_id"];

    //calls rejectBid() function in CCEditBidController
    $bool = $editBid->rejectBid($paper_id, $reviewer);

    //if successfully updated, reload page to remove table row
    if($bool){
      header("Location:CCViewBidsBoundary.php");
    }
    else{
      $reject = false;
    }

  }

  if(isset($_POST["delete"])) {

    //take reviewer username of selected bid
    $reviewer = $_POST["delete"];

    //get paper_id from session
    $paper_id = $_SESSION["paper_id"];

    //create new CCDeleteBidController
    $deleteBid = new CCDeleteBidController();

    //call deleteBid() function in CCDeleteBidController if deleted returns true, else false
    $bool = $deleteBid->deleteBid($paper_id, $reviewer);

    //if successfully deleted, reload page to remove table row
    if($bool){
      header("Location:CCViewBidsBoundary.php");
    }
    else{
      $delete = false;
    }

  }

  //sets $result to result set with search criteria
  if(isset($_POST["search"])) {

    //creates new CCSearchBidsController object
    $searchBids = new CCSearchBidsController();

    //get paper_id from session
    $paper_id = $_SESSION["paper_id"];

    //calls getSearchBids() in CCSearchBidsController object passing paper_id and reviewer name search criteria
    $result = $searchBids->getSearchBids($paper_id, $_POST["searchReviewer"]);

  }

?>

  <p>
    <form method="" action="CC.php">
    <button class="homepageButton">HOME</button>
    </form>
  </p>

  <div class="mid">

    <?php

      if ($accept == false){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Unable to accept bid due to workload.</strong></div>";

			}

      if ($reject == false){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Unable to reject bid.</strong></div>";

			}

      if ($delete == false){

				echo "<div class='alert alert-danger fade in' align='center'><strong>Unable to delete bid.</strong></div>";

			}

    ?>

    <form method="post" action="">
    <table>

      <tr>
        <th class="homepage_buttons" colspan="4">Manage Bids</th>
      </tr>

      <tr >
        <th class="homepage_buttons" colspan="2">Paper Title: <?php echo $paper["title"]; ?></th>
        <th class="homepage_buttons" colspan="2">Author: <?php echo $paper["name"]; ?></th>
      </tr>

      <tr>
        <td class="homepage_buttons" colspan="2"><input type="text" class="text_box" name="searchReviewer" placeholder="Enter reviewer name..."></td>
        <td class="homepage_buttons" colspan="2"><input type="submit" class="button" name="search" value="SEARCH"></td>
      </tr>

      <tr>
        <th class="homepage_buttons">Username</th>
        <th class="homepage_buttons">Current Workload</th>
        <th class="homepage_buttons">Max Workload</th>
        <th class="homepage_buttons"></th>
      </tr>

      <?php while($data = $result->fetch_assoc()){ ?>

        <tr>
          <td class="homepage_buttons"><?php echo $data["name"]; ?></td>
          <td class="homepage_buttons"><?php echo $data["current_workload"]; ?></td>
          <td class="homepage_buttons"><?php echo $data["max_workload"]; ?></td>
          <td class="homepage_buttons">
            <button type="submit" class="button" name="accept" value="<?php echo $data["username"]; ?>">ACCEPT</button>
            <button type="submit" class="button" name="reject" value="<?php echo $data["username"]; ?>">REJECT</button>
            <button type="submit" class="button" name="delete" value="<?php echo $data["username"]; ?>">DELETE</button>
          </td>
        </tr>

      <?php } ?>

    </table>
    </form>

  </div>

</html>
