<?php
include("UserClass.php");

class CCSearchReviewedPapers{

  function getAuthors(){

    //creates a new User object
    $authors = new User();

    //calls the getProfiles() function in User class
    $data = $authors->getProfiles("Author");

    return $data;

  }

  function getSearchPaper($title, $author) {

    //creates a new Paper object
    $papers = new Paper();

    $data = $papers->searchPendingPapers($title, $author);

    return $data;

  }

}

?>
