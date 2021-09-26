function getSign( num ) {
    let sign = '';
    switch (true)
    {
        case ( num < 0 ):
            sign = '-';
            break;
        case ( num > 0 ):
            sign = '+';
            break;
    }
    return sign;
}

let sign = getSign( 2048 );

console.log( sign );
