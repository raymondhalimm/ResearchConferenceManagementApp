<?php

class CCDeleteBidController{

    function deleteBid($paper_id, $reviewer){

        //creates a new Paper object
        $bid = new Paper();

        //calls the deleteBid() function in Paper class
        $bool = $bid->deleteBid($paper_id, $reviewer);

        return $bool;

    }
    
}

?>
