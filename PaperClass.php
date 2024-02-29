<?php

class Paper{

	private $conn = NULL;

	function __construct(){

		$sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

	}

	public function getPaperBids(){

		//Select data after joining paper and bid to get paper data and number of bids per paper
		$query= "SELECT p.paper_id, p.title, a.name, COUNT(b.paper_id) AS bids
						 FROM paper p LEFT JOIN bid b ON p.paper_id=b.paper_id
						 			JOIN accounts a ON p.username=a.username
						 WHERE p.paper_status = 'Pending'
						 AND b.bid_status = 'Pending'
						 GROUP BY p.paper_id";

		$result = $this->conn->query($query);

		return $result;

	}

	public function getPendingPapers(){

		$query= "SELECT p.paper_id, p.title, a.name
		FROM paper p JOIN accounts a ON p.username=a.username
		WHERE p.paper_status='Pending'";

		$result = $this->conn->query($query);

		return $result;

	}

	//returns result set of papers fiting the given search criteria
	public function searchPaperBids($title, $author) {

		//select all papers with titles like the given title only
		if($title != NULL && $author == NULL) {
			$query= "SELECT p.paper_id, p.title, a.name, COUNT(b.paper_id) AS bids
							 FROM paper p LEFT JOIN bid b ON p.paper_id=b.paper_id
							 	    JOIN accounts a ON p.username=a.username
							 WHERE p.paper_status = 'Pending'
							 AND b.bid_status = 'Pending'
							 AND p.title LIKE '%$title%'
							 GROUP BY p.paper_id";
		}

		//select all papers with given author name only
		else if($title == NULL && $author != NULL) {
			$query= "SELECT p.paper_id, p.title, a.name, COUNT(b.paper_id) AS bids
							 FROM paper p LEFT JOIN bid b ON p.paper_id=b.paper_id
							 			JOIN accounts a ON p.username=a.username
							 WHERE p.paper_status = 'Pending'
							 AND b.bid_status = 'Pending'
							 AND a.name LIKE '%$author%'
							 GROUP BY p.paper_id";
		}

		//select all papers fitting both the given title and author criteria
		else {
			$query= "SELECT p.paper_id, p.title, a.name, COUNT(b.paper_id) AS bids
						   FROM paper p LEFT JOIN bid b ON p.paper_id=b.paper_id
							 			JOIN accounts a ON p.username=a.username
							 WHERE p.paper_status = 'Pending'
							 AND b.bid_status = 'Pending'
							 AND p.title LIKE '%$title%'
							 AND a.name LIKE '%$author%'
							 GROUP BY p.paper_id";
		}

		$result = $this->conn->query($query);

		return $result;

	}

	public function searchPendingPapers($title, $author) {

		//select all papers with titles like the given title only
		if($title != NULL && $author == NULL) {
			$query= "SELECT p.paper_id, p.title, a.name
			FROM paper p JOIN accounts a ON p.username=a.username
			WHERE p.paper_status='Pending'
			AND p.title LIKE '%$title%'
			GROUP BY p.paper_id";
		}

		//select all papers with given author name only
		else if($title == NULL && $author != NULL) {
			$query= "SELECT p.paper_id, p.title, a.name
			FROM paper p JOIN accounts a ON p.username=a.username
			WHERE p.paper_status='Pending'
			AND a.name LIKE '%$author%'
			GROUP BY p.paper_id";
		}

		//select all papers fitting both the given title and author criteria
		else {
			$query= "SELECT p.paper_id, p.title, a.name
			FROM paper p JOIN accounts a ON p.username=a.username
			WHERE p.paper_status='Pending'
			AND p.title LIKE '%$title%'
			AND a.name LIKE '%$author%'
			GROUP BY p.paper_id";
		}

		$result = $this->conn->query($query);

		return $result;

	}

	public function addPaper($username, $title, $paper_status) {

		// Add Paper Query into database
		$query = "INSERT INTO paper (paper_id, username, title, paper_status) VALUES (NULL, '$username', '$title', '$paper_status')";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

	public function addSub($title, $username, $sub) {

		// Get the paper id using title and username
		$query = "SELECT paper_id FROM paper WHERE title = '$title' AND username = '$username'";

		$result = $this->conn->query($query);

		$row = $result->fetch_assoc();

		$id = $row['paper_id'];

		// Add sub author query using paper id
		$query = "INSERT INTO co_author (paper_id, username) VALUES ('$id', '$sub')";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

	public function getAuthor($username) {

		// Get author excluding the user login username query
		$query = "SELECT * FROM accounts WHERE pname = 'Author' AND NOT username = '$username'";

		$result = $this->conn->query($query);

		return $result;

	}

	// This function is used by both view and search paper
	public function viewPaper($title, $username) {

		// Search for specific paper with title query
		// Trim title variable in case its just whitespace
		$title = trim($title);

		$query = "SELECT * FROM paper WHERE title LIKE '%$title%' AND username = '$username' ";

		$result = $this->conn->query($query);

		return $result;

	}

	// Get paper details using paper id
	public function getPaper($paper_id) {

		$query = "SELECT * FROM paper a
		JOIN accounts b on a.username=b.username
		WHERE paper_id='$paper_id'";

		$result = $this->conn->query($query);

		return $result;

	}

	// Edit paper title
	public function editPaper($paper_id, $newTitle) {

		$result = $this->getPaper($paper_id);

		$row = $result->fetch_assoc();

		// Check if new title is the same as old title
		if ($newTitle != $row['title']) {

			// Update query
			$query = "UPDATE paper SET title = '$newTitle' WHERE paper_id = '$paper_id' ";

			try{
				$this->conn->query($query);
			}
			catch(mysqli_sql_exception $e){
				return false;
			}

		}

		return true;

	}

	// Delete all sub author from a paper function
	public function deleteAllSub($paper_id) {

		$query = "DELETE FROM co_author WHERE paper_id = '$paper_id' ";

		$this->conn->query($query);

	}

	// Get sub author in the paper id
	public function getSub($paper_id) {

		$query = "SELECT username FROM co_author WHERE paper_id = '$paper_id' ";

		$result = $this->conn->query($query);

		return $result;

	}

	// Gets the list of pending papers that have not been bid on by the reviewer yet
	public function getAvailBids($username){

		$query = "SELECT a.paper_id, a.title, b.name FROM paper a JOIN accounts b on a.username = b.username WHERE paper_status = 'pending' AND paper_id NOT IN (SELECT paper_id from bid WHERE username = '$username')";

		$result = $this->conn->query($query);

		return $result;

	}

	// Creates a new bid for a specific paper, with the bid status as "Pending" by default
	public function createBid($paper_id, $username){

		$query = "INSERT INTO bid VALUES ('$paper_id', '$username', 'Pending')";

		if ($result = $this->conn->query($query)){

			return true;

		}

		return false;

	}

	//returns title of given paper_id
	public function getTitle($paper_id){

		$query = "SELECT title FROM paper WHERE paper_id='$paper_id'";

		$result = $this->conn->query($query);

		return $result;

	}

	// Return review of a specific paper
	public function getReview($paper_id){

		$query = "SELECT * FROM review a
		JOIN accounts b ON a.username=b.username
		WHERE paper_id='$paper_id'";

		$result = $this->conn->query($query);

		return $result;

	}

	// Return comments of specific review
	public function getComments($review_id) {

		$query = "SELECT * FROM comment WHERE review_id = '$review_id' ";

		$result = $this->conn->query($query);

		return $result;

	}

	public function getAllBiders($paper_id) {

		//Select data after joining paper and bid to get paper data and number of bids per paper
		$query = "SELECT a.name, w.username, w.current_workload, w.max_workload
				FROM bid b JOIN workload w
					ON b.username=w.username
				JOIN paper p
					ON b.paper_id=p.paper_id
				JOIN accounts a
					ON a.username=w.username
				WHERE p.paper_id = '$paper_id'
				AND b.bid_status = 'Pending'";
				

		$result = $this->conn->query($query);

		return $result;

	}

	public function deleteBid($paper_id, $reviewer) {

		$query = "DELETE FROM bid WHERE paper_id='$paper_id' AND username='$reviewer'";

		$result = $this->conn->query($query);

		return $result;

	}

	public function updateBidStatus($paper_id, $reviewer, $status) {

		$query = "UPDATE bid SET bid_status='$status' WHERE paper_id='$paper_id' AND username='$reviewer'";

		$result = $this->conn->query($query);

		return $result;

	}

	// gets all the bids that are currently pending
	public function getPendingBids(){

		$query = "SELECT * FROM bid WHERE bid_status = 'Pending'";

		$result = $this->conn->query($query);

		return $result;

	}

	// gets all the bids that fit search criteria
	public function getSearchBids($paper_id, $reviewer){

		$query = "SELECT a.name, w.username, w.current_workload, w.max_workload
				FROM bid b JOIN workload w
					ON b.username=w.username
				JOIN paper p
					ON b.paper_id=p.paper_id
				JOIN accounts a
					ON a.username=w.username
				WHERE p.paper_id = '$paper_id'
				AND a.name LIKE '%$reviewer%'
				AND b.bid_status = 'Pending'";

		$result = $this->conn->query($query);

		return $result;

	}


	// Update paper status
	public function updatePaperStatus($status, $paper_id) {
		
		$query = "UPDATE paper SET paper_status = '$status' WHERE paper_id = '$paper_id'";
		
		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

}
