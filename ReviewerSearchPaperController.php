<?php

class ReviewerSearchPaperController{

  //Dropdown
  function getAuthors(){

    //creates a new User object
    $authors = new User();

    //calls the getProfiles() function in User class
    $data = $authors->getProfiles("Author");

    return $data;

  }

  //Search button
  function getSearchPaper($title, $author) {

    $username = $_SESSION["user"]->getUsername();

    //creates a new Paper object
    $searchAssigned = new Review();

    //calls the getSearchPaper() function in Paper Class
    $data = $searchAssigned->searchAssignedPaper($title, $author, $username);

    return $data;

  }
  
}

?>
