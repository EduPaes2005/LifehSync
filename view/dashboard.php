<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
    exit();
}

require_once('../database/conexao.php');

$username = $_SESSION['username'];

$database = new Conexao();
$conn = $database->getConnection();

// Verificar se as informações do primeiro acesso já foram fornecidas
$sql = "SELECT modality FROM users WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':username', $username);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

$firstAccessCompleted = !empty($userData['modality']);

?>

<!DOCTYPE html> <!-- Documento HTML -->
<html lang="pt-BR"> <!-- Página em Português-BR -->

<head> <!--Cabeça-Funções internas-->
    <meta charset="UTF-8"> <!-- Caractéres Especiais -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Proporção d.Tela -->
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script> <!--Importando fontes-->
    <link rel="stylesheet" href="../public/CSS/normalize.css"> <!-- Importando Arquivo d.Estilização -->
    <link rel="stylesheet" href="../public/CSS/dashboard.css">
    <link rel="icon" href="../public/assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)"> <!--Logo-Guia d.navegação-Desktop-->
    <link rel="icon" href="../public/assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)"> <!--Logo-Guia d.navegação-Mobile-->
    <title>LifehSync</title> <!-- Título - Guia d.Navegação -->
</head>

<!--Corpo-->
<body>
    <div class="background-video">
        <iframe id="youtubeVideo" width="100%" height="100%"
        src="https://www.youtube.com/embed/jfKfPfyJRdk?version=3&autoplay=1&mute=0&loop=1&playlist=jfKfPfyJRdk&controls=0&showinfo=0&rel=0&disablekb=1&modestbranding=1&fs=0&vq=hd2160&cc_load_policy=0&iv_load_policy=3"
        frameborder="0" allow="autoplay; fullscreen; encrypted-media">
        </iframe>
    </div>

    <!--
        version=3 - Não sei, funcionou sem ele
        autoplay=1 - Reproduz automaticamente
        mute=0 - Inícia vídeo desmutado
        loop=1&playlist=ID_VÍDEO - Ativa loop d.Vídeo como método d.Lista d.Reprodução(Playlist)
        controls=0 - Desativa controles d.Player
        disablekb=1 - Desativa controles d.Teclado d.Player
        modestbranding=1 - Desativa logo d.Youtube
        fs=0 - Desativa o botão d.Player de tela cheia d.Player
        cc_load_policy=0 - Desativa legendas
        iv_load_policy=3 - Desativa anotações d.Vídeo
        showinfo=0 - Desativa infos,d.Tela
        rel=0 - Desativa referências d.Vídeos
        Lembrando q.p/o procedimento d.Loop,é necessário update a URL em ambas as partes embed/URL & playlist=URL
    -->

    <!-- jfKfPfyJRdk - Lo-fi Live !Perfect PC&Mobile! -->
    <!-- LIIDh-qI9oI - Save your Tears !Alert PC! -->
    <!-- JQgH5RiGAeg - Chico !Alert PC! -->
    <!-- p1FCSP7DREk - Penhasco2 !Alert PC! -->

    <!--Cabeçalho-->
    <header>
        <!-- <p>Olá! <//?php echo $username; ?></p> Saudações-Cabeçalho -->
        <div class="buttons">
            <button id="homeButton"></button>
            <button id="fireButton"></button>
            <button id="fullscreenButton"></button>
            <button id="shareButton"></button>
            <button id="muteButton"></button>
            <div class="container">
                <button class="toggle-button" id="settingsButton"></button>
                <div class="ferramentabar">
                    <!-- Ferramentas aqui -->
                    1<br>
                    2<br>
                    3<br>
                </div>
            </div>
        </div>
        <h1>LifehSync</h1> <!--Título-Cabeçalho-->
        <div class="rainbow-line"></div>
    </header>

    <?php if (!$firstAccessCompleted): ?>
        <!-- Mostrar o formulário apenas se o primeiro acesso ainda não foi completado -->
            <div class="first-access-form">
                <h3>Informe seu intuito de uso:</h3>
                <form id="first-access-form" method="POST" action="save_first_access.php">

                    <div class="modality-field">
                        <label for="modality">Modalidade</label>
                        <select name="modality" required> <!--Campo d.seleção-->
                            <option value="" disabled selected>Selecione...</option> <!--Opção desativada, apenas info-->
                            <option value="Trabalho">Trabalho</option> <!--Opções disponíveis-->
                            <option value="Leitura">Leitura</option>
                            <option value="Estudo">Estudo</option>
                            <option value="Outros...">Outros...</option>
                        </select>
                    </div>
                    <!-- Adicione mais campos conforme necessário -->

                    <button type="submit" name="submit">Enviar</button>
                </form>
            </div>
    <?php endif; ?>

    <div class="toolbar">
        <button class="toolbar-item" id="lo-fi"></button>
        <button class="toolbar-item" id="mindfulness"></button>
        <button class="toolbar-item" id="calendar"></button>
        <button class="toolbar-item" id="pomodoro"></button>
        <button class="toolbar-item" id="spotify"></button>
        <button class="toolbar-item" id="notebook"></button>
        <button class="toolbar-item" id="task"></button>
    </div>

    <div class="workspace">

        <!-- Elementos do workspace aqui -->
        <div class="tool" id="tool1">
            <div class="tool-content">
                <!-- Tool Content 1 -->
            </div>
        </div>
        <div class="tool" id="tool2">
            <div class="tool-content">
                <!-- Tool Content 2 -->
            </div>
        </div>
        <div class="tool" id="tool3">
            <div class="tool-content">
                <!-- Tool Content 3 -->
            </div>
        </div>
        <!-- Pomodoro - Ferramenta -->
        <div class="tool" id="tool4">
            <div class="tool-content"><!-- Old.Element class -->
                <div id="timer">
                    <span id="minutes">25</span>:<span id="seconds">00</span>
                </div>

                <button id="start">Iniciar</button>
                <button id="pause">Pausar</button>    
                <button id="reset">Redefinir</button>
            </div>
        </div>
        <div class="tool" id="tool5">
            <div class="tool-content">
                <!-- Tool Content 5 -->
            </div>
        </div>
        <div class="tool" id="tool6">
            <div class="tool-content">
                <!-- Tool Content 6 -->
            </div>
        </div>
        <div class="tool" id="tool7">
            <div class="tool-content">
                <!-- Tool Content 7 -->
            </div>
        </div>
    </div>

    <!-- <a href="logout.php">Deslogar</a> Link-Rodapé -->

    <div class="perfil">
        <div class="rainbow-border"></div>
        <button id="perfil-icon"></button>
    </div>

    <script src="../public/JS/script.js"></script>

</body>

</html>