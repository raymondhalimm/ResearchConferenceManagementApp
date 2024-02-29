<?php
include "PaperClass.php";

class CCViewReviewsController{

    function getPaper($paper_id){

        //creates a new Paper object
        $bids = new Paper();

        //calls the getAllBiders() function in Paper class
        $data = $bids->getPaper($paper_id);

        return $data;

    }

    // Function calling get reviews on paper id
    function getReview($paper_id) {

        $paper = new Paper();

        $review = $paper->getReview($paper_id);
        
        return $review;

    }

}

?>