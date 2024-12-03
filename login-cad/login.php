<?php
// Conexão com o banco de dados
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto_Integrador/includes/db_connection.php';

// Verifica se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter dados do formulário de login
    $email = isset($_POST['login-email']) ? $_POST['login-email'] : null;
    $senha = isset($_POST['login-password']) ? $_POST['login-password'] : null;

    if ($email && $senha) {
        // Prepare sua consulta SQL
        $sql = "SELECT senha FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        
        // Execute a consulta
        if ($stmt->execute()) {
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($senha_armazenada);
                $stmt->fetch();

                // Verifique se a senha corresponde
                if (password_verify($senha, $senha_armazenada)) {
                    // Login bem-sucedido
                    // Redireciona para home.html
                    header("Location: /Projeto_Integrador/perguntas/aviso1.html");
                    exit; // Certifique-se de sair após o redirecionamento
                } else {
                    echo "Credenciais inválidas.";
                }
            } else {
                echo "Credenciais inválidas.";
            }
        } else {
            echo "Erro ao executar a consulta.";
        }
        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Método inválido.";
}
?>
