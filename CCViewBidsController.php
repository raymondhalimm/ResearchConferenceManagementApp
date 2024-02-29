<?php
include("PaperClass.php");

class CCViewBidsController{

    function getAllBiders($paper_id){

        //creates a new Paper object
        $bids = new Paper();

        //calls the getAllBiders() function in Paper class
        $data = $bids->getAllBiders($paper_id);

        return $data;

    }

    function getPaper($paper_id){

        //creates a new Paper object
        $bids = new Paper();

        //calls the getAllBiders() function in Paper class
        $data = $bids->getPaper($paper_id);

        return $data;

    }
    
}

?>
