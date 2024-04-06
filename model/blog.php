<?php
class blog
{
    private $blogID;
    private $userID;
    private $title;
    private $content;
    private $createdTime;
    private $updatedTime;
    //user is a property to hold author's info
    public $user;

    /**
     * @param $blogID
     * @param $userID
     * @param $title
     * @param $content
     * @param $createdTime
     * @param $updatedTime
     */
    public function __construct($blogID, $title, $content, $createdTime, $updatedTime)
    {
        $this->blogID = $blogID;
        $this->title = $title;
        $this->content = $content;
        $this->createdTime = $createdTime;
        $this->updatedTime = $updatedTime;
    }



    /**
     * @param $blogID
     * @param $title
     * @param $content
     */


    /**
     * @param $blogID
     * @param $title
     * @param $content
     * @param $createdTime
     * @param $updatedTime
     * @param $user
     */
/*    public function __construct($blogID, $title, $content, $createdTime, $updatedTime, $user) {
        $this->blogID = $blogID;
        $this->title = $title;
        $this->content = $content;
        $this->createdTime = $createdTime;
        $this->updatedTime = $updatedTime;
        $this->user = $user; // user object
    }*/

    /**
     * @return mixed
     */
    public function getBlogID()
    {
        return $this->blogID;
    }

    /**
     * @param mixed $blogID
     */
    public function setBlogID($blogID)
    {
        $this->blogID = $blogID;
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