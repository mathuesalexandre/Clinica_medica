<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Consulta Data</title>
    <style>
      
       
     body {
         padding-top: 56px;
         margin-bottom: 70px; /* Altura estimada do rodapé */
        
         background-size: cover;
     
       }
     
       .footer {
         position: fixed;
         bottom: 0;
         width: 100%;
     color: #ccc;
         text-align: center;
         padding: 10px;
       }
     
       nav{
         background: rgb(1,43,53);
     background: linear-gradient(90deg, rgba(1,43,53,1) 0%, rgba(105,252,255,1) 41%, rgba(233,255,255,1) 85%);
       }
     
      
     .nav-link {
     display: inline-block;
     position: relative;
     text-decoration: none;
     color: rgb(10, 13, 13);
     
     border-radius: 25px;
     margin-right: 10px;
     padding: 10px 20px;
     transition: color 0.3s ease, border-bottom-width 0.3s ease;
     }
     
     .nav-link:hover {
     color: #BB352B; /* Altera a cor do texto ao passar o mouse */
     }
     
     .nav-link::after {
     content: '';
     display: block;
     position: absolute;
     bottom: 0;
     left: 10%;
     width: 80%;
     height: 3px; /* Altura da barra */
     background: #BB352B; /* Cor da barra */
     transform: scaleX(0); /* Inicia com largura zero para não ser visível inicialmente */
     transform-origin: bottom right;
     transition: transform 0.3s ease;
     }
     
     .nav-link:hover::after {
     transform: scaleX(1); /* Aumenta a largura ao passar o mouse */
     transform-origin: bottom left;
     }
     
     
     
     
     
       @media only screen and (max-width: 1600px) {
         
         body {
           background-size: 500%;
           background-position: right;
         }
       }
     
       
     
           

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
       <!-- Barra de Navegação -->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link" href="../home.html">Página Inicial</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../cadastrarCliente/Cadastrar.html">Cadastrar Cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../atualizar_paciente/index.php">Atualizar Cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">Marcar Consulta</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="consultas.php">Ver consultas</a>
        </li>
    </ul>
    </div>
  </nav>
  

<h2>Consulta Data</h2>

<?php
include 'db_connection.php';

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Consulta SQL para recuperar os dados da tabela
$sql = "SELECT c.idConsulta, c.dataConsulta, c.horarioConsulta, p.nome as nomePaciente, m.nome as nomeMedico, e.nomeEspecialidade FROM Consulta c
        INNER JOIN Paciente p ON c.Paciente_idPaciente = p.idPaciente
        INNER JOIN Medico m ON c.Medico_idMedico = m.idMedico
        INNER JOIN Especialidade e ON c.Medico_Especialidade_idEspecialidade = e.idEspecialidade";
$result = $conn->query($sql);

// Se houver dados, exiba em uma tabela
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Data</th><th>Horário</th><th>Paciente</th><th>Médico</th><th>Especialidade</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["idConsulta"] . "</td><td>" . $row["dataConsulta"] . "</td><td>" . $row["horarioConsulta"] . "</td><td>" . $row["nomePaciente"] . "</td><td>" . $row["nomeMedico"] . "</td><td>" . $row["nomeEspecialidade"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

<footer class="footer bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Seu Rodapé &copy; 2023</p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
