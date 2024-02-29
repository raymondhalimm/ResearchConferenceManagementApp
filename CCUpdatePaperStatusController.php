<?php

class CCUpdatePaperStatusController {

    // Function to update paper status
    function updatePaperStatus($status, $paper_id) {

        $paper = new Paper();

        $result = $paper->updatePaperStatus($status, $paper_id);

        return $result;

    }

}

?>