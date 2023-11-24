<?php
session_start();

require_once('../action/NotebookCrud.php');
require_once('../database/connection.php');

$database = new Connection();
$db = $database->getConnection();
$crud = new Crud($db);
$notebooks = null;

if(!isset($_SESSION['username']) || $_SESSION['levelAccess'] != 0){
    header("Location: ../public/index.php");
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

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'create':
            $crud->create($_POST);
            $rows = $crud->read();
        break;

        case 'read':
            $rows = $crud->read();
        break;

        case 'update':
            if(isset($_POST['id_notebook'])){
                $crud->update($_POST);
            }
            $rows = $crud->read();
        break;

        case 'delete':
            $crud->delete($_GET['id_notebook']);
            $rows = $crud->read();
        break;

        default:
            $rows = $crud->read();
        break;
    }
}else{
        $rows = $crud->read();
}

$notebooks = [];
$query = "SELECT * FROM notebooks";
$result = $db->query($query);

if ($result->rowCount() > 0){
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $notebooks[] = $row;
    }
}
// Verifica se um ID de caderno foi passado via GET
if (isset($_GET['id_notebook'])) {
    $id_notebook = $_GET['id_notebook'];

    // Consulta SQL para buscar informações do caderno pelo ID
    $sql = "SELECT * FROM notebooks WHERE id_notebook = :id_notebook";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_notebook', $id_notebook);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $notebooks = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Caderno não encontrado!";
        exit();
    }
}
?>
<!DOCTYPE html> <!-- Documento HTML -->
<html lang="pt-BR"> <!-- Página em Português-BR -->

<head> <!--Cabeça-Funções internas-->
    <meta charset="UTF-8"> <!-- Caractéres Especiais -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Proporção d.Tela -->
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script> <!--Importando fontes-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!-- Linguagem jQuery -->
    <script src="../public/JS/Notebook.js"></script>
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
        fs=0 - Desativa o botão d.Player d.Tela cheia d.Player
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
        <button class="toolbar-item" id="lo-fi"></button>
        <button class="toolbar-item" id="mindfulness"></button>
        <button class="toolbar-item" id="calendar"></button>
        <button class="toolbar-item" id="pomodoro"></button>
        <button class="toolbar-item" id="spotify"></button>
        <button class="toolbar-item" id="notebook"></button>
        <button class="toolbar-item" id="task"></button>
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
            <?php include 'components/tools/notebookSubject.php'; ?>
        </div>
        <div class="tool" id="tool7">
            <div class="tool-content">
                <!--Tool Content 7-->
            </div>
        </div>
    </div>

    <!--<a href="logout.php">Deslogar</a> Link-Rodapé-->

    <div class="perfil">
        <div class="rainbow-border"></div>
        <button id="perfil-icon"></button>
    </div>

    <script src="../public/JS/script.js"></script>

</body>

</html>