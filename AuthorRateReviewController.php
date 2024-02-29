<?php 
include "ReviewClass.php";

class AuthorRateReview{
    
    // Function to update author rating on review
    function rateReview($review_id, $authorRate) {

        $review = new Review();

        $review->authorRating($review_id, $authorRate);

    }

}

?>