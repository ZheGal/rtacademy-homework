<?php

namespace Level1\Level2\Level3
{
    const TEST_NUMBER = 1;
    
    class TestClass
    {
    }
}

namespace Level1\Level2
{
    const TEST_NUMBER = 2;

    class TestClass
    {
    }

    function strlen(string $var): int
    {
        return \strlen($var);
    }
}
