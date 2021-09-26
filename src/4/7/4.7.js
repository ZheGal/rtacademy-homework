// for
console.log('=== First variant with \'for\' ===');

let result;

for (let i = 2; i <= 32; i+=2)
{
    result = i;

    switch (true)
    {
        case ( i % 4 == 0 && i % 10 == 0 ):
            result = '*^' + result;
            break;
        case ( i % 4 == 0 ):
            result = '*' + result;
            break;
        case ( i % 10 == 0 ):
            result = '^' + result;
            break;
    }

    console.log(result);
}

console.log("\n");

// while
console.log('=== Second variant with \'while\' ===');

let x = 2,
    resultX;

while ( x <= 32 )
{
    resultX = x;

    switch (true)
    {
        case ( x % 4 == 0 && x % 10 == 0 ):
            resultX = '*^' + resultX;
            break;
        case ( x % 4 == 0 ):
            resultX = '*' + resultX;
            break;
        case ( x % 10 == 0 ):
            resultX = '^' + resultX;
            break;
    }

    console.log(resultX);
    x+=2;
}