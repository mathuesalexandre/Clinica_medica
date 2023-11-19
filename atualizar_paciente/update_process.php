<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPaciente = $_POST["idPaciente"];
    $nome = $_POST["nome"];
    $dataNascimento = $_POST["dataNascimento"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $sql = "UPDATE paciente SET nome='$nome', dataNascimento='$dataNascimento', endereco='$endereco', telefone='$telefone', email='$email' WHERE idPaciente=$idPaciente";

    if ($conn->query($sql) === TRUE) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro na atualização: " . $conn->error;
    }
} else {
    echo "Requisição inválida.";
}

$conn->close();
?>
