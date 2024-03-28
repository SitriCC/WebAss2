<?php
class Post
{
    private $postID;
    private $userID;
    private $title;
    private $content;
    private $createdTime;
    private $updatedTime;

    /**
     * @param $postID
     * @param $userID
     * @param $title
     * @param $content
     * @param $createdTime
     * @param $updatedTime
     */
    public function __construct($postID, $userID, $title, $content, $createdTime, $updatedTime)
    {
        $this->postID = $postID;
        $this->userID = $userID;
        $this->title = $title;
        $this->content = $content;
        $this->createdTime = $createdTime;
        $this->updatedTime = $updatedTime;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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

    /**
     * @return mixed
     */
    public function getUpdatedTime()
    {
        return $this->updatedTime;
    }

    /**
     * @param mixed $updatedTime
     */
    public function setUpdatedTime($updatedTime)
    {
        $this->updatedTime = $updatedTime;
    }


}
?>