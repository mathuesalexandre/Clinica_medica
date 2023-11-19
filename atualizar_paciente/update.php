<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Paciente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <style>
        form {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input {
    width: 100%;
    padding: 10px;
    
    
  
}

body {
      padding-top: 56px;
      margin-bottom: 70px; /* Altura estimada do rodapé */
      background-image: url("../img/fundo.jpg");
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
                <li class="nav-item">
                    <a class="nav-link" href="../home.html">Página Inicial</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Cadastrar.html">Cadastrar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../atualizar_paciente/index.php">Atualizar Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../consulta/index.html">Marcar Consulta</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../consulta/consultas.php">Ver Atendimentos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
     

        

        <?php
        include 'db_connection.php';

        if (isset($_GET['id'])) {
            $idPaciente = $_GET['id'];

            $sql = "SELECT * FROM paciente WHERE idPaciente = $idPaciente";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update_process.php" method="POST">
                    <input type="hidden" name="idPaciente" value="<?php echo $row['idPaciente']; ?>">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>

                    <label for="dataNascimento">Data de Nascimento:</label>
                    <input type="date" name="dataNascimento" value="<?php echo $row['dataNascimento']; ?>"><br>

                    <label for="endereco">Endereço:</label>
                    <input type="text" name="endereco" value="<?php echo $row['endereco']; ?>"><br>

                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" value="<?php echo $row['telefone']; ?>"><br>

                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
                <?php
            } else {
                echo "Paciente não encontrado.";
            }
        } else {
            echo "ID do paciente não fornecido.";
        }

        $conn->close();
        ?>
    </div>

    <!-- Rodapé -->
    <footer class="footer bg-dark ">
        <div class="container">
            <p class="m-0">Seu Rodapé &copy; 2023</p>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
