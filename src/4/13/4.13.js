let sum = ( x, y ) => ( x < y ) ? x + sum( x + 1, y ) : x;

console.log( sum( 1, 3 ) ); // 6
console.log( sum( 1, 10 ) ); // 55
console.log( sum( 100, 1000 ) ); // 495550
