<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../public/index.php");
    exit();
}

require_once('../database/conexao.php');

if(isset($_POST['submit'])){
    $modality = $_POST['modality'];

    $username = $_SESSION['username'];

    $database = new Conexao();
    $conn = $database->getConnection();

    $sql = "UPDATE users SET modality = :modality WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':modality', $modality);
    $stmt->bindValue(':username', $username);

    if($stmt->execute()){
        header("Location: dashboard.php"); // Redirecione de volta para o dashboard após salvar os dados
        exit();
    } else {
        echo "Erro ao salvar os dados. Por favor, tente novamente.";
    }
}
?>