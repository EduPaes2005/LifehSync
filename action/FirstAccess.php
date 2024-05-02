<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: ../index.php");
    exit();
}

require_once('connection.php');

if(isset($_POST['submit'])){
    $modality = $_POST['modality'];

    $username = $_SESSION['username'];

    $database = new Connection();
    $conn = $database->getConnection();

    $sql = "UPDATE users SET modality = :modality WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':modality', $modality);
    $stmt->bindValue(':username', $username);

    if($stmt->execute()){
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        echo "Erro ao salvar os dados. Por favor, tente novamente.";
    }
}
?>