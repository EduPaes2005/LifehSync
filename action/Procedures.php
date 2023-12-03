<?php
function handleActions($crud) {
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

function fetchNotebooks($db) {
    $notebooks = [];
    $query = "SELECT * FROM notebooks";
    $result = $db->query($query);

    if ($result->rowCount() > 0){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $notebooks[] = $row;
        }
    }

    return $notebooks;
}

function fetchNoteContent($db) {
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

function handleAjaxRequest($noteContent) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode($noteContent);
        exit();
    }
}
?>