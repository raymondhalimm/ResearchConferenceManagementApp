<?php
include "AuthorViewPaperController.php";
include "AuthorSearchPaperController.php";
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="Author.css">

<?php

    $control = new AuthorViewPaperController();

    $username = $control->getAuthorLogin();
    $result = $control->viewPaper("", $username);

    if (isset($_POST["search"])){

        $control = new AuthorSearchPaperController();

        $result = $control->searchPaper($_POST["title"], $username);

    }

    if (isset($_POST["edit"])){
        $_SESSION["paper_id"] = $_POST["edit"];
        header("Location:AuthorEditPaperBoundary.php");
    }

    if (isset($_POST["view"])){
        $_SESSION["paper_id"] = $_POST["view"];
        header("Location:AuthorViewReviewsBoundary.php");
    }

?>

    <p>
        <form method="" action="Author.php">
        <button class="homepageButton">HOME</button>
        </form>
    </p>

    <div class="mid">

        <form method="post" action="">
        <table>

            <tr><th class="homepage_buttons" colspan="4">View Submitted Papers</th></tr>

            <tr>
                <td class="homepage_buttons" colspan="3"><input type="text" class="text_box" name="title" placeholder="Search Title"></td>
                <td class="homepage_buttons"><input type="submit" class="button" name="search" value="SEARCH"></td>
            </tr>

            <tr>
                <th class="homepage_buttons" colspan="2">Paper Title</th>
                <th class="homepage_buttons">Status</th>
                <th class="homepage_buttons"></th>
            </tr>

            <?php while ($row = $result->fetch_assoc()){ ?>

                <tr>

                    <td class="homepage_buttons" colspan="2"><?php echo $row["title"]; ?></td>
                    <td class="homepage_buttons"><?php echo $row["paper_status"]; ?></td>
                    <td class="homepage_buttons">
                        <button class="button" name="edit" type="submit" value=<?php echo $row["paper_id"]; ?>>Edit Paper</button>
                        <button class="button" name="view" type="submit" value=<?php echo $row["paper_id"]; ?>>View Reviews</button>
                    </td>

                </tr>

            <?php } ?>

        </table>
        </form>

    </div>

</body>

</html>