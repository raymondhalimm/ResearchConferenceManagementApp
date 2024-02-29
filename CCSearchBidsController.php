<?php

class CCSearchBidsController{

  function getSearchBids($paper_id, $reviewer) {

    //creates a new Paper object
    $bids = new Paper();

    //calls the getSearchBids() function in Paper Class
    $data = $bids->getSearchBids($paper_id, $reviewer);

    return $data;

  }

}

?>
