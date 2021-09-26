function getRandomInt( min, max ) {
    return Math.floor( Math.random() * ( max - min + 1) ) + min;
}

let randomInt = getRandomInt( 1, 100 );

console.log( 'Випадкове число: ' + randomInt );
