<?php
// To retreive available bids
include("ReviewerViewBidController.php");
// To create new bids for papers
include("ReviewerCreateBidController.php");
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Reviewer.css">

<?php

    // Create new view bid constructor
    $view = new ReviewerViewBidController();

    // For error handling of creating new bids
    $bool = true;

    // Get the list of papers that the user has not already bid for
    $resultset = $view->viewAvailBids();

    // If a bid button is clicked for a specific paper
    if(isset($_POST["bidButton"])){

        // Create new controller instance for creating a new bid
        $create = new ReviewerCreateBidController();

        // Create a new bid for the user using the ID of the chosen paper
        $bool = $create->newBid($_POST["bidButton"]);

        // If a bid is successfully made, refresh the page so the paper that you have just bid for does not show up again
        if ($bool == true){
            header("Location:ReviewerViewBidBoundary.php");
        }

    }

?>

    <p>
		<form method="" action="Reviewer.php">
		<button class="homepageButton">HOME</button>
		</form>
	</p>


    <div class="mid">

        <?php
        
            //If there is anything wrong with the bid, display error message, but should not be possible
            if ($bool == false){

                echo "<div class='alert alert-danger fade in' align='center'>";
                echo "Unable to bid.</div>";

            }
        
        ?>

        <!-- Create the whole page as a form -->
        <form method="post" action="">
        <table>

            <tr>
                <!-- Textfield and button for search function -->
                <td colspan="2" class="homepage_buttons"><input type="text" class="text_box" name="search" placeholder="Title"></td>
                <td class="homepage_buttons"><button class="button" name="searchButton" type="submit">SEARCH</button></td>
            </tr>

            <tr>
                <!-- Headers for the table -->
                <th class="homepage_buttons">Title</th>
                <th class="homepage_buttons">Author</th>
                <th class="homepage_buttons"></th>
            </tr>

            <?php
                // While there are still rows of papers available to bid for
                while($row = $resultset->fetch_assoc()){
            ?>

                    <tr>
                        <!-- Display title of paper and name of author -->
                        <td class="homepage_buttons"><?php echo $row["title"]; ?></td>
                        <td class="homepage_buttons"><?php echo $row["name"]; ?></td>
                        <!-- Create a button that holds the value of the paper ID for that row -->
                        <td class="homepage_buttons"><button class="button" name="bidButton" type="submit" value=<?php echo $row["paper_id"]; ?>>BID</button></td>
                    </tr>

            <?php } ?>

        </table>
        </form>

    </div>

</html>