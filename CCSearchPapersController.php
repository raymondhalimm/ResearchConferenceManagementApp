<?php
include("UserClass.php");

class CCSearchPapersController{

  function getAuthors(){

    //creates a new User object
    $authors = new User();

    //calls the getProfiles() function in User class
    $data = $authors->getProfiles("Author");

    return $data;

  }

  function getSearchPaper($title, $author){

    //creates a new Paper object
    $papers = new Paper();

    //calls the getSearchPaper() function in Paper Class
    $data = $papers->searchPaperBids($title, $author);

    return $data;

  }

}

?>
