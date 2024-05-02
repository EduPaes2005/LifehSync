var languageOptions = document.getElementById('language-options');
var ferramentaBar = document.querySelector('.ferramentabar');

function toggleLanguage() {
    if (languageOptions.style.display === 'none') {
        languageOptions.style.display = 'block';
        ferramentaBar.style.height = '111px';
    } else {
        languageOptions.style.display = 'none';
        ferramentaBar.style.height = '115px';
    }
}

function portugueseLang() {
    // Header-main
    document.getElementById('weather').innerHTML = "19°C";
    //ShareButton
    var button = document.getElementById('shareButton');
    button.addEventListener('click', function() {
        alertMessage = 'Sala sala foi copiada para a Área de Transferência';
    });
    // Youtube
    document.getElementById('labelYoutube').innerHTML = "URL do Vídeo do YouTube:";
    document.getElementById('videoUrl').setAttribute('placeholder', "Cole a URL do vídeo");
    document.getElementById('btnYoutube').innerHTML = "Incorporar Vídeo";
    //Mindfullness
    words[0] = 'Inspirar';
    words[1] = 'Expirar';
    // Calendar
    document.getElementById('calendarText').innerHTML = "Em breve...<br>Google Agenda";
    // Spotify
    document.getElementById('aSpotify').innerHTML = "Acesse suas playlists - Spotify" +
        '<br>' +
        "Faça um dia ainda mais produtivo!" +
        '<br>' +
        "😍<b>Clique Aqui!</b>😍";
    // Notepad
    document.getElementById('notepadText').innerHTML = "Notas";
    document.getElementById('subjectNotepad').setAttribute('placeholder', "Insira aqui suas anotações:");
    // Notebook
    document.getElementById('notebookTitle').innerHTML = "Cadernos";
    document.getElementById('create').innerHTML = "Criar";
    document.getElementById('back').innerHTML = "Voltar";
    document.getElementById('backContent').innerHTML = "Voltar";
    document.getElementById('notebookTitleCreate1').innerHTML = "Criação";
    document.getElementById('notebookTitleCreate2').innerHTML = "Crie seu caderno";
    document.getElementById('labelTitleCreate').innerHTML = "Título do Caderno";
    document.getElementById('title').setAttribute('placeholder', "Nomear caderno");
    document.getElementById('labelCoverCreate').innerHTML = "Capa do Caderno";
    document.querySelector('.labelFileInput').innerHTML = "Escolher arquivo";
    document.getElementById('btn').innerHTML = "Criar";
    document.getElementById('NotebooksCover').innerHTML = "Nenhum caderno encontrado!" +
        '<br>Caso ainda não tenha, clique em <b>"Criar"</b> e construa seus mais diversos espaços de anotações de maneira fácil e organizada.' +
        "<br>Bom trabalho!";
    // AccountElement
    document.getElementById('titleProfile').innerHTML = "Seu Perfil";
    document.getElementById('labelUser').innerHTML = "Nome do Usuário";
    document.getElementById('username').setAttribute('placeholder', "Renomear Usuário");
    document.getElementById('labelEmail').innerHTML = "E-mail";
    document.getElementById('email').setAttribute('placeholder', "Atualizar E-mail");
    document.getElementById('labelImg').innerHTML = "Foto do Perfil";
    document.getElementById('imgProfile').setAttribute('placeholder', "Alterar Imagem de Perfil");
    document.getElementById('btnProfile').innerHTML = "Atualizar";
}

function englishLang() {
    // Header-main
    document.getElementById('weather').innerHTML = "60.8°F";
    //ShareButton
    var button = document.getElementById('shareButton');
    button.addEventListener('click', function() {
        alertMessage = 'Your room was copied to the Clipboard';
    });
    // Youtube
    document.getElementById('labelYoutube').innerHTML = "YouTube Video URL:";
    document.getElementById('videoUrl').setAttribute('placeholder', "Paste the video URL");
    document.getElementById('btnYoutube').innerHTML = "Embed Video";
    //Mindfullness
    words[0] = 'Inspire';
    words[1] = 'Expire';
    // Calendar
    document.getElementById('calendarText').innerHTML = "Soon...<br>Google Calendar";
    // Spotify
    document.getElementById('aSpotify').innerHTML = "Access your playlists - Spotify" +
        '<br>' +
        "Make your day even more productive!" +
        '<br>' +
        "😍<b>Click Here!</b>😍";
    // Notepad
    document.getElementById('notepadText').innerHTML = "Notepad";
    document.getElementById('subjectNotepad').setAttribute('placeholder', "Insert your notes here:");
    // Notebook
    document.getElementById('notebookTitle').innerHTML = "Notebooks";
    document.getElementById('create').innerHTML = "Create";
    document.getElementById('back').innerHTML = "Back";
    document.getElementById('backContent').innerHTML = "Back";
    document.getElementById('notebookTitleCreate1').innerHTML = "Creation";
    document.getElementById('notebookTitleCreate2').innerHTML = "Create your notebook";
    document.getElementById('labelTitleCreate').innerHTML = "Notebook Title";
    document.getElementById('title').setAttribute('placeholder', "Name noteboook");
    document.getElementById('labelCoverCreate').innerHTML = "Notebook Cover";
    document.querySelector('.labelFileInput').innerHTML = "Choose file";
    document.getElementById('btn').innerHTML = "Create";
    document.getElementById('NotebooksCover').innerHTML = "No notebook found!" +
        '<br>If you don`t already have one, click <b>"Create"</b> and build your most diverse note-taking spaces in an easy and organized way.' +
        "<br>Good job!";
    // AccountElement
    document.getElementById('titleProfile').innerHTML = "Your Profile";
    document.getElementById('labelUser').innerHTML = "Username";
    document.getElementById('username').setAttribute('placeholder', "Rename User");
    document.getElementById('labelEmail').innerHTML = "E-mail";
    document.getElementById('email').setAttribute('placeholder', "Update E-mail");
    document.getElementById('labelImg').innerHTML = "Profile Picture";
    document.getElementById('imgProfile').setAttribute('placeholder', "Update Profile Picture");
    document.getElementById('btnProfile').innerHTML = "Update";
}

function spanishLang() {
    // Header-main
    document.getElementById('weather').innerHTML = "19°C";
    //ShareButton
    var button = document.getElementById('shareButton');
    button.addEventListener('click', function() {
        alertMessage = 'La habitácion está copiada al Portapapeles';
    });
    // Youtube
    document.getElementById('labelYoutube').innerHTML = "URL del Vídeo de YouTube";
    document.getElementById('videoUrl').setAttribute('placeholder', "Pega la URL del vídeo");
    document.getElementById('btnYoutube').innerHTML = "Insertar Vídeo";
    //Mindfullness
    words[0] = 'Inspirar';
    words[1] = 'Expirar';
    // Calendar
    document.getElementById('calendarText').innerHTML = "Pronto...<br>Google Calendar";
    // Spotify
    document.getElementById('aSpotify').innerHTML = "Accede a tu playlists - Spotify" +
        '<br>' +
        "¡Haz tu día aún más productivo!" +
        '<br>' +
        "😍<b>¡Haga Clic Aquí!</b>😍";
    // Notepad
    document.getElementById('notepadText').innerHTML = "Notas";
    document.getElementById('subjectNotepad').setAttribute('placeholder', "Inserta tus notas aquí:");
    // Notebook
    document.getElementById('notebookTitle').innerHTML = "Cuadernos";
    document.getElementById('create').innerHTML = "Crear";
    document.getElementById('back').innerHTML = "Volver";
    document.getElementById('backContent').innerHTML = "Volver";
    document.getElementById('notebookTitleCreate1').innerHTML = "Creación";
    document.getElementById('notebookTitleCreate2').innerHTML = "Crea tu cuaderno";
    document.getElementById('labelTitleCreate').innerHTML = "Título del cuaderno";
    document.getElementById('title').setAttribute('placeholder', "Cuaderno de nombres");
    document.getElementById('labelCoverCreate').innerHTML = "Portada del cuaderno";
    document.querySelector('.labelFileInput').innerHTML = "Elija el archivo";
    document.getElementById('btn').innerHTML = "Crear";
    document.getElementById('NotebooksCover').innerHTML = "¡No se encontró ningún cuaderno!" +
        '<br>Si aún no tienes uno, haz clic en <b>"Crear"</b> y crea tus más diversos espacios para tomar notas de una manera fácil y organizada.' +
        "<br>¡Buen trabajo!";
    // AccountElement
    document.getElementById('titleProfile').innerHTML = "Tu Perfil";
    document.getElementById('labelUser').innerHTML = "Nombre de Usuario";
    document.getElementById('username').setAttribute('placeholder', "Cambiar Nombre de Usuario");
    document.getElementById('labelEmail').innerHTML = "Correo Electrónico";
    document.getElementById('email').setAttribute('placeholder', "Actualizar Correo Electrónico");
    document.getElementById('labelImg').innerHTML = "Foto del Perfil";
    document.getElementById('imgProfile').setAttribute('placeholder', "Actualizar Foto de Perfil");
    document.getElementById('btnProfile').innerHTML = "Actualizar";
}