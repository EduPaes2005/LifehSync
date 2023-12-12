<?php
session_start();

require_once('../database/connection.php');
require_once('../action/NotebookCrud.php');
require_once('../action/Procedures.php');

$database = new Connection();
$db = $database->getConnection();
$crud = new Crud($db);

$id_users = $_SESSION['id'];
$username = $_SESSION['username'];
$imgProfile = $_SESSION['imgProfile'];
// die(print $id_users);

checkCredentials();
$firstAccessCompleted = checkFirstAccess($db, $_SESSION['username']);
$rows = handleActions($crud);
$notebooks = fetchNotebooks($db);
$noteContent = fetchNoteContent($db);
handleAjaxRequest($noteContent);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<?php include 'components/dashboard/head.php'; ?>

<body>
    <?php include 'components/dashboard/bgYoutube.php'; ?>

    <?php include 'components/dashboard/header-main.php'; ?>

    <?php include 'components/dashboard/firstAccess.php'; ?>

    <?php include 'components/dashboard/toolBar.php'; ?>

    <?php include 'components/dashboard/workSpace.php'; ?>

    <?php include 'components/dashboard/profile.php'; ?>
    <script src="../public/JS/script.js"></script>
    <script>
        function showMinimizeAlert() {
            alert('Botão temporáriamente DESABILITADO!');
        }
    </script>
</body>
</html>