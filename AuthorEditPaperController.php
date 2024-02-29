<?php
include("UserClass.php");
include("PaperClass.php");

class AuthorEditPaperController {

    // Call edit paper in the paper class
    function editPaper($paper_id, $newTitle) {

        $paper = new Paper();

        $result = $paper->editPaper($paper_id, $newTitle);

        return $result;

    }

    // Call get paper detailf function in the paper class
    function getPaper($paper_id) {
        
        $paper = new Paper();

        $result = $paper->getPaper($paper_id);

        return $result;

    }

    function getAuthor ($username) {

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

    // Call get sub author for the specific paper
    function getSub($paper_id) {

        $paper = new Paper();

        $result = $paper->getSub($paper_id);

        return $result;

    }

    // Call add sub author function in paper class
    function addSub($title, $username, $sub) {

        // Create new paper object and run add sub author function
        $paper = new Paper();

        $paper->addSub($title, $username, $sub);

    }

    // Call delete all sub author in the paper function in paper class
    function deleteAllSub($paper_id) {

        $paper = new Paper();

        $paper->deleteAllSub($paper_id);

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