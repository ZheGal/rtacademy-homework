let cityName = 'АнтанАнАрівУ';

let cityNameFirst = cityName[0].toUpperCase();
let cityNameCapitalized = cityName.toLowerCase();

// variant 1
// cityNameCapitalized = cityNameCapitalized.replace( cityNameCapitalized[0], cityNameFirst );

// variant 2
// cityNameCapitalized = cityNameFirst + cityNameCapitalized.substring( 1, cityNameCapitalized.length );
cityNameCapitalized = cityNameFirst + cityNameCapitalized.substring( 1 );

console.log( cityNameCapitalized );