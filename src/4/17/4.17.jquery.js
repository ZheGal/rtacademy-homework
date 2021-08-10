// jQuery

$.ajax(
    {
        'method': 'GET',
        'url': 'https://zhegal.g2.rtacademy.net/countries.json',
        'dataType': 'json',
        'success': function( jsonContents )
        {
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
        },
        'error': function( jqXHR, textStatus, errorThrown )
        {
            console.error( textStatus );
        }
    }
)