let form = document.getElementsByTagName('form');

if (form.length != 0) {
    for (let i = 0; i < form.length; i++) {
        form[i].onsubmit = ( e => {
            e.preventDefault();
            
            let dateFrom = document.getElementById('datetime-from');
            let dateTo = document.getElementById('datetime-to');

            let fromSec = dateToSec(dateFrom.value);
            let toSec = dateToSec(dateTo.value);

            let difference = getDifference(fromSec, toSec);

            let text = `Різниця між ${dateToRead(dateFrom.value)} та  ${dateToRead(dateTo.value)} ${difference}`

            document.getElementById('result_text').innerHTML = text;

        });
    }
}

function dateToSec( date ) {
    let source = new Date(date);
    let result = Date.parse(source) / 1000;

    return result;
}

function getDifference( from, to ) {
    let text = '';
    let last = '';
    let arrayRes = [];
    let diffSec = (to - from),
        days = Math.floor(diffSec / 86400),
        hours = Math.floor((diffSec - (days * 86400)) / 3600),
        minutes = Math.floor((diffSec - (days * 86400) - (hours * 3600)) / 60);

        console.log(minutes);
    
    if (days == 0 && days == hours && days == minutes) {
        return 'відсутня. Дати однакові';
    }

    if (days != 0) {
        arrayRes.push(rightNumeric(days, ['день', 'дні', 'днів']))
    }
    if (hours != 0) {
        arrayRes.push(rightNumeric(hours, ['година', 'години', 'годин']))
    }
    if (minutes != 0) {
        arrayRes.push(rightNumeric(minutes, ['хвилина', 'хвилини', 'хвилин']))
    }
    
    if ( arrayRes.length != 1 ) {
        last = ' та ' + arrayRes.pop();
    }

    text = ` становить ${arrayRes.join(', ')}${last}`
    return text;
}

function dateToRead( date ) {
    let first = date.split('-');
    let second = first[2].split('T');
    let last = second[1].split(':');

    let result = `${second[0]}.${first[1]}.${first[0]} ${last[0]}:${last[1]}`
    let resultItem = document.createElement('span');
        resultItem.classList.add('blue_date');
    resultItem.innerHTML = result;
    
    return resultItem.outerHTML;
}

function rightNumeric( num, array ) {
    num = Math.abs(num) % 100;
    let n1 = num % 10;
    if (num > 10 && num < 20) { return `${num} ${array[2]}`; }
    if (n1 > 1 && n1 < 5) { return `${num} ${array[1]}`; }
    if (n1 == 1) { return `${num} ${array[0]}`; }
    return `${num} ${array[2]}`;
}