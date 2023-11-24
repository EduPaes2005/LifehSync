<?php
include_once('../database/connection.php');

$db = new Connection();

class Crud{
    private $conn;
    private $table_name = "notebooks";

    public function __construct($db){
        $this->conn = $db;
    }

//Função para criar os registros
    public function create($postValue){
        $title = $postValue['title'];

        // Verifica se um arquivo foi enviado
        if(isset($_FILES['cover'])){
            $file = $_FILES['cover'];
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ex_allows = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg');

            if(in_array(strtolower($extension), $ex_allows)){
                $roadFile = '../public/assets/' . $file['name'];
                move_uploaded_file($file['tmp_name'], $roadFile);
            } else {
                die('O tipo de imagem não é aceito!');
            }
        } else {
            $roadFile = '';
        }

        $query = "INSERT INTO " . $this->table_name . " (title, cover) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$title);
        $stmt->bindParam(2,$roadFile);

        $rows = $this->read();
        if($stmt->execute()){
            // print "<script> location.href='../public/Notebook.php'; </script>";
            return true;
        }else{
            return false;
        }
    }

//Função para ler os registros
    public function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//Função para pegar os registros do banco e inserir no formulário
    public function readOne($id_notebook){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_notebook = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_notebook);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//Função para atualizar os registros
    public function update($postValues){
        $id_notebook = $postValues['id_notebook'];
        $title = $postValues['title'];
        $cover = $postValues['cover'];

        if(empty($id_notebook) || empty($title) || empty($cover)){
            return false;
        }

        $query = "UPDATE " . $this->table_name . " SET title = ?, cover = ? WHERE id_notebook = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$title);
        $stmt->bindParam(2,$cover);
        $stmt->bindParam(3,$id_notebook);
        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

//Função para apagar os registros
    public function delete($id_notebook){
        $query = "DELETE FROM " . $this->table_name . " WHERE id_notebook = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id_notebook);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}