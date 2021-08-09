function capitalize( cityName ) {
    let cityNameFirst = cityName[0].toUpperCase();
    let cityNameCapitalized = cityName.toLowerCase();
    cityNameCapitalized = cityNameFirst + cityNameCapitalized.substring( 1 );
    return cityNameCapitalized;
}

let cityNameCapitalized = capitalize('сЕН-сатЮрнЕн-лЕз-АПт');

console.log( cityNameCapitalized );