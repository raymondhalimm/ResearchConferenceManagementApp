<?php
include("PaperClass.php");

class CCViewReviewedPapers{

    function viewPapers(){

        //creates a new Paper object
        $paper = new Paper();

        //calls the getAllPapers() function in Paper class
        $data = $paper->getPendingPapers();

        return $data;

    }
    
}

?>
