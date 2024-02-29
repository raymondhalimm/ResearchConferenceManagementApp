<?php
include("UserClass.php");
include("ReviewClass.php");
session_start();

class ReviewerViewAssignedPaperController{

    function ReviewerViewAssignedPaper(){

        $username = $_SESSION["user"]->getUsername();

        //creates a new ViewAssingedPaper object
        $assignedPapers = new Review();

        //calls the getAllPapers() function in Paper class
        $data = $assignedPapers->getAssignedPaper($username);

        return $data;

    }

}

?>