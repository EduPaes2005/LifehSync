<?php
session_start();

require_once('../action/Accounts.php');
require_once('../database/connection.php');

$database = new Connection();
$db = $database->getConnection();
$accounts = new Accounts($db);

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($accounts->login($username, $password)){
        $_SESSION['username'] = $username;
        header("Location: ../view/dashboard.php");
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
    <link rel="icon" href="../public/assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)">
    <link rel="icon" href="../public/assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)">
    <title>LifehSync</title>
</head>

<body>

<!--Cabeçalho-->
<?php include '../view/components/header.php'; ?>

<main>
    <div class="login-container">
        <form id="form-login" method="POST">
            <h2>Entrar</h2>

            <div class="name-field">
                <label for="username">Nome de usuário</label>
                <input type="text" name="username" placeholder="Coloque seu nome" required>
            </div>

            <div class="pass-field">
                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="Coloque sua senha" required>
            </div>

            <button id="btn-register" type="submit" name="login" >LOGAR</button>
        </form>
        
        <a href="../view/register.php" id="register-link">Não tem uma conta? <span>Cadastre-se aqui</span></a>
    </div>

    <div class="or-container">
        <div class="left-line"></div>
        <p id="or">OU</p>
        <div class="right-line"></div>
    </div>

    <div class="digitalmedia-container">
        <button id="google"></button>
        <button id="facebook"></button>
        <button id="twitter"></button>
    </div>

    <div class="rectangle-container">
        <img id="img-slogan" src="assets/login&register/slogan.svg">

        <div class="paragrapho">
            <p id="term-privacy1">Ao entrar no LifehSync, você concorda com os nossos <span>Termos</span> e <span>Política de Privacidade</span>.</p>
            <p id="term-privacy2">Este site é protegido pela reCAPTCHA Enterprise. Aplicam-se a <span>Política de Privacidade</span> e os <span>Termos de Uso</span> do Google.</p>
        </div>
    </div>
</main>

<!--Rodapé-->
<?php include '../view/components/footer.php'; ?>

</body>
</html>