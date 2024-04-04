<?php
class PostBlog
{
    private $postBlogID;
    private $userID;
    private $title;
    private $content;
    private $createdTime;
    private $updatedTime;
    //User is a property to hold author's info
    public $user;

    /**
     * @param $postBlogID
     * @param $title
     * @param $content
     * @param $createdTime
     * @param $updatedTime
     * @param $user
     */
    public function __construct($postBlogID, $title, $content, $createdTime, $updatedTime, $user) {
        $this->postBlogID = $postBlogID;
        $this->title = $title;
        $this->content = $content;
        $this->createdTime = $createdTime;
        $this->updatedTime = $updatedTime;
        $this->user = $user; // User object
    }

    /**
     * @return mixed
     */
    public function getPostBlogID()
    {
        return $this->postBlogID;
    }

    /**
     * @param mixed $postBlogID
     */
    public function setPostBlogID($postBlogID)
    {
        $this->postBlogID = $postBlogID;
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

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }



}
?>