<?php
class comment{
    private $commentsID;
    private $postID;
    private $userID;
    private $lastName;
    private $comment;
    private $createdTime;

    /**
     * @param $commentsID
     * @param $postID
     * @param $userID
     * @param $lastName
     * @param $comment
     * @param $createdTime
     */
    public function __construct($commentsID, $postID, $userID, $lastName, $comment, $createdTime)
    {
        $this->commentsID = $commentsID;
        $this->postID = $postID;
        $this->userID = $userID;
        $this->lastName = $lastName;
        $this->comment = $comment;
        $this->createdTime = $createdTime;
    }

    /**
     * @return mixed
     */
    public function getCommentsID()
    {
        return $this->commentsID;
    }

    /**
     * @param mixed $commentsID
     */
    public function setCommentsID($commentsID)
    {
        $this->commentsID = $commentsID;
    }

    /**
     * @return mixed
     */
    public function getPostID()
    {
        return $this->postID;
    }

    /**
     * @param mixed $postID
     */
    public function setPostID($postID)
    {
        $this->postID = $postID;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param mixed $createdTime
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
    }


}
?>