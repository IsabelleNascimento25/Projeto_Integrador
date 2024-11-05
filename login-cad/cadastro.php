<?php
require '../includes/db_connection.php'; // Use '../' para subir um nível

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo dados do formulário
    $nome = $_POST['nome'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $email = $_POST['signup-email'] ?? null;
    $senha = $_POST['signup-password'] ?? null;
    $senha_confirm = $_POST['signup-password-confirm'] ?? null;
    $renda = $_POST['salario'] ?? null; // Corrigido para o nome correto do input
    $tipo_usuario = $_POST['tipo_usuario'] ?? null; // Nome do campo no form deve ser 'tipo_usuario'

    // Verificação de campos obrigatórios
    if (!$nome || !$cpf || !$email || !$senha || !$renda || !$tipo_usuario || !$senha_confirm) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Verificação da confirmação de senha
    if ($senha !== $senha_confirm) {
        echo "As senhas não coincidem.";
        exit;
    }

    // Verificação se o email já está cadastrado
    $stmt = $conn->prepare("SELECT email FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Este email já está cadastrado. Por favor, use outro email.";
        $stmt->close();
        exit;
    }

    $stmt->close();

    // Hash da senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserindo dados na tabela `usuarios`
    $sql = "INSERT INTO usuarios (nome, cpf, email, senha, renda, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssds", $nome, $cpf, $email, $senha_hash, $renda, $tipo_usuario);

    if ($stmt->execute()) {
        // Redireciona para home.html após o cadastro
        header("Location: /Projeto_Integrador/home.html"); // Certifique-se de que o caminho está correto
        exit; // Finaliza o script após o redirecionamento
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
