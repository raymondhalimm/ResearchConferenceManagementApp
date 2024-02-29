<?php
include "CCViewReviewsController.php";
include "CCUpdatePaperStatusController.php";
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

    // Get paper id from previous page
    $paper_id = $_SESSION["paper_id"];

    // Create new controller object and get review and paper details
    $viewControl = new CCViewReviewsController();
    $updateControl = new CCUpdatePaperStatusController();

    $paperResult = $viewControl->getPaper($paper_id);
    $paper = $paperResult->fetch_assoc();

    $result = $viewControl->getReview($paper_id);

    $success = false;
    $error = false;

    // If accept is pressed,
    if(isset($_POST["accept"])){

        if($updateControl->updatePaperStatus("Accepted", $paper_id)){
            $success = true;
        }
        else{
            $error = true;
        }

    }

    // If reject is pressed
    if(isset($_POST["reject"])){

        if($updateControl->updatePaperStatus("Rejected", $paper_id)){
            $success = true;
        }
        else{
            $error = true;
        }

    }

?>

    <p>
        <form method="" action="CC.php">
        <button class="homepageButton">HOME</button>
        </form>
    </p>

    <div class="mid">

        <?php

            if ($error == true){

                echo "<div class='alert alert-danger fade in' align='center'><strong>Error updating paper status.</strong></div>";

            }

            if ($success == true){

                echo "<div class='alert alert-success' align='center'><strong>Paper status updated. Returning home.</strong></div>";
                header("refresh:3;url=CC.php");

            }
        
        ?>

        <form method="post" action="">
        <table>

            <tr><th class="homepage_buttons" colspan="4">View Reviews</th></tr>

            <tr class="homepage_buttons">
                <th class="homepage_buttons">Paper Title: <?php echo $paper["title"] ?></th>
                <th class="homepage_buttons">Author: <?php echo $paper["name"] ?></th>
                <td><button type="submit" class="button" name="accept">Accept Paper</button></td>
                <td><button type="submit" class="button" name="reject">Reject Paper</button></td>
            </tr>

            <tr>
                <th class="homepage_buttons">Posted by</th>
                <th class="homepage_buttons" colspan="2">Review</th>
                <th class="homepage_buttons">Rating</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()){ ?>

                <tr>
                    <td class="homepage_buttons"><?php echo $row["username"]; ?></td>
                    <td class="homepage_buttons" colspan="2"><?php echo $row["review_text"]; ?></td>
                    <td class="homepage_buttons"><?php echo $row["review_rating"]; ?></td>
                </tr>

            <?php } ?>

        </table>
        </form>

    </div>        

</html>
