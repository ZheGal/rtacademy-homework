const citySuffixes =
[
    'де', 'на', 'лез', 'ла', 'сюр',
];

function capitalize( cityName ) {
    return cityName
        .toLowerCase()
        .split( '-' )
        .map(
            ( chunk ) =>
            {
                if( citySuffixes.includes( chunk ) ) {
                    return chunk;
                }
                return chunk.substring( 0, 1 ).toUpperCase() + chunk.substring( 1 );
            }
        )
        .join( '-' );
}

console.log( capitalize('кИЇв') );
console.log( capitalize('нЬЮ-йорк') );
console.log( capitalize('лос-анджелес') );
console.log( capitalize('рІо-дЕ-жАнейРо') );
console.log( capitalize('фрАнуФУрт-На-мАйні') );
console.log( capitalize('сЕН-сатЮрнЕн-лЕз-АПт') );