<?php
include("ReviewerAddCommentController.php");
include("ReviewerEditCommentController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

    $review_id = $_SESSION['review_id'];

    $addControl = new ReviewerAddComment();

    $username = $addControl->getReviewer();

    $review = $addControl->getReview($review_id);
    $row = $review->fetch_assoc();

    $editControl = new ReviewerEditComment();

    $oldComment = $editControl->getComment($review_id, $username);

    $mode = 0;
    $commentText = "";

    $success = false;
    $error = false;

    if (mysqli_num_rows($oldComment) > 0){

        $mode = 1;

        $commentRow = $oldComment->fetch_assoc();

        $commentText = $commentRow["comment_text"];

    }

    if (isset($_POST["submit"])){

        if ($mode == 1){
            if ($editControl->editComment($commentRow["comment_id"], $_POST["comment_text"])){
                $success = true;
            }
            else{
                $error = true;
            }
        }
        else{
            if ($addControl->addNewComment($review_id, $username, $_POST["comment_text"])){
                $success = true;
            }
            else{
                $error = true;
            }
        }

    }

?>

    <p>
        <form method="" action="ReviewerViewReviewsBoundary.php">
        <button class="homepageButton">BACK</button>
        </form>
    </p>

    <div class="mid">

        <?php
          
            if ($success == true){
            echo "<div class='alert alert-success' align='center'><strong>Updated comment. Returning to reviews.</strong></div>";
            header("refresh:3;url=ReviewerViewReviewsBoundary.php");
            }

            if ($error == true){
            echo "<div class='alert alert-danger fade in' align='center'><strong>Unable to update comment.</strong></div>";
            }
          
        ?>

        <form method="post" action="">
        <table>

            <tr><th class="homepage_buttons" colspan="3">Add/Edit Comment</th></tr>

            <tr>
                <th class="homepage_buttons">Posted By</th>
                <th class="homepage_buttons">Review</th>
                <th class="homepage_buttons">Rating</th>
            </tr>

            <tr>
                <td class="homepage_buttons"><?php echo $row["name"]; ?></td>
                <td class="homepage_buttons"><?php echo $row["review_text"]; ?></td>
                <td class="homepage_buttons"><?php echo $row["review_rating"]; ?></td>
            </tr>

            <tr>
                <td class="homepage_buttons" colspan="3">
                    <textarea type="text" class="text_field" name="comment_text" cols="100" rows="10"><?php echo $commentText; ?></textarea>
                </td>
            </tr>

            <tr>
                <td class="homepage_buttons" colspan="3"><input type="submit" class="button" name="submit" value="SUBMIT"></td>
            </tr>

        </table>
        </form>

    </div>

</html>