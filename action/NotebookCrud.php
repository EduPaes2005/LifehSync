<?php
require_once('connection.php');

$db = new Connection();

class Notebooks{
    private $conn;
    private $table_name = "notebooks";

    public function __construct($db){
        $this->conn = $db;
    }

    public function create($postValue){
        $title = $postValue['title'];
        $idUser = $postValue['idUser'];

        if(isset($_FILES['cover'])){
            $file = $_FILES['cover'];
            $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ex_allows = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg');

            if(in_array(strtolower($extension), $ex_allows)){
                $roadFile = '../assets/notebooks/' . $file['name'];
                move_uploaded_file($file['tmp_name'], $roadFile);
                $query = "INSERT INTO " . $this->table_name . " (title, id_users, cover) VALUES (?, ?, ?)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(1,$title);
                $stmt->bindParam(2,$idUser);
                $stmt->bindParam(3,$roadFile);

                $rows = $this->read();
                if($stmt->execute()){
                    // print "<script> location.href='../public/Notebook.php'; </script>";
                    return true;
                    echo "Caderno criado com sucesso!";
                } else {
                    return false;
                    echo "Erro ao criar caderno!";
                }
            } else {
                die('O tipo de imagem não é aceito!');
            }
        } else {
            $roadFile = '';
            
            $query = "INSERT INTO " . $this->table_name . " (title, id_users, cover) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1,$title);
            $stmt->bindParam(2,$idUser);
            $stmt->bindParam(3,$roadFile);
            
            $rows = $this->read();
            if($stmt->execute()){
                // print "<script> location.href='../public/Notebook.php'; </script>";
                return true;
                echo "Caderno criado com sucesso!";
            } else {
                return false;
                echo "Erro ao criar caderno!";
            }
        }
    }

    public function read(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id_notebook){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_notebook = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_notebook);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($postValue){
        $id_notebook = $postValue['id_notebook'];
        $title = $postValue['title'];
        $cover = $postValue['cover'];

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
            echo "Caderno atualizado com sucesso!";
        } else {
            return false;
            echo "Erro ao atualizar o caderno!";
        }
    }

    public function updateNotebookContent($postValue){
        $content = $_POST['content'];
        $id_notebook = $_POST['id_notebook'];

        $query = "UPDATE " . $this->table_name . " SET content = ? WHERE id_notebook = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$content);
        $stmt->bindParam(2,$id_notebook);
        if($stmt->execute()){
            return true;
            echo "Conteúdo atualizado com sucesso!";
        } else {
            return false;
            echo "Erro ao atualizar o conteúdo!";
        }
    }

    public function delete($id_notebook){
        $query = "DELETE FROM " . $this->table_name . " WHERE id_notebook = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1,$id_notebook);
        if($stmt->execute()){
            return true;
            echo "Caderno deletado com sucesso!";
        }else{
            return false;
            echo "Erro ao deletar o caderno!";
        }
    }
}
?>