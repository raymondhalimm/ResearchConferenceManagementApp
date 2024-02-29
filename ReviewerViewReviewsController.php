<?php
include("UserClass.php");
include("ReviewClass.php");
include("PaperClass.php");

class viewOtherReviews{

    function getReviewer(){

        if(isset($_SESSION['user'])) {
            $username = $_SESSION['user']->getUsername();
        }
    
        return $username;
    
    }

    function checkReview($paper_id, $username){

        $review = new Review();
    
        $result = $review->checkReview($paper_id, $username);
    
        $row = $result->fetch_assoc();
    
        return $row;
    
    }

    //Get paper info
    function getPaper($paper_id){

        //create new Review object
        $paper = new Paper();

        //Call the function to all reviews
        $result = $paper->getPaper($paper_id);

        return $result;

    }

    function getAllReviews($paper_id){
        
        $review = new Review();

        $result = $review->getAllReviews($paper_id);

        return $result;

    }

    function getReviewComments($review_id){

        $review = new Review();

        $result = $review->getReviewComments($review_id);

        return $result;

    }

}

?>

