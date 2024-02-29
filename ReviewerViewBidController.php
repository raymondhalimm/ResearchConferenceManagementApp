<?php
include("PaperClass.php");
include("UserClass.php");
session_start();

class ReviewerViewBidController{

    function viewAvailBids(){

        $paper = new Paper();

        // Gets the info of papers that have not been bid on by the user yet
        $resultset = $paper->getAvailBids($_SESSION["user"]->getUsername());

        // Returns the result set
        return $resultset;

    }

}

?>