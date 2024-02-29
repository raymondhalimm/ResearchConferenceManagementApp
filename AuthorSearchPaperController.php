<?php

class AuthorSearchPaperController {

    function searchPaper($title, $username) {

        // Create new paper object and run search paper function
        $paper = new Paper();

        $result = $paper->viewPaper($title, $username);

        return $result;

    }

}

?>