<?php
namespace lib\entities;

abstract class User
{
    private int $_id;
    private string $_firstName;
    private string $_lastName;

    public function __construct() {}

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->_firstName;
    }
    
    public function setFirstName(string $firstName)
    {
        $this->_firstName = $firstName;
        return $this;
    }
    
    public function getLastName(): string
    {
        return $this->_lastName;
    }
    
    public function setLastName(string $lastName)
    {
        $this->_lastName = $lastName;
        return $this;
    }
}