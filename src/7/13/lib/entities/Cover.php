<?php
declare( strict_types=1 );
namespace lib\entities;

class Cover
{
    protected $_filename;
    protected $_alt;

    public function __construct(
        string $filename,
        string $alt = ""
    )
    {
        $this->_filename = $filename;
        $this->_alt = $alt;
    }

    public function getListImgAttributes(): array
    {
        return [
            'src' => './images/' . $this->filename . '.jpg',
            'alt' => htmlspecialchars( $this->_alt )
        ];
    }

    public function getSingleImgAttributes(): array
    {
        return [
            'src' => './images/' . $this->filename . '.jpg',
            'alt' => htmlspecialchars( $this->_alt )
        ];
    }

    public function getImgTag( array $attrs ): string
    {
        $img_tag_prepare[] = '<img ';

        foreach ($attrs as $key => $attr) {
            $img_tag_prepare[] = $key.'="'.$attr.'" ';
        }

        $img_tag_prepare[] = '/>';

        $img_tag = implode('', $img_tag_prepare);
        return $img_tag;
    }
}