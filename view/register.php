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

<!DOCTYPE html> <!--Documento HTML-->
<html lang="pt-BR"> <!--Página em Português-BR-->

<head> <!--Cabeça-Funções internas-->
    <meta charset="UTF-8"> <!--Caractéres especiais-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Proporção p.diferentes dimensões d.telas-->
    <link href="https://fonts.googleapis.com/css?family=Calibri|Georgia"> <!--Importando fontes-->
    <script type="text/javascript" src="https://db.onlinewebfonts.com/s/14936bb7a4b6575fd2eee80a3ab52cc2?family=Feather+Bold"></script>
    <link rel="stylesheet" href="../public/CSS/normalize.css"> <!--Importando estilizações-->
    <link rel="stylesheet" href="../public/CSS/register.css">
    <link rel="icon" href="../public/assets/LogoDesktop.svg" type="image/svg" media="(min-width: 769px)"> <!--Logo-Guia d.navegação-Desktop-->
    <link rel="icon" href="../public/assets/LogoMobile.svg" type="image/svg" media="(max-width: 768px)"> <!--Logo-Guia d.navegação-Mobile-->
    <title>LifehSync</title> <!--Título-Guia d.navegação-->
</head>

<!--Corpo-->
<body>

<!--Cabeçalho-->
<?php include 'components/header.php'; ?>

<!--Principal-->
<main>

    <div id="register-container"> <!--Recipiente-Formulário-->
        <form id="form-register" method="POST"> <!--Formulário-->
            <h2>Crie seu Perfil</h2> <!--Título-Formulário-->

            <div class="name-field">
                <label for="username">Nome de usuário</label> <!--Rótulo-Campo d.preenchimento-->
                <input type="text" name="username" placeholder="Coloque seu nome" required> <!--Campo d.preenchimento-->
            </div>

            <div class="email-field">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Coloque seu e-mail" required>
            </div>

            <div class="pass-field">
                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="Coloque sua senha" required>
            </div>

            <div class="confpass-field">
                <label for="confpassword">Confirmar senha</label>
                <input type="password" name="confpassword" placeholder="Confirme sua senha" required>
            </div>
        </form>
    </div>

    <img id="object-1" src="../public/assets/object-1.svg"> <!--Imagem-->
    <img id="object-2" src="../public/assets/object-2.svg">
    <img id="object-3" src="../public/assets/object-3.svg">
    <img id="object-4" src="../public/assets/object-4.svg">
    <img id="object-5" src="../public/assets/object-5.svg">

    <div class="lnormal-line"></div>
    <p id="or">OU</p>
    <div class="rnormal-line"></div>

    <button id="google"></button> <!--Botão-->
    <button id="facebook"></button>
    <button id="twitter"></button>

    <div id="rectangle-container"> <!--Recipiente-Retangular-->
        <img id="img-slogan" src="../public/assets/img.svg"> <!--Slogan-->

        <button id="btn-register" type="submit" name="register" form="form-register">CADASTRAR</button>
        <a href="../public/index.php" id="index-link">Voltar para o login</a> <!--Link-Direciona à pág.Index-->

        <div class="paragrapho"> <!--Recipiente-Paragráfo-->
            <p id="term-privacy1">Ao entrar no LifehSync, você concorda com os nossos <span>Termos</span> e <span>Política de Privacidade</span>.</p> <!--Paragráfo1-->
            <p id="term-privacy2">Este site é protegido pela reCAPTCHA Enterprise. Aplicam-se a <span>Política de Privacidade</span> e os <span>Termos de Uso</span> do Google.</p> <!--Paragráfo2-->
        </div>
    </div>
</main>

    <!--Rodapé-->
    <?php include 'components/footer.php'; ?>

</body>
</html> <!--Fim d.página-->