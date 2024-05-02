<?php
session_start();
require_once('../connection.php');

if(!isset($_SESSION['username']) || $_SESSION['levelAccess'] != 1){
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username'];
$database = new Connection();
$conn = $database->getConnection();

// Verificar se as informações do primeiro acesso já foram fornecidas
$sql = "SELECT modality FROM users WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':username', $username);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);

$firstAccessCompleted = !empty($userData['modality']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script>
    <link rel="stylesheet" href="../CSS/normalize.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <link rel="icon" href="../assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)">
    <link rel="icon" href="../assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)">
    <title>LifehSync</title>
</head>

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
    <?php include 'components/header-main.php'; ?>

    <!--Formulário d.1º Acesso-->
    <?php include 'components/firstAccess.php'; ?>

    <div class="toolbar">
        <button class="toolbar-item" id="youtube"></button>
        <button class="toolbar-item" id="mindfulness"></button>
        <button class="toolbar-item" id="calendar"></button>
        <button class="toolbar-item" id="pomodoro"></button>
        <button class="toolbar-item" id="spotify"></button>
        <button class="toolbar-item" id="notebook"></button>
        <button class="toolbar-item" id="notepad"></button>
    </div>

    <div class="workspace">
        <div class="tool" id="tool1">
            <div class="tool-content">
                <!--Tool Content 1-->
            </div>
        </div>
        <div class="tool" id="tool2">
            <div class="tool-content">
                <!--Tool Content 2-->
            </div>
        </div>
        <div class="tool" id="tool3">
            <div class="tool-content">
                <!--Tool Content 3-->
            </div>
        </div>
        <!--Pomodoro-->
        <div class="tool" id="tool4">
            <?php include 'components/tools/pomodoro.php'; ?>
        </div>
        <div class="tool" id="tool5">
            <div class="tool-content">
                <!--Tool Content 5-->
            </div>
        </div>
        <!--Cadernos-->
        <div class="tool" id="tool6">
            <?php include 'components/tools/notebook.php'; ?>
        </div>
        <div class="tool" id="tool7">
            <div class="tool-content">
                <!--Tool Content 7-->
            </div>
        </div>
    </div>

    <div class="perfil">
        <div class="rainbow-border"></div>
        <button id="perfil-icon"></button>
    </div>

    <script src="../JS/script.js"></script>
</body>
</html>