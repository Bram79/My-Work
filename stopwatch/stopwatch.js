const startStop = document.getElementById("startStop");
const display = document.getElementById("display");
const lightBtn = document.getElementById("lightBtn");

let timer = null;
let startTime = 0;
let elapsedTime = 0;
let isRunning = false;

function initialize(){
    startStop.textContent = "Start / stop";
        startStop.classList.remove("stop");
        startStop.classList.add("start");
    }
    


function lightOn(){
    if (document.body.classList.contains("dark-mode")) {
        document.body.classList.remove("dark-mode");
        document.body.classList.add("light-mode");
        lightBtn.textContent = "Darkmode";
        lightBtn.classList.remove("dark-mode");
        localStorage.setItem("darkMode", "false");
    } else {
        document.body.classList.remove("light-mode");
        document.body.classList.add("dark-mode");
        lightBtn.textContent = "Lightmode";
        lightBtn.classList.add("dark-mode");
        localStorage.setItem("darkMode", "true");
    }
}


function startStopp() {

    if (!isRunning) {
        startTime = Date.now() - elapsedTime;
        timer = setInterval(update, 10);
        isRunning = true;

        startStop.textContent = "Stop";
        startStop.classList.remove("start");
        startStop.classList.add("stop");
    } else {
        clearInterval(timer);
        elapsedTime = Date.now() - startTime;
        isRunning = false;

        startStop.textContent = "Start";
        startStop.classList.remove("stop");
        startStop.classList.add("start");
    }
}

function reset() {
    clearInterval(timer);
    startTime = 0;
    elapsedTime = 0;
    isRunning = false;
    display.textContent = "00:00:00:00";

    startStop.textContent = "Start / stop";
        startStop.classList.remove("stop");
        startStop.classList.add("start");
}

function update() {

    const currentTime = Date.now();
    elapsedTime = currentTime - startTime;

    let hours = Math.floor(elapsedTime / (1000 * 60 * 60));
    let minutes = Math.floor(elapsedTime / (1000 * 60) % 60);
    let seconds = Math.floor(elapsedTime / 1000 % 60);
    let millieseconds = Math.floor(elapsedTime % 1000 / 10);

    hours = String(hours).padStart(2, "0");
    minutes = String(minutes).padStart(2, "0");
    seconds = String(seconds).padStart(2, "0");
    millieseconds = String(millieseconds).padStart(2, "0");

    display.textContent = `${hours}:${minutes}:${seconds}:${millieseconds}`;
}

window.onload = initialize;