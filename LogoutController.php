<?php

class LogoutController{

    //on constructing a new LogoutController object
    function __construct(){

        //clears the variables stored in the session
        unset($_SESSION["user"]);

        //destroys the session
        session_destroy();

        //redirects to login page
        header("Location:index.php");

    }

}

?>