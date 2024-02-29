<?php
include('AuthorAddPaperController.php');
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Author.css">

<?php

    // Create new controller object
    $control = new AuthorAddPaperController();

    // Get user profile usename
    $username = $control->getAuthorLogin();

    // Get author list in array format
    $authorlist= $control->getAuthor($username);

    $success = false;
    $error = false;

    // If form is submitted
    if(isset($_POST["submit"])) {

        // Run add paper function
        $title = $_POST["title"];

        if ($_POST["sub1"] == "-" || $_POST["sub1"] != "-" && $_POST["sub1"] != $_POST["sub2"] && $_POST["sub1"] != $_POST["sub3"]) {
            
            if ($_POST["sub2"] == "-" || $_POST["sub2"] != "-" && $_POST["sub2"] != $_POST["sub1"] && $_POST["sub2"] != $_POST["sub3"]) {
            
                if ($_POST["sub3"] == "-" || $_POST["sub3"] != "-" && $_POST["sub3"] != $_POST["sub1"] && $_POST["sub3"] != $_POST["sub2"]) {
            
                    if ($title != NULL){
                        $success = $control->addPaper($username, $title, "Pending");
                    }

                    if ($success){

                        if ($_POST["sub1"] != "-") {
                            $control->addSub($title, $username, $_POST["sub1"]);
                        }
                        if ($_POST["sub2"] != "-") {
                            $control->addSub($title, $username, $_POST["sub2"]);
                        }
                        if ($_POST["sub3"] != "-") {
                            $control->addSub($title, $username, $_POST["sub3"]);
                        }
                        
                    }
                    else{
                        $error = true;
                    }
            
                }
                else{
                    $error = true;
                }

            }
            else{
                $error = true;
            }
        
        }
        else{
            $error = true;
        }

    }


?>

    <p>
        <form method="" action="Author.php">
        <button class="homepageButton">HOME</button>
        </form>
    </p>

    <div class="mid">

    <?php

        if ($error == true){

            echo "<div class='alert alert-danger fade in' align='center'><strong>Error submitting new paper.</strong></div>";

        }

        if ($success == true){

            echo "<div class='alert alert-success' align='center'><strong>Paper submitted. Returning home.</strong></div>";
            header("refresh:3;url=Author.php");

        }

    ?>

    <form method="post" action="">
    <table>

        <tr><th class="homepage_buttons">Submit Paper</th></tr>

        <tr>
            <td class="homepage_buttons"><input class="text_box" type="text" name="title" placeholder="Paper Title"></td>
        </tr>

        <tr>
            <td class="homepage_buttons">
                <select class="dropdown" name="sub1">
                    <option>-</option>
                    <?php
                        // Display each author in the database excluding author logging in
                        foreach($authorlist as $author){ ?>
                            <option value=<?php echo $author['username']; ?> > <?php echo $author['name']; ?> </option>
                    <?php } ?> 
                </select>
            </td>
        </tr>

        <tr>
            <td class="homepage_buttons">
                <select class="dropdown" name="sub2">
                    <option>-</option>
                    <?php
                        // Display each author in the database excluding author logging in
                        foreach($authorlist as $author){ ?>
                            <option value=<?php echo $author['username']; ?> > <?php echo $author['name']; ?> </option>
                    <?php } ?> 
                </select>
            </td>
        </tr>

        <tr>
            <td class="homepage_buttons">
                <select class="dropdown" name="sub3">
                    <option>-</option>
                    <?php
                        // Display each author in the database excluding author logging in
                        foreach($authorlist as $author){ ?>
                            <option value=<?php echo $author['username']; ?> > <?php echo $author['name']; ?> </option>
                    <?php } ?> 
                </select>
            </td>
        </tr>

        <tr>
            <td class="homepage_buttons"><input type="submit" class="button" name="submit" value="SUBMIT"></td>
        </tr>

    </table>
    </form>

    </div>

</html>