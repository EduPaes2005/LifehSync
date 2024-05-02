<?php
session_start();

require_once('action/Accounts.php');
require_once('action/connection.php');

$database = new Connection();
$db = $database->getConnection();
$accounts = new Accounts($db);

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($accounts->login($username, $password)){
        $_SESSION['username'] = $username;
        header("Location: view/dashboard.php");
        exit();
    }else{
        print "<script>alert('Credenciais Inválidas')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" href="assets/Logo.svg" type="image/svg" media="(min-width: 769px)">
    <link rel="icon" href="assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)">
    <title>LifehSync</title>
</head>

<body>

<!--Cabeçalho-->
<?php include 'view/components/header.php'; ?>

<main>
    <p style="text-align: center;">Estamos em manutenção...<br>
    Tente novamente mais tarde</p>
</main>

<!--Rodapé-->
<?php include 'view/components/footer.php'; ?>
 
</body>
</html>