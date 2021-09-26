<?php
header("Content-type: text/plain");

abstract class SomeAbstractClass
{
    abstract protected function getValue() : int;

    public function display() : void
    {
        echo 'Значення ' . $this->getValue();
    }
}

class SomeClass extends SomeAbstractClass
{
    protected function getValue(): int
    {
        return random_int( 1, 999 );
    }
}

$some = new SomeClass();
$some->display();