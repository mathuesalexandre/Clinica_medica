<?php
// Incluir o arquivo de conexão
include 'conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $nome = $_POST['nome'];
    $dataNascimento = $_POST['dataNascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    // Preparar a instrução SQL para inserção
    $sql = "INSERT INTO Paciente (nome, dataNascimento, endereco, telefone, email) VALUES ('$nome', '$dataNascimento', '$endereco', '$telefone', '$email')";

    // Executar a instrução SQL
    if ($conn->query($sql) === TRUE) {
        echo "Dados cadastrados com sucesso!";
    } else {
        echo "Erro ao cadastrar dados: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
