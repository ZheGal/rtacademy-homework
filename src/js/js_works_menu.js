
(async function() {
    let menuUrl = 'https://zhegal.g2.rtacademy.net/js_works_menu.json';
    let response = await fetch( menuUrl );
    if( response.ok ) {
        let jsonContents = await response.json();

        if (Array.from( jsonContents ).length != 0) {
            let list = document.createElement('ul'),
                line = document.createElement('hr');
                list.classList.add('menu_list');
                
            list.append(line);
                
            Array.from( jsonContents ).forEach( item => {
                let listItem = document.createElement( 'li' );
                let link = document.createElement( 'a' );
                    link.href = '/' + item.link;
                    link.innerHTML = item.text;
                listItem.append(link);
                list.append(listItem);
            });

            document.body.append( list );
        }
    }
    else {
        console.error( 'Сталася помилка ' + response.status + ': ' + response.statusText );
    }
})();
