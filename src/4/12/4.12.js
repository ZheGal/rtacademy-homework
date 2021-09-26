function parseCSV( data ) {
    let result = [];
    let rows = data
        .split(`\n`)
        .filter( item => item != "");
    
    if (rows.length > 0) {
        rows.forEach( item => result.push( pushCSVitem(item) ) );
    }

    return result;
}

function pushCSVitem( item ) {
    let array = item.split( `,` );
    let result = {
        "city": array[0],
        "latitude": parseFloat(array[1]),
        "longitude": parseFloat(array[2]),
        "country": array[3],
        "population": parseInt(array[4])
    };

    return result;
}

let csvFileContent = `
Kyiv,50.4334,30.5166,Ukraine,2709000
Kharkiv,50.0000,36.2500,Ukraine,1461000
Dnipro,48.4800,35.0000,Ukraine,1050000
Odesa,46.4900,30.7100,Ukraine,991000
Donets’k,48.0000,37.8300,Ukraine,988000
L’viv,49.8350,24.0300,Ukraine,803880
Zaporizhzhya,47.8573,35.1768,Ukraine,788000
Kryvyy Rih,47.9283,33.3450,Ukraine,652380
Mykolayiv,46.9677,31.9843,Ukraine,510840
`;

// повний вміст для змінної csvFileContent
// краще взяти з файла звідси
// https://rtacademy.net/cities.csv
// ваш код пишіть тут

console.log( parseCSV( csvFileContent ) );