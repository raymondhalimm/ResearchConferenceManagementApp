<?php
include("ReviewClass.php");
include("UserClass.php");
include("PaperClass.php");

class ReviewerEditReviewController{

  function getReview($paper_id, $username) {

    $review = new Review();

    $result = $review->checkReview($paper_id, $username);

    $row = $result->fetch_assoc();

    return $row;

  }

  function getTitle($paper_id) {

    $paper = new Paper();

    $result = $paper->getTitle($paper_id);

    $row = $result->fetch_assoc();

    return $row;

  }

  function getReviewer() {

    if(isset($_SESSION['user'])) {
        $username = $_SESSION['user']->getUsername();
    }

    return $username;

  }

  function editReview($review_id, $review_text, $review_rating) {

    $review = new Review();

    $result = $review->updateReview($review_id, $review_text, $review_rating);

    return $result;

  }

}

?>
