<?php
include("AuthorEditPaperController.php");
session_start();
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Author.css">

<?php

    $paper_id = $_SESSION["paper_id"];

    // Create new controller object and get paper information with their id
    $control = new AuthorEditPaperController();
    $result = $control->getPaper($paper_id);
    $row = $result->fetch_assoc();

    // Get user profile usename
    $username = $control->getAuthorLogin();

    // Get author list in array format
    $authorlist= $control->getAuthor($username);

    // Get sub author of the paper
    $result = $control->getSub($paper_id);

    $i = 0;
    $subList = array();

    while ($rowSub = $result->fetch_assoc()){
        $subList[$i] = $rowSub["username"];
        $i++;
    }

    $success = false;
    $error = false;

    // Check if form is clicked
    if(isset($_POST['submit'])) {

        // Get the new title from the text input
        $newTitle = $_POST['title'];

        if ($_POST["sub1"] == "-" || $_POST["sub1"] != "-" && $_POST["sub1"] != $_POST["sub2"] && $_POST["sub1"] != $_POST["sub3"]) {
            
            if ($_POST["sub2"] == "-" || $_POST["sub2"] != "-" && $_POST["sub2"] != $_POST["sub1"] && $_POST["sub2"] != $_POST["sub3"]) {
            
                if ($_POST["sub3"] == "-" || $_POST["sub3"] != "-" && $_POST["sub3"] != $_POST["sub1"] && $_POST["sub3"] != $_POST["sub2"]) {
            
                    if ($newTitle != NULL){
                        $success = $control->editPaper($paper_id, $newTitle);
                    }

                    if ($success){

                        $control->deleteAllSub($paper_id);
                        
                        if ($_POST["sub1"] != "-") {
                            $control->addSub($newTitle, $username, $_POST['sub1']);
                        }
                        if ($_POST["sub2"] != "-") {
                            $control->addSub($newTitle, $username, $_POST['sub2']);
                        }
                        if ($_POST["sub3"] != "-") {
                            $control->addSub($newTitle, $username, $_POST['sub1']);
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

            echo "<div class='alert alert-danger fade in' align='center'><strong>Error updating paper.</strong></div>";

        }

        if ($success == true){

            echo "<div class='alert alert-success' align='center'><strong>Paper updated. Returning home.</strong></div>";
            header("refresh:3;url=Author.php");

        }

    ?>

    <form method="post" action="">
    <table>

        <tr><th class="homepage_buttons">Edit Paper</th></tr>

        <tr>
            <td class="homepage_buttons"><input class="text_box" type="text" name="title" value="<?php echo $row['title'] ;?>"></td>
        </tr>

        <tr>
            <td class="homepage_buttons">
                <select class="dropdown" name="sub1">
                    <option>-</option>
                    <?php
                        // Display each author in the database excluding author logging in
                        foreach($authorlist as $author){
                            if ($subList[0] == $author["username"]){
                                echo "<option selected='selected' value=".$author["username"].">".$author["name"]."</option>";
                            }
                            else{
                                echo "<option value=".$author["username"].">".$author["name"]."</option>";
                            }
                        }
                    ?> 
                </select>
            </td>
        </tr>

        <tr>
            <td class="homepage_buttons">
                <select class="dropdown" name="sub2">
                    <option>-</option>
                    <?php
                        // Display each author in the database excluding author logging in
                        foreach($authorlist as $author){
                            if ($subList[1] == $author["username"]){
                                echo "<option selected='selected' value=".$author["username"].">".$author["name"]."</option>";
                            }
                            else{
                                echo "<option value=".$author["username"].">".$author["name"]."</option>";
                            }
                        }
                    ?> 
                </select>
            </td>
        </tr>

        <tr>
            <td class="homepage_buttons">
                <select class="dropdown" name="sub3">
                    <option>-</option>
                    <?php
                        // Display each author in the database excluding author logging in
                        foreach($authorlist as $author){
                            if ($subList[2] == $author["username"]){
                                echo "<option selected='selected' value=".$author["username"].">".$author["name"]."</option>";
                            }
                            else{
                                echo "<option value=".$author["username"].">".$author["name"]."</option>";
                            }
                        }
                    ?> 
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