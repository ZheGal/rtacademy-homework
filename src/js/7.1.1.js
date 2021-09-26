const time = () => {
    let block = document.getElementById('time')
    let date = new Date()

    let day = ("0" + (date.getDate())).slice(-2)
    let month = ("0" + (date.getMonth() + 1)).slice(-2)
    let year = date.getFullYear()
    let hours = ("0" + (date.getHours())).slice(-2)
    let mins = ("0" + (date.getMinutes())).slice(-2)
    let sec = ("0" + (date.getSeconds())).slice(-2)

    block.innerText = `${day}.${month}.${year} ${hours}:${mins}:${sec}`
    setTimeout(time, 1000)
}

time()