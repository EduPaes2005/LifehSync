<?php
    require_once('../action/Accounts.php');
    require_once('../database/connection.php');

    $database = new Connection();
    $db = $database->getConnection();
    $accounts = new Accounts($db);

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confpassword = $_POST['confpassword'];

        if($accounts->register($username, $email, $password, $confpassword)){
            header("Location: ../public/index.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Calibri|Georgia">
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script>
    <link rel="stylesheet" href="../public/CSS/normalize.css">
    <link rel="stylesheet" href="../public/CSS/register.css">
    <link rel="icon" href="../public/assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)">
    <link rel="icon" href="../public/assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)">
    <title>LifehSync</title>
</head>

<body>

<!--Cabeçalho-->
<?php include 'components/header.php'; ?>

<main>
    <form id="form-register" method="POST">
        <h2>Crie seu Perfil</h2>

        <label for="username">Nome de usuário</label><br>
        <input type="text" name="username" placeholder="Coloque seu nome" required><br>

        <label for="email">E-mail</label><br>
        <input type="email" name="email" placeholder="Coloque seu e-mail" required><br>

        <label for="password">Senha</label><br>
        <input type="password" name="password" placeholder="Coloque sua senha" required><br id="space">

        <label for="confpassword" id="labelconfpw">Confirmar senha</label><br>
        <input type="password" id="confpassword" name="confpassword" placeholder="Confirme sua senha" required><br>

        <button id="btn-register-pocket" type="submit" name="register" form="form-register">CADASTRAR</button>
    </form>

    <a href="../public/index.php" id="index-link-pocket">Voltar para o login</a>

    <img id="object-1" src="../public/assets/login&register/object-1.svg">
    <img id="object-2" src="../public/assets/login&register/object-2.svg">
    <img id="object-3" src="../public/assets/login&register/object-3.svg">
    <img id="object-4" src="../public/assets/login&register/object-4.svg">
    <img id="object-5" src="../public/assets/login&register/object-5.svg">

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
        <img id="img-slogan" src="../public/assets/login&register/slogan.svg">

        <button id="btn-register" type="submit" name="register" form="form-register">CADASTRAR</button>
        <a href="../public/index.php" id="index-link">Voltar para o login</a>

        <div class="paragrapho">
            <p id="term-privacy1">Ao entrar no LifehSync, você concorda com os nossos <span>Termos</span> e <span>Política de Privacidade</span>.</p>
            <p id="term-privacy2">Este site é protegido pela reCAPTCHA Enterprise. Aplicam-se a <span>Política de Privacidade</span> e os <span>Termos de Uso</span> do Google.</p>
        </div>
    </div>
</main>

<!--Rodapé-->
<?php include 'components/footer.php'; ?>

</body>
</html>