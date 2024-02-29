<?php
include("PaperClass.php");
include('UserClass.php');
session_start();

class AuthorAddPaperController {

    function addPaper($username, $title, $paper_status) {

        // Create new paper object and run add paper function
        $paper = new Paper();

        $result = $paper->addPaper($username, $title, $paper_status);

        return $result;

    }

    function getAuthor($username) {

        // Create new paper object and run get author list function
        $paper = new Paper();
        $result = $paper->getAuthor($username);

        // Initialize array variable
        $authorlist = array();

        // Check if the result contains row
        if($result->num_rows > 0) {
            // Store each row inside array
            while ($row = $result->fetch_assoc()) {
                $authorlist[] = $row;
            }
        }

        return $authorlist;

    }

    function addSub($title, $username, $sub) {

        // Create new paper object and run add sub author function
        $paper = new Paper();

        $result = $paper->addSub($title, $username, $sub);

        return $result;

    }

    function getAuthorLogin() {

        // Check if user is login and store its username
        if(isset($_SESSION['user'])) {
            $username = $_SESSION['user']->getUsername();
        }

        return $username;
        
    }

}

?>
