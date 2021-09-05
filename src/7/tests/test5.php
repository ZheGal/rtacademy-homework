<?php
header("Content-type: text/plain");

class SimpleClass
{
    public string $var = 'Тест';

    public function displayVar()
    {
        echo $this->var;
    }
}

class ExtendClass extends SimpleClass
{
    public function displayVar()
    {
        echo "Розширений клас\n";

        parent::displayVar();
    }
}

$extended = new ExtendClass();

$extended->displayVar();
