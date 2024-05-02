<?php
// Conexão com o banco de dados (substitua pelos seus dados)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostinger_lifehsync";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_users = $_GET['id_users'];

// Consulta para obter os cadernos do banco de dados
$sql = "SELECT * FROM notebooks WHERE id_users='$id_users'";
$result = $conn->query($sql);

$notebooks = array();

if ($result->num_rows > 0) {
    // Loop através dos resultados e adicionar cadernos à array $notebooks
    while($row = $result->fetch_assoc()) {
        $notebooks[] = $row;
    }
}

// Fechar conexão com o banco de dados
$conn->close();

// Retornar os cadernos como JSON
header('Content-Type: application/json');
echo json_encode($notebooks);
?>