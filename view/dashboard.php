<?php
session_start();

require_once('../action/NotebookCrud.php');
require_once('../database/connection.php');
require_once('../action/procedures.php');

$database = new Connection();
$db = $database->getConnection();
$crud = new Crud($db);

//Verificar requisitos de usúario logado
if(!isset($_SESSION['username']) || $_SESSION['levelAccess'] != 0){
    header("Location: ../public/index.php");
    exit();
}

$username = $_SESSION['username'];

//Verificar se informações do primeiro acesso já foram fornecidas
$sql = "SELECT modality FROM users WHERE username = :username";
$stmt = $db->prepare($sql);
$stmt->bindValue(':username', $username);
$stmt->execute();

$userData = $stmt->fetch(PDO::FETCH_ASSOC);
$firstAccessCompleted = !empty($userData['modality']);

//Outras operações...
$rows = handleActions($crud);
$notebooks = fetchNotebooks($db);
$noteContent = fetchNoteContent($db);
handleAjaxRequest($noteContent);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../public/JS/windowns.js"></script>
    <script src="../public/JS/youtube.js"></script>
    <link rel="stylesheet" href="../public/CSS/normalize.css">
    <link rel="stylesheet" href="../public/CSS/dashboard.css">
    <link rel="icon" href="../public/assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)">
    <link rel="icon" href="../public/assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)">
    <title>LifehSync</title>
</head>

<body>
    <div class="background-video" id="videoContainer">
        <iframe id="youtubeVideo" width="100%" height="100%"
        src="https://www.youtube.com/embed/jfKfPfyJRdk?version=3&autoplay=1&mute=0&loop=1&playlist=jfKfPfyJRdk&controls=0&showinfo=0&rel=0&disablekb=1&modestbranding=1&fs=0&vq=hd2160&cc_load_policy=0&iv_load_policy=3"
        frameborder="0" allow="autoplay; fullscreen; encrypted-media">
        </iframe>
    </div>

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
        <button class="toolbar-item" id="task"></button>
    </div>

    <div class="workspace">
        <div class="tool" id="tool1">
            <?php include 'components/tools/youtube.php'; ?>
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

        <div class="tool" id="tool4">
            <?php include 'components/tools/pomodoro.php'; ?>
        </div>

        <div class="tool" id="tool5">
                <?php include 'components/tools/spotify.php'; ?>
        </div>

        <div class="tool" id="tool6">
            <?php include 'components/tools/notebook.php'; ?>
        </div>

        <div class="tool" id="tool7">
            <?php include 'components/tools/notepad.php'; ?>
        </div>
    </div>

    <div class="perfil">
        <div class="rainbow-border"></div>
        <button id="perfil-icon"></button>
    </div>

    <script src="../public/JS/script.js"></script>
</body>
</html>