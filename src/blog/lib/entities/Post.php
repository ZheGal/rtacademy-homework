<?php
namespace lib\entities;

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

    public function setId( int $id ) : void
    {
        $this->_id = $id;
    }

    public function getTitle(): string
    {
        return $this->_title;
    }

    public function setTitle( string $title ) : void
    {
        $this->_title = $title;
    }

    public function getAlias(): string
    {
        return $this->_alias;
    }

    public function setAlias( string $alias ) : void
    {
        $this->_alias = $alias;
    }

    public function getDescription(): string
    {
        return $this->_description;
    }

    public function setDescription( string $desc ) : void
    {
        $this->_description = $desc;
    }

    public function getAuthor(): Author
    {
        return $this->_author;
    }

    public function setAuthor( Author $author )
    {
        $this->_author = $author;
    }

    public function getPublishDate(): string
    {
        return $this->_publishDate;
    }

    public function setPublishDate( string $date ) 
    {
        $this->_publishDate = strtotime( $date );
    }

    public function getCategory(): Category
    {
        return $this->_category;
    }

    public function setCategory( Category $category )
    {
        $this->_category = $category;
    }

    public function getCover(): Cover
    {
        return $this->_cover;
    }

    public function setCover( Cover $cover ) : void
    {
        $this->_cover = $cover;
    }

    public function getUrl(): string
    {
        return "";
    }

}