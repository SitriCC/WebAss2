<?php
class blog
{
    private $blogID;
    private $userID;
    private $title;
    private $content;
    private $imageUrl;
    private $createdTime;
    private $comment;
    //user is a property to hold author's info
    public $user;

    /**
     * @param $blogID
     * @param $userID
     * @param $title
     * @param $content
     * @param $createdTime
     * @param $comment
     */
    public function __construct($blogID, $title, $content, $imageUrl, $createdTime, $comment = null)
    {

        if ($blogID !== null) {
            $this->blogID = $blogID;
        }
        $this->title = $title;
        $this->content = $content;
        $this->imageUrl = $imageUrl;
        $this->createdTime = $createdTime;
        if ($comment !== null) {
            $this->comment = $comment;
        }
    }

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
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param mixed $imageUrl
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $updatedTime
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }






}
?>