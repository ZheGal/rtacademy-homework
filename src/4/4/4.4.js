let num = 10;

// num = 1;
// num = -1;
// num = 0;

let resultSign = '+';

if ( num < 0) {
    resultSign = '-';
} else if ( num == 0 ) {
    resultSign = '0';
}

console.log( num, resultSign );