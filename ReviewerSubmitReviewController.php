<?php
include("UserClass.php");
include("ReviewClass.php");
include("PaperClass.php");

class ReviewerSubmitReviewController{

    function getReviewerName(){

        return $_SESSION["user"]->getUsername();

    }

    function getPaperName($paper_id){

        $paper = new Paper();

        $result = $paper->getTitle($paper_id);

        $row = $result->fetch_assoc();

        return $row;

    }

    function createReview($paper_id, $username, $review_text, $review_rating)
    {

        //create new review entity object
        $newreview = new Review();

        $decreaseWorkload = new User();

        $check = $newreview->checkReview($paper_id, $username);

        if (mysqli_num_rows($check) > 0){
            return false;
        }

        //use create review function in entity to create a new account
        $result = $newreview->submitReview($paper_id, $username, $review_text, $review_rating);

        if ($result){
            $decreaseWorkload->decreaseWorkload($username);
        }

        return $result;
       
	}

}

?>