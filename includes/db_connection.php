<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_integrador";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão realizada com sucesso!";
?>