<?php
include('../database/connection.php');

$db = new Connection();

class Accounts{
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function register($username, $email, $password, $confpassword){
        if($password === $confpassword){

            $usernameExisting = $this->checkExistingUsername($username);
            if($usernameExisting){
                print "<script> alert('Nome de usuário já cadastrado!')</script>";
                return false;
            }

            $emailExisting = $this->checkExistingEmail($email);
            if($emailExisting){
                print "<script> alert('Email já cadastrado!')</script>";
                return false;
            }

            $encryptedpassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1,$username);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$encryptedpassword);
            $result = $stmt->execute();

            return $result;

        }else{
            print "<script> alert('Senhas não conferem!')</script>";
            return false;
        }
    }

        private function checkExistingUsername($username){
            $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1,$username);
            $stmt->execute();

            return $stmt->fetchColumn() > 0;
        }

        private function checkExistingEmail($email){
            $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(1,$email);
            $stmt->execute();
    
            return $stmt->fetchColumn() > 0;
        }

        public function login($username, $password){
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':username',$username);
            $stmt->execute();

            if($stmt->rowCount() == 1){
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $user['password'])){
                    // Verifica o nível de acesso do usuário
                    if($user['levelAccess'] == 0){
                        // Usuário normal
                        $_SESSION['username'] = $username;
                        $_SESSION['levelAccess'] = $user['levelAccess'];
                        header("Location: ../view/dashboard.php");
                        exit();
                    } elseif($user['levelAccess'] == 1){
                        // Administrador
                        $_SESSION['username'] = $username;
                        $_SESSION['levelAccess'] = $user['levelAccess'];
                        header("Location: ../view/ADM_dashboard.php");
                        exit();
                    }
                }
            }
            return false;
        }
}
?>