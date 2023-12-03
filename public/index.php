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

<!DOCTYPE html> <!-- Documento HTML -->
<html lang="pt-BR"> <!-- Página em Português-BR -->

<head> <!--Cabeça-Funções internas-->
    <meta charset="UTF-8"> <!-- Caractéres Especiais -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Proporção de Tela -->
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script> <!--Importando fontes-->
    <link rel="stylesheet" href="CSS/normalize.css"> <!--Importando estilizações-->
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" href="../public/assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)"> <!--Logo-Guia d.navegação-Desktop-->
    <link rel="icon" href="../public/assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)"> <!--Logo-Guia d.navegação-Mobile-->
    <title>LifehSync</title> <!--Título-Guia d.navegação-->
</head>

<!--Corpo-->
<body>

<!--Cabeçalho-->
<?php include '../view/components/header.php'; ?>

<!--Principal-->
<main>

    <div class="login-container"> <!--Recipiente-Formulário-->
        <form id="form-login" method="POST"> <!--Formulário-->
            <h2>Entrar</h2> <!--Título-Formulário-->

            <div class="name-field">
                <label for="username">Nome de usuário</label> <!--Rótulo-Campo d.preenchimento-->
                <input type="text" name="username" placeholder="Coloque seu nome" required> <!--Campo d.preenchimento-->
            </div>

            <div class="pass-field">
                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="Coloque sua senha" required>
            </div>

            <button id="btn-register" type="submit" name="login" >LOGAR</button> <!--Botão-->
        </form>
        
        <a href="../view/register.php" id="register-link">Não tem uma conta? <span>Cadastre-se aqui</span></a> <!--Link-Direciona à pág.Cadastro-->
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

    <div class="rectangle-container"> <!--Recipiente-Retangular-->
        <img id="img-slogan" src="assets/slogan.svg"> <!--Slogan-->

        <div class="paragrapho"> <!--Recipiente-Paragráfo-->
            <p id="term-privacy1">Ao entrar no LifehSync, você concorda com os nossos <span>Termos</span> e <span>Política de Privacidade</span>.</p> <!--Paragráfo1-->
            <p id="term-privacy2">Este site é protegido pela reCAPTCHA Enterprise. Aplicam-se a <span>Política de Privacidade</span> e os <span>Termos de Uso</span> do Google.</p> <!--Paragráfo2-->
        </div>
    </div>
</main>

<!--Rodapé-->
<?php include '../view/components/footer.php'; ?>

</body>
</html> <!--Fim d.página-->