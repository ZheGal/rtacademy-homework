// XMLHttpRequest

let xhr = new XMLHttpRequest();
xhr.open( 'GET', 'https://zhegal.g2.rtacademy.net/countries.json' );
xhr.responseType = 'json';
xhr.send();

xhr.onload = function() {
    if ( xhr.status == 200 ) {
        let final = document.createElement( 'div' ),
            cnt = '',
            input = document.createElement( 'input' ),
            countries = document.createElement( 'datalist' );

        input.setAttribute( 'list', 'countries' );
        countries.id = 'countries';

        let result = Array.from( xhr.response );
        result.forEach(country => {
            cnt = document.createElement( 'option' );
            cnt.value = country.Name;
            countries.append( cnt );
        });

        final.append( input );
        final.append( countries );
        
        document.body.append( final );
    } else {
        console.error( 'Сталася помилка ' + xhr.status + ': ' + xhr.statusText )
    }
}

xhr.onerror = function() {
    console.error( 'Сталася помилка при виконанні запита до сервера' );
}