<?php
include("ProfilesClass.php");

class SAViewUserProfileController{

    function viewProfiles(){

        //creates a new Profile object
        $profile = new Profile();

        //calls the getAllPapers() function in Paper class
        $data = $profile->getAllProfiles();

        return $data;

    }
    
}

?>
