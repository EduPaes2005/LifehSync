function embedVideo() {
    // Obter o valor da URL do vídeo do input
    var videoUrl = document.getElementById("videoUrl").value;

    // Construir a URL do vídeo com base na entrada do usuário
    var embedUrl = "https://www.youtube.com/embed/" + getVideoId(videoUrl) + "?version=3&autoplay=1&mute=0&loop=1&playlist=" + getVideoId(videoUrl) + "&controls=0&showinfo=0&rel=0&disablekb=1&modestbranding=1&fs=0&vq=hd2160&cc_load_policy=0&iv_load_policy=3";

    // Criar a tag iframe com a nova URL
    var iframe = document.createElement("iframe");
    iframe.width = "100%";
    iframe.height = "100%";
    iframe.src = embedUrl;
    iframe.frameBorder = "0";
    iframe.allow = "autoplay; fullscreen; encrypted-media";

    // Substituir o conteúdo do contêiner de vídeo com o novo iframe
    var videoContainer = document.getElementById("videoContainer");
    videoContainer.innerHTML = "";
    videoContainer.appendChild(iframe);
}

// Função auxiliar para extrair o ID do vídeo do URL do YouTube
function getVideoId(url) {
    // Extrair o ID do vídeo de diferentes formatos de URL do YouTube
    var regExp = /^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    var match = url.match(regExp);

    if (match && match[1]) {
        return match[1];
    } else {
        alert("URL do vídeo do YouTube inválida.");
        return null;
    }
}