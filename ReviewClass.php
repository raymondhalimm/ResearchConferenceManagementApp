<?php

class Review{

  private $conn = NULL;

	function __construct(){

		$sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

	}

  public function getAllBiders(){

	  //Select data after joining paper and bid to get paper data and number of bids per paper
    $query= "SELECT * FROM review JOIN workload JOIN paper GROUP BY max_workload";

		$result = $this->conn->query($query);

    return $result;

	}

	public function getAssignedPaper($username){

    $query = "SELECT p.paper_id, p.title, a.name
    FROM paper p JOIN accounts a on p.username=a.username
    WHERE p.paper_id IN (SELECT paper_id FROM bid WHERE username='$username' AND bid_status='Accepted')";

    $result = $this->conn->query($query);

    return $result;

	}

  public function searchAssignedPaper($title, $author, $username){

    if($title != NULL && $author == NULL) {
      $query = "SELECT p.paper_id, p.title, a.name
      FROM paper p JOIN accounts a on p.username=a.username
      WHERE p.paper_id IN (SELECT paper_id FROM bid WHERE username='$username' AND bid_status='Accepted')
      AND p.title LIKE '%$title%'";
    }

    //select all papers with given author name only
    else if($title == NULL && $author != NULL) {
      $query = "SELECT p.paper_id, p.title, a.name
      FROM paper p JOIN accounts a on p.username=a.username
      WHERE p.paper_id IN (SELECT paper_id FROM bid WHERE username='$username' AND bid_status='Accepted')
      AND a.name LIKE '%$author%'";
    }

    //select all papers fitting both the given title and author criteria
    else {
      $query = "SELECT p.paper_id, p.title, a.name
      FROM paper p JOIN accounts a on p.username=a.username
      WHERE p.paper_id IN (SELECT paper_id FROM bid WHERE username='$username' AND bid_status='Accepted')
      AND p.title LIKE '%$title%'
      AND a.name LIKE '%$author%'";
    }

    $result = $this->conn->query($query);

    return $result;

	}

	public function submitReview($paper_id, $username, $review_text, $review_rating){

		//Run query to insert
    $query = "INSERT INTO Review (paper_id, username, review_text, review_rating) VALUES ('$paper_id', '$username','$review_text','$review_rating')";
		
    try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

  }

  //Check if a user posted a review for a particular paper
  public function checkReview($paper_id, $username) {

    $query = "SELECT * FROM review WHERE paper_id='$paper_id' AND username='$username'";

    $result = $this->conn->query($query);

    return $result;

  }

  public function getReview($review_id) {

    $query = "SELECT * FROM review a
    JOIN accounts b ON a.username = b.username
    WHERE a.review_id='$review_id'";

    $result = $this->conn->query($query);

    return $result;

  }

  public function getAllReviews($paper_id){

    $query = "SELECT * FROM review a
    JOIN accounts b ON a.username = b.username
    WHERE paper_id='$paper_id'";

    $result = $this->conn->query($query);

    return $result;

  }

  //update review
  public function updateReview($this_review_id, $review_text, $review_rating) {

    $query = "UPDATE review SET review_text='$review_text', review_rating='$review_rating' WHERE review_id='$this_review_id'";

    $result = $this->conn->query($query);

    return $result;

  }

  //Function to get comments by review_id
  public function getReviewComments($review_id){

    $query = "SELECT * FROM comment a
    JOIN accounts b ON a.username = b.username
    WHERE a.review_id='$review_id'";

    $result = $this->conn->query($query);

    return $result;

  }

  public function getAuthor($username) {

		// Get author excluding the user login username query
		$query = "SELECT name FROM accounts WHERE pname = 'Author' AND NOT username = '$username' ";

		$result = $this->conn->query($query);

		return $result;

	}

  // Update author rating
  public function authorRating($review_id, $authorRate) {

    $query = "UPDATE review SET author_rating='$authorRate' WHERE review_id='$review_id' ";

		$this->conn->query($query);
    
  }

  public function addNewComment($review_id, $username, $comment_text)
  {

    $query = "INSERT INTO comment (comment_id, review_id, username, comment_text) VALUES (NULL, '$review_id', '$username', '$comment_text')";

    try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

  }

  public function getComment($review_id, $username)
  {

    $query = "SELECT comment_id, comment_text FROM comment WHERE username='$username' AND review_id='$review_id'";

    $result = $this->conn->query($query);

    return $result;

  }

  public function updateComment($comment_id, $comment_content)
  {

    $query = "UPDATE comment SET comment_text = '$comment_content' WHERE comment_id = '$comment_id'";

    try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

  }

}
