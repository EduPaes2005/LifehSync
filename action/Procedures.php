<?php

function checkCredentials() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['username']) || $_SESSION['levelAccess'] != 0) {
        header("Location: ../public/index.php");
        exit();
    }
}

function checkFirstAccess($db, $username){
    $sql = "SELECT modality FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    return !empty($userData['modality']);
}

function handleActions($crud){
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
    } else {
        $rows = $crud->read();
    }

    return $rows;
}

function fetchNotebooks($db){
    $id_users = $_SESSION['id'];
    $notebooks = [];

    $sql = "SELECT * FROM notebooks WHERE id_users = :id_users";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id_users', $id_users);
    $stmt->execute();

    if ($stmt->rowCount() > 0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $notebooks[] = $row;
        }
    }

    return $notebooks;
}

function fetchNoteContent($db){
    $noteContent = null;

    if (isset($_GET['id_notebook'])) {
        $id_notebook = $_GET['id_notebook'];

        $sql = "SELECT * FROM notebooks WHERE id_notebook = :id_notebook";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_notebook', $id_notebook);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $noteContent = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Caderno não encontrado!";
            exit();
        }
    }

    return $noteContent;
}

function handleAjaxRequest($noteContent){
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($noteContent);
        exit();
    }
}
?>