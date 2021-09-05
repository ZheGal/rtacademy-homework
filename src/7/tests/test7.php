<?php

// Абстрактні класи. Приклад Post

abstract class Post
{
    protected string $_title;
    protected string $_content;
    protected array $_image;

    abstract public function getTitle() : string;
    abstract public function getImage() : array;
    abstract public function getContent() : string;
}

class TextPost extends Post
{
    public function getTitle(): string
    {
        return $this->_title;
    }

    public function getImage(): array
    {
        return $this->_image;
    }

    public function getContent(): string
    {
        return $this->_content;
    }
}