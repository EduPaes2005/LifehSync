<?php
session_start();

require_once('../action/connection.php');
require_once('../action/Accounts.php');
require_once('../action/NotebookCrud.php');
require_once('../action/Procedures.php');

$database = new Connection();
$db = $database->getConnection();
$crudAccount = new Accounts($db);
$crudNotebook = new Notebooks($db);

$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$imgProfile = $_SESSION['imgProfile'];

checkCredentials();
$firstAccessCompleted = checkFirstAccess($db, $_SESSION['username']);
$rows = handleActionsAccount($crudAccount);
$rows = handleActionsNotebook($crudNotebook);
$notebooks = fetchNotebooks($db);
handleAjaxRequest($rows);
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

    <script src="../JS/shareRoom.js"></script>
    <script src="../JS/changeLang.js"></script>
    <script src="../JS/changeTheme.js"></script>
    <script src="../JS/script.js"></script>
</body>
</html>