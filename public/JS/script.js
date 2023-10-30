const muteButton = document.getElementById('muteButton');
const video = document.getElementById('youtubeVideo');
const fullscreenButton = document.querySelector('.buttons button:nth-child(3)');
const tools = document.querySelectorAll('.tool');
const lo_fiButton = document.getElementById('lo-fi');
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
//Pomodoro - Elemento
let isTool4Minimized = true;
//Pomodoro - Função
let intervalId;
let timeLeft = 25 * 60;
let timerRunning = false;

let isTool5Minimized = true;
let isTool6Minimized = true;
let isTool7Minimized = true;

    // Função para verificar o estado de visibilidade da página
    function handleVisibilityChange() {
        var video = document.getElementById('youtubeVideo');

        // Se a página estiver oculta, pausar o vídeo, caso contrário, continuar tocando
        if (document.hidden) {
            video.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        } else {
            video.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
        }
    }

    // Adicionar um ouvinte de evento para verificar quando a visibilidade da página muda
    document.addEventListener('visibilitychange', handleVisibilityChange, false);

muteButton.addEventListener('click', () => {
    if (isMuted) {
        // Desmutar o vídeo
        video.src = video.src.replace('mute=1', 'mute=0');
        muteButton.style.backgroundImage = 'url(../public/assets/Mute.svg)'; // Altera a imagem de fundo para o botão de mute
        isMuted = false;
    } else {
        // Mutar o vídeo
        video.src = video.src.replace('mute=0', 'mute=1');
        muteButton.style.backgroundImage = 'url(../public/assets/Unmuted.svg)'; // Altera a imagem de fundo para o botão de desmute
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
      ferramentabar.style.height = '70px'; // Define a altura da barra de ferramentas quando visível
    } else {
      ferramentabar.style.height = '0';
    }
});

tools.forEach(tool => {
    let isDragging = false;
    let offsetX, offsetY;

    tool.addEventListener('mousedown', e => {
        e.preventDefault(); // Evita que o evento de toque seja acionado em alguns dispositivos móveis
        isDragging = true;
        offsetX = e.clientX - tool.getBoundingClientRect().left;
        offsetY = e.clientY - tool.getBoundingClientRect().top;
    });

    tool.addEventListener('touchstart', e => {
        e.preventDefault(); // Evita o comportamento padrão de toque, como o zoom da página
        const touch = e.touches[0];
        offsetX = touch.clientX - tool.getBoundingClientRect().left;
        offsetY = touch.clientY - tool.getBoundingClientRect().top;
        isDragging = true;
    });

    document.addEventListener('mousemove', e => {
        if (!isDragging) return;

        const x = e.clientX - offsetX;
        const y = e.clientY - offsetY;

        tool.style.left = `${x}px`;
        tool.style.top = `${y}px`;
    });

    document.addEventListener('touchmove', e => {
        if (!isDragging || e.touches.length !== 1) return;

        const touch = e.touches[0];
        const x = touch.clientX - offsetX;
        const y = touch.clientY - offsetY;

        tool.style.left = `${x}px`;
        tool.style.top = `${y}px`;
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
    });

    document.addEventListener('touchend', () => {
        isDragging = false;
    });
});

// Máximiza e Mínimiza
lo_fiButton.addEventListener('click', () => {
    if (isTool1Minimized) {
        // Maximizar a ferramenta
        tool1.style.width = '300px';
        tool1.style.height = '200px';
        tool1.style.border = '1px solid #CCC';
        isTool1Minimized = false;
        // Adicionar a classe de animação ao botão
        lo_fiButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool1.style.width = '0';
        tool1.style.height = '0';
        tool1.style.border = 'none';
        isTool1Minimized = true;
        // Remover a classe de animação do botão
        lo_fiButton.classList.remove('active-button');
    }
});

mindfulnessButton.addEventListener('click', () => {
    if (isTool2Minimized) {
        // Maximizar a ferramenta
        tool2.style.width = '300px';
        tool2.style.height = '200px';
        tool2.style.border = '1px solid #CCC';
        isTool2Minimized = false;
        // Adicionar a classe de animação ao botão
        mindfulnessButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool2.style.width = '0';
        tool2.style.height = '0';
        tool2.style.border = 'none';
        isTool2Minimized = true;
        // Remover a classe de animação do botão
        mindfulnessButton.classList.remove('active-button');
    }
});

calendarButton.addEventListener('click', () => {
    if (isTool3Minimized) {
        // Maximizar a ferramenta
        tool3.style.width = '300px';
        tool3.style.height = '470px';
        tool3.style.border = '1px solid #CCC';
        isTool3Minimized = false;
        // Adicionar a classe de animação ao botão
        calendarButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool3.style.width = '0';
        tool3.style.height = '0';
        tool3.style.border = 'none';
        isTool3Minimized = true;
        // Remover a classe de animação do botão
        calendarButton.classList.remove('active-button');
    }
});

pomodoroButton.addEventListener('click', () => {
    if (isTool4Minimized) {
        // Maximizar a ferramenta
        tool4.style.width = '300px';
        tool4.style.height = '200px';
        tool4.style.border = '1px solid #CCC';
        isTool4Minimized = false;
        // Adicionar a classe de animação ao botão
        pomodoroButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool4.style.width = '0';
        tool4.style.height = '0';
        tool4.style.border = 'none';
        isTool4Minimized = true;
        // Remover a classe de animação do botão
        pomodoroButton.classList.remove('active-button');
    }
});

//Função Pomodoro
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
        // Maximizar a ferramenta
        tool5.style.width = '300px';
        tool5.style.height = '200px';
        tool5.style.border = '1px solid #CCC';
        isTool5Minimized = false;
        // Adicionar a classe de animação ao botão
        spotifyButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool5.style.width = '0';
        tool5.style.height = '0';
        tool5.style.border = 'none';
        isTool5Minimized = true;
        // Remover a classe de animação do botão
        spotifyButton.classList.remove('active-button');
    }
});

notebookButton.addEventListener('click', () => {
    if (isTool6Minimized) {
        // Maximizar a ferramenta
        tool6.style.width = '300px';
        tool6.style.height = '200px';
        tool6.style.border = '1px solid #CCC';
        isTool6Minimized = false;
        // Adicionar a classe de animação ao botão
        notebookButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool6.style.width = '0';
        tool6.style.height = '0';
        tool6.style.border = 'none';
        isTool6Minimized = true;
        // Remover a classe de animação do botão
        notebookButton.classList.remove('active-button');
    }
});

taskButton.addEventListener('click', () => {
    if (isTool7Minimized) {
        // Maximizar a ferramenta
        tool7.style.width = '300px';
        tool7.style.height = '200px';
        tool7.style.border = '1px solid #CCC';
        isTool7Minimized = false;
        // Adicionar a classe de animação ao botão
        taskButton.classList.add('active-button');
    } else {
        // Minimizar a ferramenta
        tool7.style.width = '0';
        tool7.style.height = '0';
        tool7.style.border = 'none';
        isTool7Minimized = true;
        // Remover a classe de animação do botão
        taskButton.classList.remove('active-button');
    }
});