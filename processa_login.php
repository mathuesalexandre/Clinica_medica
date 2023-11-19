<?php
// Conexão com o banco de dados (substitua pelas suas informações)
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "clinica_medica";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtem dados do formulário
$login = $_POST['login'];
$senha = $_POST['senha'];

// Consulta no banco de dados
$sql = "SELECT * FROM Medico WHERE login = '$login' AND senha = '$senha'";
$result = $conn->query($sql);

// Verifica se encontrou um médico com as credenciais fornecidas
if ($result->num_rows > 0) {
    // Login bem-sucedido, redireciona para a página principal ou dashboard
    header("Location: home.html");
} else {
    // Login falhou, redireciona de volta para a página de login
    header("Location: login.php");
}

$conn->close();
?>
