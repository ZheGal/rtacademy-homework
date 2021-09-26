<?php

namespace Level1\Level2;

// Неповні імена
new TestClass(); // Level1\Level2\TestClass
strlen('test1'); // Level1\Level2\strlen()

// Повні імена
new Level3\TestClass(); // Level1\Level2\Level3\TestClass
echo (Level3\TEST_NUMBER); // Level1\Level2\Level3\TEST_NUMBER

// Абсолютні імена
\Level1\Level2\strlen('test3'); // Level1\Level2\strlen
\strlen('test1'); // глобальна функція strlen()

echo (\Level1\Level2\Level3\TEST_NUMBER);
 // Level1\Level2\Level3\TEST_NUMBER