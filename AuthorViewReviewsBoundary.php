<?php
include "AuthorViewReviewsController.php";
include "AuthorRateReviewController.php";
session_start()
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Author.css">

<?php

    // Get paper id passed on from previous page
    $paper_id = $_SESSION["paper_id"];

    // Create new controller object and store review and paper details
    $viewControl = new AuthorViewReviews();
    $rateControl = new AuthorRateReview();

    $paperResult = $viewControl->getPaper($paper_id);
    $paper = $paperResult->fetch_assoc();

    $result = $viewControl->getReview($paper_id);

    $success = false;

    if (isset($_POST["submit"])){

        $rateControl->rateReview($_POST["submit"], $_POST["authorRating"]);

        $success = true;

    }

?>

    <p>
        <form method="" action="Author.php">
        <button class="homepageButton">HOME</button>
        </form>
    </p>

    <div class="mid">

        <?php

            if ($success == true){

                echo "<div class='alert alert-success alert-dismissible' align='center'><strong>Rating updated.</strong>
                <a href='' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
                
                $result = $viewControl->getReview($paper_id);

            }
        
        ?>

        <table>

            <tr><th class="homepage_buttons" colspan="6">View Reviews</th></tr>

            <tr>
                <th class="homepage_buttons" colspan="3">Paper Title: <?php echo $paper["title"] ?></th>
                <th class="homepage_buttons" colspan="3">Author: <?php echo $paper["name"] ?></th>
            </tr>

            <tr>
                <th class="homepage_buttons">Posted by</th>
                <th class="homepage_buttons" colspan="2">Review</th>
                <th class="homepage_buttons">Rating</th>
                <th class="homepage_buttons" colspan="2">Your Rating</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()){ ?>

                <form method="post" action="">
                <tr>
                    <td class="homepage_buttons"><?php echo $row["name"]; ?></td>
                    <td class="homepage_buttons" colspan="2"><?php echo $row["review_text"]; ?></td>
                    <td class="homepage_buttons"><?php echo $row["review_rating"]; ?></td>
                    <td class="homepage_buttons">
                        <select name="authorRating" class="dropdown" style="width:100px">
                            <?php 
                                for ($i = -3; $i <= 3; $i++){
                                    if ($i == $row["author_rating"]){
                                        echo "<option value=$i selected='selected'>$i</option>";
                                    }
                                    else{
                                        echo "<option value=$i>$i</option>";
                                    }
                                }
                            ?>
                        </select>
                    </td>
                    <td class="homepage_buttons"><button type="submit" class="button" name="submit" value="<?php echo $row["review_id"]; ?>">SUBMIT</button></td>
                </tr>
                </form>

            <?php } ?>

        </table>

    </div>        

</html>
