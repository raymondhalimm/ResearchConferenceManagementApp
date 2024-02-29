<?php
//Include to get other reviews
include("ReviewerViewReviewsController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

    //Get the paper_id and assign to a local variable
    $paper_id = $_SESSION["paper_id"];

    //Create new viewOtherReviews object to access functions
    $reviewControl = new viewOtherReviews();

    $username = $reviewControl->getReviewer();
    $check = $reviewControl->checkReview($paper_id, $username);

    if ($check == NULL){
        $_SESSION["reviewError"] = true;
        header("Location:ReviewerViewAssignedPaperBoundary.php");
    }

    $paperResult = $reviewControl->getPaper($paper_id);

    $paper = $paperResult->fetch_assoc();

    $otherReviews = $reviewControl->getAllReviews($paper_id);

    if (isset($_POST["submit"])){
        $_SESSION["review_id"] = $_POST["submit"];
        header("Location:ReviewerAddEditCommentBoundary.php");
    }

?>

    <p>
	    <form method="" action="Reviewer.php">
	    <button class="homepageButton">HOME</button>
	    </form>
    </p>

    <div class="mid">

        <form method="post" action="">
        <table>

            <tr>
                <th class="homepage_buttons" colspan="4">Other Reviews</th>
            </tr>

            <tr>
                <th class="homepage_buttons" colspan="3">Paper Title: <?php echo $paper["title"] ?></th>
                <th class="homepage_buttons">Author: <?php echo $paper["name"] ?></th>
            </tr>

            <?php while ($reviewRow = $otherReviews->fetch_assoc()){ ?>

                <tr>
                    <th class="homepage_buttons">Reviewed By</th>
                    <th class="homepage_buttons" colspan="2">Review</th>
                    <th class="homepage_buttons">Rating</th>
                </tr>

                <tr>
                    <td class="homepage_buttons"><?php echo $reviewRow["name"]; ?></td>
                    <td class="homepage_buttons" colspan="2"><?php echo $reviewRow["review_text"]; ?></td>
                    <td class="homepage_buttons"><?php echo $reviewRow["review_rating"]; ?></td>
                </tr>

                <?php $comments = $reviewControl->getReviewComments($reviewRow["review_id"]);

                if (mysqli_num_rows($comments) > 0){ ?>

                    <tr>
                        <th class="homepage_buttons" colspan="3">Comments</th>
                        <th class="homepage_buttons">Commented By</th>
                    </tr>

                    <?php while ($commentRow = $comments->fetch_assoc()){ ?>

                        <tr>
                            <td class="homepage_buttons" colspan="3"><?php echo $commentRow["comment_text"]; ?></td>
                            <td class="homepage_buttons"><?php echo $commentRow["name"]; ?></td>          
                        </tr>

                    <?php } ?>

                <?php } ?>

                    <tr>
                        <td class="homepage_buttons"></td>
                        <td class="homepage_buttons" colspan="2">
                            <button type="submit" class="button" name="submit" value="<?php echo $reviewRow["review_id"]; ?>">Add/Edit Comment</button>
                        </td>
                        <td class="homepage_buttons"></td>
                    </tr>

            <?php } ?>

        </table>
        </form>

    </div>    

</html>