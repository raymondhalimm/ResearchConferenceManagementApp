<?php

class SASearchProfileController{

    function searchProfile(){

        //creates a new Profile object
        $profile = new Profile();

        //calls the searchProfile() function in Profile class
        $data = $profile->searchProfile();

        return $data;

    }

}

?>