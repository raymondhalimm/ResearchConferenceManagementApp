<?php
include("PaperClass.php");

class CCViewPapersController{

    function viewPapers(){

        //creates a new Paper object
        $paper = new Paper();

        //calls the getAllPapers() function in Paper class
        $data = $paper->getPaperBids();

        return $data;

    }
    
}

?>
