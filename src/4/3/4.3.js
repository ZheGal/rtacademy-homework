let a = 10,
    b = 20;

// variant 1
    a = a + b;
    b = a - b;
    a = a - b;

// variant 2 (array)
    // a = [a, b];
    // b = a[0];
    // a = a[1];

console.log( a, b ); // => 20, 10