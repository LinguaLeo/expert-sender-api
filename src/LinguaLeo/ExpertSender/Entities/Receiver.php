<?php
namespace LinguaLeo\ExpertSender\Entities;

use LinguaLeo\ExpertSender\ExpertSenderException;

class Receiver
{
    protected $email;
    protected $id;
    protected $listId;

    function __construct($email = null, $id = null, $listId = null)
    {
        if ($email == null && $id == null) {
            throw new ExpertSenderException("Email or id parameter required");
        }

        $this->email = $email;
        $this->id = $id;
        $this->listId = $listId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getListId()
    {
        if($this->listId == null) {
            return null;
        }

        return intval($this->listId);
    }

}