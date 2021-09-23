<?php
namespace lib\entities;

class Cover
{
    private $_filename;
    private $_alt;

    public function __construct(
        string $filename,
        string $alt
    )
    {
        $this->_filename = $filename;
        $this->_alt = $alt;
    }

    public function getImgAttributes(): array
    {
        return [
            'filename' => $this->_filename
        ];
    }

    public function getImgTag(): string
    {
        return $this->_alt;
    }
}