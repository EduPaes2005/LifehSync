const video = document.getElementById('youtubeVideo');
const muteButton = document.getElementById('muteButton');
const fullscreenButton = document.querySelector('.buttons button:nth-child(6)');
const tools = document.querySelectorAll('.tool');
const minimizeYoutube = [document.getElementById('youtube'), document.getElementById('minimize-iconYT')];
const tool1 = document.getElementById('tool1');
const mindfulnessButton = document.getElementById('mindfulness');
const tool2 = document.getElementById('tool2');
const calendarButton = document.getElementById('calendar');
const tool3 = document.getElementById('tool3');
const minimizePomodoro = [document.getElementById('pomodoro'), document.getElementById('minimize-iconPMD')];
const tool4 = document.getElementById('tool4');
const minimizeSpotify = [document.getElementById('spotify'), document.getElementById('minimize-iconSPT')];
const tool5 = document.getElementById('tool5');
const minimizeNotebook = [document.getElementById('notebook'), document.getElementById('minimize-iconNB'), document.getElementById('minimize-icon2NB'), document.getElementById('minimize-icon3NB'), document.getElementById('minimize-icon4NB')];
const tool6 = document.getElementById('tool6');
const minimizeNotepad = [document.getElementById('notepad'), document.getElementById('minimize-iconNP')];
const tool7 = document.getElementById('tool7');
const minimizeProfile = [document.getElementById('accountElement'), document.getElementById('minimize-iconAE')];
const accountElement = document.getElementById('accountElement');

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
let isAccountElementMinimized = true;

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
        muteButton.style.backgroundImage = 'url(../assets/header-main/Mute.svg)';
        isMuted = false;
    } else {
        video.src = video.src.replace('mute=0', 'mute=1');
        muteButton.style.backgroundImage = 'url(../assets/header-main/Unmuted.svg)';
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
      ferramentabar.style.height = '115px';
    } else {
      ferramentabar.style.height = '0';
    }
});

tools.forEach(tool => {
    let isDragging = false;
    let isResizing = false;
    let offsetX, offsetY;

    tool.addEventListener('mousedown', e => {
        if (e.target.tagName.toLowerCase() === 'input' || e.target.tagName.toLowerCase() === 'textarea' || e.target.tagName.toLowerCase() === 'select' || e.target.tagName.toLowerCase() === 'button' || e.target.tagName.toLowerCase() === 'a') {
            return;
        }

        e.preventDefault();
        isDragging = true;
        offsetX = e.clientX - tool.getBoundingClientRect().left;
        offsetY = e.clientY - tool.getBoundingClientRect().top;
    });

    tool.addEventListener('touchstart', e => {
        if (e.target.tagName.toLowerCase() === 'input' || e.target.tagName.toLowerCase() === 'textarea' || e.target.tagName.toLowerCase() === 'select' || e.target.tagName.toLowerCase() === 'button' || e.target.tagName.toLowerCase() === 'a') {
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

function toggleYoutube() {
    if (isTool1Minimized) {
        tool1.style.width = '300px';
        tool1.style.height = '200px';
        tool1.style.border = '1px solid #CCC';
        isTool1Minimized = false;
        minimizeYoutube.forEach(YTbutton => YTbutton.classList.add('active-button'));
    } else {
        tool1.style.width = '0';
        tool1.style.height = '0';
        tool1.style.border = 'none';
        isTool1Minimized = true;
        minimizeYoutube.forEach(YTbutton => YTbutton.classList.remove('active-button'));
    }
};

minimizeYoutube.forEach(YTbutton => YTbutton.addEventListener('click', toggleYoutube));

function embedVideo() {
    var videoUrl = document.getElementById("videoUrl").value;

    var embedUrl = "https://www.youtube.com/embed/" + getVideoId(videoUrl) + "?version=3&autoplay=1&mute=0&loop=1&playlist=" + getVideoId(videoUrl) + "&controls=0&showinfo=0&rel=0&disablekb=1&modestbranding=1&fs=0&vq=hd2160&cc_load_policy=0&iv_load_policy=3";

    var iframe = document.createElement("iframe");
    iframe.id = "youtubeVideo";
    iframe.width = "100%";
    iframe.height = "100%";
    iframe.src = embedUrl;
    iframe.frameborder = "0";
    iframe.allow = "autoplay; fullscreen; encrypted-media";

    var videoContainer = document.getElementById("videoContainer");
    videoContainer.innerHTML = "";
    videoContainer.appendChild(iframe);
}

function getVideoId(url) {
    var regExp = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    var match = url.match(regExp);

    if (match && match[1]) {
        return match[1];
    } else {
        alert("URL de vídeo do YouTube Inválida!");
        return null;
    }
}

mindfulnessButton.addEventListener('click', () => {
    if (isTool2Minimized) {
        tool2.style.width = '99.6%';
        tool2.style.height = '99.5%';
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

function togglePomodoro() {
    if (isTool4Minimized) {
        tool4.style.width = '300px';
        tool4.style.height = '155px';
        tool4.style.border = '1px solid #CCC';
        isTool4Minimized = false;
        minimizePomodoro.forEach(PMDbutton => PMDbutton.classList.add('active-button'));
    } else {
        tool4.style.width = '0';
        tool4.style.height = '0';
        tool4.style.border = 'none';
        isTool4Minimized = true;
        minimizePomodoro.forEach(PMDbutton => PMDbutton.classList.remove('active-button'));
    }
};

minimizePomodoro.forEach(PMDbutton => PMDbutton.addEventListener('click', togglePomodoro));

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
        // document.getElementById('pause').textContent = 'Despausar';
    } else {
        timerRunning = true;
        startTimer();
        // document.getElementById('pause').textContent = 'Pausar';
    }
});

document.getElementById('reset').addEventListener('click', function() {
    clearInterval(intervalId);
    timerRunning = false;
    // document.getElementById('pause').textContent = 'Pausar';
    timeLeft = 25 * 60;
    updateTimerDisplay();
});

function toggleSpotify() {
    if (isTool5Minimized) {
        tool5.style.width = '300px';
        tool5.style.height = '155px';
        tool5.style.border = '1px solid #CCC';
        isTool5Minimized = false;
        minimizeSpotify.forEach(SPTbutton => SPTbutton.classList.add('active-button'));
    } else {
        tool5.style.width = '0';
        tool5.style.height = '0';
        tool5.style.border = 'none';
        isTool5Minimized = true;
        minimizeSpotify.forEach(SPTbutton => SPTbutton.classList.remove('active-button'));
    }
};

minimizeSpotify.forEach(SPTbutton => SPTbutton.addEventListener('click', toggleSpotify));

function toggleNotebook() {
    if (isTool6Minimized) {
        tool6.style.width = '300px';
        tool6.style.height = '547px';
        tool6.style.border = '1px solid #CCC';
        isTool6Minimized = false;
        minimizeNotebook.forEach(NBbutton => NBbutton.classList.add('active-button'));
    } else {
        tool6.style.width = '0';
        tool6.style.height = '0';
        tool6.style.border = 'none';
        isTool6Minimized = true;
        minimizeNotebook.forEach(NBbutton => NBbutton.classList.remove('active-button'));
    }
};

minimizeNotebook.forEach(NBbutton => NBbutton.addEventListener('click', toggleNotebook));

function showNotebook() {
    document.getElementById('Notebook').style.display = 'flex';
    document.getElementById('addNotebook').style.display = 'none';
    document.getElementById('updateNotebook').style.display = 'none';
    document.getElementById('notebookSubject').style.display = 'none';
}

function showAddNotebook() {
    document.getElementById('Notebook').style.display = 'none';
    document.getElementById('addNotebook').style.display = 'flex';
    document.getElementById('updateNotebook').style.display = 'none';
    document.getElementById('notebookSubject').style.display = 'none';
}

function showUpdateNotebook() {
    document.getElementById('Notebook').style.display = 'none';
    document.getElementById('addNotebook').style.display = 'none';
    document.getElementById('updateNotebook').style.display = 'flex';
    document.getElementById('notebookSubject').style.display = 'none';
}

function showNotebookSubject() {
    document.getElementById('Notebook').style.display = 'none';
    document.getElementById('addNotebook').style.display = 'none';
    document.getElementById('updateNotebook').style.display = 'none';
    document.getElementById('notebookSubject').style.display = 'flex';
}

function toggleNotepad() {
    if (isTool7Minimized) {
        tool7.style.width = '300px';
        tool7.style.height = '200px';
        tool7.style.border = '1px solid #CCC';
        isTool7Minimized = false;
        minimizeNotepad.forEach(NPbutton => NPbutton.classList.add('active-button'));
    } else {
        tool7.style.width = '0';
        tool7.style.height = '0';
        tool7.style.border = 'none';
        isTool7Minimized = true;
        minimizeNotepad.forEach(NPbutton => NPbutton.classList.remove('active-button'));
    }
};

minimizeNotepad.forEach(NPbutton => NPbutton.addEventListener('click', toggleNotepad));

function toggleProfile() {
    if (isAccountElementMinimized) {
        accountElement.style.width = '400px';
        accountElement.style.height = '550px';
        accountElement.style.border = '1px solid #CCC';
        isAccountElementMinimized = false;
        minimizeProfile.forEach(AEbutton => AEbutton.classList.add('active-button'));
    } else {
        accountElement.style.width = '0';
        accountElement.style.height = '0';
        accountElement.style.border = 'none';
        accountElement.style.display = 'none';
        isAccountElementMinimized = true;
        minimizeProfile.forEach(AEbutton => AEbutton.classList.remove('active-button'));
    }
};

minimizeProfile.forEach(AEbutton => AEbutton.addEventListener('click', toggleProfile));