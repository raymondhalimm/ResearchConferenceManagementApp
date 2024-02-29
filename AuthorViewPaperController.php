<?php
include("UserClass.php");
include("PaperClass.php");
session_start();

class AuthorViewPaperController {

    function viewPaper($title, $username) {

        // Create new paper object and run view paper function
        $paper = new Paper();

        $result = $paper->viewPaper($title, $username);
        
        return $result;

    }

    function getAuthorLogin() {

        if(isset($_SESSION['user'])) {
            $username = $_SESSION['user']->getUsername();
        }

        return $username;

    }

}

?>
