<?php
include("UserClass.php");
include("ReviewClass.php");


class ReviewerAddComment{

    function getReviewer() {

        if(isset($_SESSION['user'])) {
            $username = $_SESSION['user']->getUsername();
        }
    
        return $username;
    
    }

    function getReview($review_id){

        $review = new Review();

        $result = $review->getReview($review_id);

        return $result;

    }

    function addNewComment($new_comment, $review_id, $username)
    {

        $review = new Review();

        $result = $review->addNewComment($new_comment, $review_id, $username);

        return $result;

    }

}

?>