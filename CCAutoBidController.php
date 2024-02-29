<?php
include("UserClass.php");
include("PaperClass.php");

Class CCAutoBidController{

    function autoAssign(){

        $paper = new Paper();
        $reviewer = new User();

        // get the list of pending bids
        $bids = $paper->getPendingBids();

        // while there are pending bids
        while ($bidrow = $bids->fetch_assoc()){

            // get the workload of the reviewer for that bid
            $workload = $reviewer->getWorkLoad($bidrow["username"]);
            $workloadrow = $workload->fetch_assoc();

            $status = "Rejected";

            // if the reviewer's current workload is less than max
            if ($workloadrow["current_workload"] < $workloadrow["max_workload"]){

                $status = "Accepted";

                // accept the bid
                $paper->updateBidStatus($bidrow["paper_id"], $bidrow["username"], $status);

                // increment the reviewer's current workload
                $reviewer->incrementWorkload($bidrow["username"]);

            }

            else{

                // else reject the bid
                $paper->updateBidStatus($bidrow["paper_id"], $bidrow["username"], $status);

            }

        }

    }

}

?>