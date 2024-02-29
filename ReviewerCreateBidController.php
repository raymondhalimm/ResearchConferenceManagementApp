<?php

class ReviewerCreateBidController{

    function newBid($paper_id){

        $paper = new Paper();

        // Creates a new bid for the chosen paper using the ID of the paper and the user's username
        $bool = $paper->createBid($paper_id, $_SESSION["user"]->getUsername());

        // Returns if the new bid is successful or not
        return $bool;

    }

}

?>