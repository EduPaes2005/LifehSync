<?php
session_start();

require_once('NotebookCrud.php');
require_once('../database/connection.php');

$database = new Connection();
$db = $database->getConnection();
$crud = new Crud($db);

if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'create':
            $crud->create($_POST);
            $rows = $crud->read();
            break;

        case 'read':
            $rows = $crud->read();
            break;

        // case 'update':
        //     if(isset($_POST['id_notebook'])){
        //         $crud->update($_POST);
        //     }
        //     $rows = $crud->read();
        //     break;

        // case 'delete':
        //     $crud->delete($_GET['id_notebook']);
        //     $rows = $crud->read();
        //     break;

        default:
            $rows = $crud->read();
            break;
    }
}else{
        $rows = $crud->read();
}
?>