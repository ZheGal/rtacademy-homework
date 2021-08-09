// Fetch

(async function() {
    let response = await fetch( 'https://zhegal.g2.rtacademy.net/countries.json' );
    if( response.ok ) {
        let jsonContents = await response.json();
        
        let final = document.createElement( 'div' ),
            cnt = '',
            input = document.createElement( 'input' ),
            countries = document.createElement( 'datalist' );

        input.setAttribute( 'list', 'countries' );
        countries.id = 'countries';

        let result = Array.from( jsonContents );
        result.forEach(country => {
            cnt = document.createElement( 'option' );
            cnt.value = country.Name;
            countries.append( cnt );
        });

        final.append( input );
        final.append( countries );
        
        document.body.append( final );
    }
    else {
        console.error( 'Сталася помилка ' + response.status + ': ' + response.statusText );
    }
})();
