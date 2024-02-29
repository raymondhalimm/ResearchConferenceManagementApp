<?php
include("UserClass.php");
session_start();

//Class to get the current max workload
class SetMaxWorkloadController{

    //The first function of the controller is to get the current max workload to display in the boundary
    function displayMaxWorkload(){

        //create new user entity object
        $user = new User();
        
        $username = $_SESSION["user"]->getUsername();

        //use the current reviewer's username to get their current max workload
        $result = $user->getWorkload($username);

        return $result;

    }
    

    //The second function of the controller is to update the max workload of the reviewer
    function updateMaxWorkload($max_workload){

        $user = new User();

        $username = $_SESSION["user"]->getUsername();

        //Use the current reviewer's posted max workload and username to update the database
        $result = $user-> setMaxWorkload($max_workload, $username);

        return $result;

    }

}

?>
