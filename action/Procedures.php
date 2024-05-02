<?php
function checkCredentials() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['username']) || $_SESSION['levelAccess'] != 0) {
        header("Location: ../index.php");
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

function handleActionsAccount($crudAccount){
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'read':
                $rows = $crudAccount->read();
                break;

            case 'update':
                if(isset($_POST['id_user'])){
                    $crudAccount->update($_POST);
                }
                $rows = $crudAccount->read();
                break;

            case 'delete':
                if(isset($_GET['id_user'])){
                    $crudAccount->delete($_GET['id_user']);
                }
                $rows = $crudAccount->read();
                break;

            default:
                $rows = $crudAccount->read();
                break;
        }
    } else {
        $rows = $crudAccount->read();
    }

    return $rows;
}

function handleActionsNotebook($crudNotebook){
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'create':
                $crudNotebook->create($_POST);
                $rows = $crudNotebook->read();
                break;

            case 'read':
                $rows = $crudNotebook->read();
                break;

            case 'readOne':
                $id_notebook = $_GET['id_notebook'];
                $rows = $crudNotebook->readOne($id_notebook);
                break;

            case 'update':
                if(isset($_POST['id_notebook'])){
                    $crudNotebook->update($_POST);
                }
                $rows = $crudNotebook->read();
                break;

            case 'updateNotebookContent':
                if(isset($_POST['id_notebook'])){
                    $crudNotebook->updateNotebookContent($_POST);
                }
                $rows = $crudNotebook->read();
                break;

            case 'delete':
                if(isset($_POST['id_notebook'])){
                    $id_notebook = $_POST['id_notebook'];
                    $crudNotebook->delete($id_notebook);
                }
                $rows = $crudNotebook->read();
                break;

            default:
                $rows = $crudNotebook->read();
                break;
        }
    } else {
        $rows = $crudNotebook->read();
    }

    return $rows;
}

function fetchNotebooks($db) {
    $id_users = $_SESSION['id_user'];
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

function handleAjaxRequest($rows) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($rows);
        exit();
    }
}
?>