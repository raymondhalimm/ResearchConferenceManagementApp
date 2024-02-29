<?php
include("CCAutoBidController.php");
?>

<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="CC.css">

<?php

    $controller = new CCAutoBidController();

    // if yes, auto assign the papers
    if (isset($_POST["yes"])){

        $controller->autoAssign();

        header("Location:CC.php");

    }

    // if no, go back to home page
    if (isset($_POST["no"])){

        header("Location:CC.php");

    }

?>

    <p>
        <form method="" action="CC.php">
        <button class="homepageButton">HOME</button>
        </form>
    </p>

    <div class="mid">

        <!-- Simple yes or no to auto assign the papers -->
        <form method="post" action="">
        <table>

            <tr>
                <th colspan="2" class="homepage_buttons">Automatically assign all pending bids?</th>
            </tr>

            <tr>
                <td class="homepage_buttons">
                    <button class="button" name="yes" type="submit">Yes</button>
                </td>
                <td class="homepage_buttons">
                    <button class="button" name="no" type="submit">No</button>
                </td>
            </tr>

        </table>
        </form>

    </div>

</html>