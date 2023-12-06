const muteButton = document.getElementById('muteButton');
const video = document.getElementById('youtubeVideo');
const fullscreenButton = document.querySelector('.buttons button:nth-child(4)');
const tools = document.querySelectorAll('.tool');
const lo_fiButton = document.getElementById('youtube');
const tool1 = document.getElementById('tool1');
const mindfulnessButton = document.getElementById('mindfulness');
const tool2 = document.getElementById('tool2');
const calendarButton = document.getElementById('calendar');
const tool3 = document.getElementById('tool3');
const pomodoroButton = document.getElementById('pomodoro');
const tool4 = document.getElementById('tool4');
const spotifyButton = document.getElementById('spotify');
const tool5 = document.getElementById('tool5');
const notebookButton = document.getElementById('notebook');
const tool6 = document.getElementById('tool6');
const taskButton = document.getElementById('task');
const tool7 = document.getElementById('tool7');

let isMuted = false;
let isFullscreen = false;
let isTool1Minimized = true;
let isTool2Minimized = true;
let isTool3Minimized = true;
let isTool4Minimized = true;
let intervalId;
let timeLeft = 25 * 60;
let timerRunning = false;
let isTool5Minimized = true;
let isTool6Minimized = true;
let isTool7Minimized = true;

function handleVisibilityChange() {
    var video = document.getElementById('youtubeVideo');
    if (document.hidden) {
        video.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    } else {
        video.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    }
}

document.addEventListener('visibilitychange', handleVisibilityChange, false);

muteButton.addEventListener('click', () => {
    if (isMuted) {
        video.src = video.src.replace('mute=1', 'mute=0');
        muteButton.style.backgroundImage = 'url(../public/assets/header-main/Mute.svg)';
        isMuted = false;
    } else {
        video.src = video.src.replace('mute=0', 'mute=1');
        muteButton.style.backgroundImage = 'url(../public/assets/header-main/Unmuted.svg)';
        isMuted = true;
    }
});

fullscreenButton.addEventListener('click', () => {
    if (!isFullscreen) {
        if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
            document.documentElement.webkitRequestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
            document.documentElement.msRequestFullscreen();
        }
        isFullscreen = true;
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
        isFullscreen = false;
    }
});

document.querySelector('.toggle-button').addEventListener('click', function() {
    var ferramentabar = document.querySelector('.ferramentabar');
    if (ferramentabar.style.height === '' || ferramentabar.style.height === '0px') {
      ferramentabar.style.height = '70px';
    } else {
      ferramentabar.style.height = '0';
    }
});

tools.forEach(tool => {
    let isDragging = false;
    let isResizing = false; // Adicionando uma flag para redimensionar, se necessário
    let offsetX, offsetY;

    tool.addEventListener('mousedown', e => {
        if (e.target.tagName.toLowerCase() === 'input' || e.target.tagName.toLowerCase() === 'textarea' || e.target.tagName.toLowerCase() === 'select' || e.target.tagName.toLowerCase() === 'button' || e.target.tagName.toLowerCase() === 'a') {
            // Se o clique foi em um input ou textarea, não inicie o arrastar
            return;
        }

        e.preventDefault();
        isDragging = true;
        offsetX = e.clientX - tool.getBoundingClientRect().left;
        offsetY = e.clientY - tool.getBoundingClientRect().top;
    });

    tool.addEventListener('touchstart', e => {
        if (e.target.tagName.toLowerCase() === 'input' || e.target.tagName.toLowerCase() === 'textarea' || e.target.tagName.toLowerCase() === 'select' || e.target.tagName.toLowerCase() === 'button' || e.target.tagName.toLowerCase() === 'a') {
            // Se o toque foi em um input ou textarea, não inicie o arrastar
            return;
        }

        e.preventDefault();
        const touch = e.touches[0];
        offsetX = touch.clientX - tool.getBoundingClientRect().left;
        offsetY = touch.clientY - tool.getBoundingClientRect().top;
        isDragging = true;
    });

    document.addEventListener('mousemove', e => {
        if (!isDragging && !isResizing) return;

        const x = e.clientX - offsetX;
        const y = e.clientY - offsetY;

        tool.style.left = `${x}px`;
        tool.style.top = `${y}px`;
    });

    document.addEventListener('touchmove', e => {
        if (!isDragging && !isResizing) return;

        const touch = e.touches[0];
        const x = touch.clientX - offsetX;
        const y = touch.clientY - offsetY;

        tool.style.left = `${x}px`;
        tool.style.top = `${y}px`;
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
        isResizing = false;
    });

    document.addEventListener('touchend', () => {
        isDragging = false;
        isResizing = false;
    });
});

lo_fiButton.addEventListener('click', () => {
    if (isTool1Minimized) {
        tool1.style.width = '300px';
        tool1.style.height = '200px';
        tool1.style.border = '1px solid #CCC';
        isTool1Minimized = false;
        lo_fiButton.classList.add('active-button');
    } else {
        tool1.style.width = '0';
        tool1.style.height = '0';
        tool1.style.border = 'none';
        isTool1Minimized = true;
        lo_fiButton.classList.remove('active-button');
    }
});

mindfulnessButton.addEventListener('click', () => {
    if (isTool2Minimized) {
        tool2.style.width = '99.6%';
        tool2.style.height = '98.6%';
        tool2.style.border = '1px solid #CCC';
        tool2.style.display = 'flex';
        isTool2Minimized = false;
        mindfulnessButton.classList.add('active-button');
    } else {
        tool2.style.width = '0';
        tool2.style.height = '0';
        tool2.style.border = 'none';
        isTool2Minimized = true;
        mindfulnessButton.classList.remove('active-button');
    }
});

calendarButton.addEventListener('click', () => {
    if (isTool3Minimized) {
        tool3.style.width = '300px';
        tool3.style.height = '470px';
        tool3.style.border = '1px solid #CCC';
        isTool3Minimized = false;
        calendarButton.classList.add('active-button');
    } else {
        tool3.style.width = '0';
        tool3.style.height = '0';
        tool3.style.border = 'none';
        isTool3Minimized = true;
        calendarButton.classList.remove('active-button');
    }
});

pomodoroButton.addEventListener('click', () => {
    if (isTool4Minimized) {
        tool4.style.width = '300px';
        tool4.style.height = '155px';
        tool4.style.border = '1px solid #CCC';
        isTool4Minimized = false;
        pomodoroButton.classList.add('active-button');
    } else {
        tool4.style.width = '0';
        tool4.style.height = '0';
        tool4.style.border = 'none';
        isTool4Minimized = true;
        pomodoroButton.classList.remove('active-button');
    }
});

function updateTimerDisplay() {
    let minutes = Math.floor(timeLeft / 60);
    let seconds = timeLeft % 60;
    document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
    document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');
}

function startTimer() {
    intervalId = setInterval(function() {
        if (timeLeft > 0) {
            timeLeft--;
            updateTimerDisplay();
        } else {
            clearInterval(intervalId);
            timerRunning = false;
        }
    }, 1000);
}

document.getElementById('start').addEventListener('click', function() {
    if (!timerRunning) {
        timerRunning = true;
        startTimer();
    }
});

document.getElementById('pause').addEventListener('click', function() {
    if (timerRunning) {
        clearInterval(intervalId);
        timerRunning = false;
        document.getElementById('pause').textContent = 'Despausar';
    } else {
        timerRunning = true;
        startTimer();
        document.getElementById('pause').textContent = 'Pausar';
    }
});

document.getElementById('reset').addEventListener('click', function() {
    clearInterval(intervalId);
    timerRunning = false;
    document.getElementById('pause').textContent = 'Pausar';
    timeLeft = 25 * 60;
    updateTimerDisplay();
});

spotifyButton.addEventListener('click', () => {
    if (isTool5Minimized) {
        tool5.style.width = '300px';
        tool5.style.height = '155px';
        tool5.style.border = '1px solid #CCC';
        isTool5Minimized = false;
        spotifyButton.classList.add('active-button');
    } else {
        tool5.style.width = '0';
        tool5.style.height = '0';
        tool5.style.border = 'none';
        isTool5Minimized = true;
        spotifyButton.classList.remove('active-button');
    }
});

notebookButton.addEventListener('click', () => {
    if (isTool6Minimized) {
        tool6.style.width = '300px';
        tool6.style.height = '547px';
        tool6.style.border = '1px solid #CCC';
        isTool6Minimized = false;
        notebookButton.classList.add('active-button');
    } else {
        tool6.style.width = '0';
        tool6.style.height = '0';
        tool6.style.border = 'none';
        isTool6Minimized = true;
        notebookButton.classList.remove('active-button');
    }
});

taskButton.addEventListener('click', () => {
    if (isTool7Minimized) {
        tool7.style.width = '300px';
        tool7.style.height = '200px';
        tool7.style.border = '1px solid #CCC';
        isTool7Minimized = false;
        taskButton.classList.add('active-button');
    } else {
        tool7.style.width = '0';
        tool7.style.height = '0';
        tool7.style.border = 'none';
        isTool7Minimized = true;
        taskButton.classList.remove('active-button');
    }
});