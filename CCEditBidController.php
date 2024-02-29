<?php
include("UserClass.php");

class CCEditBidController{

    function acceptBid($paper_id, $reviewer){

        //creates a new Paper object
        $bid = new Paper();

        //creates a new User object
        $user = new User();

        $workload = $user->getWorkload($reviewer);
        $workloadRow = $workload->fetch_assoc();

        if ($workloadRow["current_workload"] < $workloadRow["max_workload"]){

             //calls the updateBidStatus() function in Paper class
            $bool = $bid->updateBidStatus($paper_id, $reviewer, "Accepted");

            //calls the updateBidStatus() function in Paper class
            $user->incrementWorkload($reviewer);

            return $bool;

        }
        else{

            return false;
            
        }

    }

    function rejectBid($paper_id, $reviewer){

        //creates a new Paper object
        $bid = new Paper();

        //calls the updateBidStatus() function in Paper class
        $bool = $bid->updateBidStatus($paper_id, $reviewer, "Rejected");

        return $bool;

    }

}

?>
