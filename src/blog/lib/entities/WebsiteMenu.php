<?php
namespace lib\entities;

class WebsiteMenu
{
    private int $_id;
    private string $_title;
    private string $_href;

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        $this->_id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->_title;
    }

    public function setTitle(string $title)
    {
        $this->_title = $title;
        return $this;
    }

    public function getHref(): string
    {
        $index = [null, false, '/', ''];
        $href = $this->_href;
        $result = ( !in_array($href, $index) ) ? $href : 'index';
        return "/blog/{$result}.php";
    }

    public function setHref(string $href)
    {
        $this->_href = $href;
        return $this;
    }
}