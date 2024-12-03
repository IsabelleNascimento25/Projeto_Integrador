-- Criação do banco de dados

-- Criação da tabela usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    renda DECIMAL(10, 2),
    tipo_usuario ENUM('comum', 'admin') DEFAULT 'comum',
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Exemplo de inserção de um usuário (remova depois dos testes)
INSERT INTO usuarios (nome, cpf, email, senha, renda, tipo_usuario) 
VALUES ('Teste Usuário', '123.456.789-00', 'teste@exemplo.com', 'senha_hash', 3000.00, 'comum');

-- Para garantir a segurança ao armazenar as senhas, considere usar hashing de senha.
-- Exemplo: no PHP, você pode usar password_hash('senha', PASSWORD_BCRYPT);
