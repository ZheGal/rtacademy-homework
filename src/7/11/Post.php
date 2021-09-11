<?php
class Post implements ItemInterface
{
    private int $_id;
    private string $_title;
    private string $_alias;
    private string $_description;
    private Author $_author;
    private int $_publishDate;
    private Category $_category;
    private Cover $_cover;

    public function __construct()
    {
        
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId( int $id )
    {
        $this->_id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->_title;
    }

    public function setTitle( string $title )
    {
        $this->_title = $title;
        return $this;
    }

    public function getAlias(): string
    {
        return $this->_alias;
    }

    public function setAlias( string $alias )
    {
        $this->_alias = $alias;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->_description;
    }

    public function setDescription( string $desc )
    {
        $this->_description = $desc;
        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->_author;
    }

    public function setAuthor( Author $author )
    {
        $this->_author = $author;
        return $this;
    }

    public function getPublishDate(): string
    {
        return $this->_publishDate;
    }

    public function setPublishDate( string $date ) 
    {
        $this->_publishDate = strtotime( $date );
        return $this;
    }

    public function getCategory(): Category
    {
        return $this->_category;
    }

    public function setCategory( Category $category )
    {
        $this->_category = $category;
        return $this;
    }

    public function getCover(): Cover
    {
        return $this->_cover;
    }

    public function setCover( Cover $cover )
    {
        $this->_cover = $cover;
        return $this;
    }

    public function getUrl(): string
    {
        return "";
    }

}