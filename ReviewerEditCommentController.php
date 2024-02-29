<?php

class ReviewerEditComment{

    //get comment
    function getComment($review_id, $username)
    {

        $review = new Review();

        //get the current users comments so that he can edit them
        $resultset = $review->getComment($review_id, $username);

        // Returns the result set
        return $resultset;

    }

    //edit comment
    function editComment($comment_id, $comment_content)
    {
        
        $review = new Review();

        $result = $review->updateComment($comment_id, $comment_content);

        return $result;

    }

}

?>