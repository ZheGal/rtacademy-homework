<?php
declare(strict_types=1);
namespace lib\entities;

class Post implements ItemInterface
{
    protected int $_id;
    protected string $_title;
    protected string $_alias;
    protected string $_description;
    protected Author $_author;
    protected int $_publishDate;
    protected Category $_category;
    protected Cover $_cover;

    public function __construct() {}

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
        return date('j F Y', $this->_publishDate);
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
        return "./single.php?id={$this->_id}";
    }

}