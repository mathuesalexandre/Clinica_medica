<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Paciente</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        body {
      padding-top: 56px;
      margin-bottom: 70px; /* Altura estimada do rodapé */
      background-color: 
      background-size: cover;

    }

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
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

a {
    text-decoration: none;
  
}

a:hover {
    text-decoration: underline;
}

.footer {
    padding: 25px 0;
    color: white;
    text-align: center;
}

/* Estilos para a barra de navegação */
.navbar {
    box-shadow: 0 4px 6px -6px #222;
}

.navbar-brand {
    font-weight: bold;
    color: white;
}

.navbar-nav .nav-link {
    color: white;
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



/* Estilos para a tabela responsiva em telas pequenas */
@media (max-width: 768px) {
    table {
        overflow-x: auto;
        display: block;
    }

    th, td {
        white-space: nowrap;
    }
}

    </style>
</head>



<body>

    <!-- Barra de Navegação -->
  <nav class="navbar navbar-expand-lg navbar-light  fixed-top">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a class="nav-link" href="../Home.html">Página Inicial</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../cadastrarCliente/Cadastrar.html">Cadastrar Cliente</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="atualizar_paciente/index.php">Atualizar Cliente</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../consulta/index.html">Marcar Consulta</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../consulta/consultas.php">Ver consultas</a>
        </li>
    </ul>
    </div>
  </nav>

    <div>
        <h2>Atualização de Paciente</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';

                $sql = "SELECT * FROM paciente";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["idPaciente"] . "</td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["dataNascimento"] . "</td>";
                        echo "<td>" . $row["endereco"] . "</td>";
                        echo "<td>" . $row["telefone"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo '<td><a href="update.php?id=' . $row["idPaciente"] . '">Atualizar</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Nenhum paciente encontrado.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

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
