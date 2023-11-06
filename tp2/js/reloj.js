function updateHora() {
    const clock = document.getElementById('clock');
    const hourHand = document.getElementById('hourHand');
    const minuteHand = document.getElementById('minuteHand');
    const hora_txt = document.getElementById('hora_txt');
    
    const now = new Date();
    const hours = now.getHours() % 12;
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();
    
    const hourDegrees = (hours + minutes / 60) * 360 / 12;
    const minuteDegrees = (minutes + seconds / 60) * 360 / 60;
    
    hourHand.style.transform = `rotate(${hourDegrees}deg)`;
    minuteHand.style.transform = `rotate(${minuteDegrees}deg)`;

    hora_txt.innerText= hours != 0? hours :'00' +':'+ minutes +':'+seconds 
}

setInterval(updateHora, 1000);
updateHora();