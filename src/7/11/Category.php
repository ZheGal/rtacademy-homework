<?php
class Category
{
    private int $_id;
    private string $_title;
    private string $_alias;

    public function __construct() {}

    public function getId(): int
    {
        return $this->$_id;
    }

    public function setId(int $id)
    {
        return $this;
    }

    public function getTitle(): string
    {
        return $this->$_title;
    }

    public function setTitle(string $title)
    {
        return $this;
    }

    public function getAlias(): string
    {
        return $this->$_alias;
    }

    public function setAlias(string $alias)
    {
        return $this;
    }

    public function getUrl(): string
    {
        return "";
    }
}