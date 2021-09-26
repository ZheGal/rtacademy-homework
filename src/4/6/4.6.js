let num = 10;

// num = 1;
// num = -1;
// num = 0;

let resultSign;

switch ( true )
{
    case ( num < 0 ):
        resultSign = '-';
        break;
    case ( num > 0 ):
        resultSign = '+';
        break;
    case ( num == 0 ):
        resultSign = '0';
        break;
}


console.log( num, resultSign );