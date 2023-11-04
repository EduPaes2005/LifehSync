<?php //Documento PHP

class Conexao{ //Entidade q.possui atributos, funções e métodos q.geram uma estrutura lógica funcional
    private $host = "localhost"; //Atributo/Característica d.classe, d.tipo privada q.retêm uma váriavel c,nome d.'host' e recebe como resposta: "localhost"
    private $user = "root";
    private $password = "";
    private $database = "LifehSync";
    private $conn;

    public function getConnection(){ //Cria função d.tipo pública q.tem como nome uma palavra reservada p.pegar uma conexão
        $this->conn = null; //$this - Pega uma váriavel de fora da função e menciona dentro da função atual

        try{ //Tenta um procedimento
            $this->conn = new PDO("mysql:host=". $this->host. ";dbname=". $this->database, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){ //Trás uma resposta ao procedimento
            echo "Erro na conexao: ". $e->getMessage();
        }

        return $this->conn; //Retorna resposta da váriavel conn dentro dos procedimentos anteriores
    }
}
?>