-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2023 às 05:02
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica_medica`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `dataAtendimento` date DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `receita` text DEFAULT NULL,
  `Consulta_idConsulta` int(11) NOT NULL,
  `Consulta_Paciente_idPaciente` int(11) NOT NULL,
  `Consulta_Medico_idMedico` int(11) NOT NULL,
  `Consulta_Medico_Especialidade_idEspecialidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `dataConsulta` date DEFAULT NULL,
  `horarioConsulta` time DEFAULT NULL,
  `Paciente_idPaciente` int(11) DEFAULT NULL,
  `Medico_idMedico` int(11) DEFAULT NULL,
  `Medico_Especialidade_idEspecialidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `idEspecialidade` int(11) NOT NULL,
  `nomeEspecialidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidade`
--

INSERT INTO `especialidade` (`idEspecialidade`, `nomeEspecialidade`) VALUES
(1, 'Odontologista'),
(2, 'Pediatra');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `idMedico` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `Especialidade_idEspecialidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`idMedico`, `nome`, `login`, `senha`, `Especialidade_idEspecialidade`) VALUES
(1, 'Ezio', 'adm123', 'adm123', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `nome`, `dataNascimento`, `endereco`, `telefone`, `email`) VALUES
(0, 'matheus', '1210-10-08', 'RUA PADRE PEDRO PINTO 69', '31717171', 'Matheus@gmai.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`Consulta_idConsulta`,`Consulta_Paciente_idPaciente`,`Consulta_Medico_idMedico`,`Consulta_Medico_Especialidade_idEspecialidade`),
  ADD KEY `Consulta_Paciente_idPaciente` (`Consulta_Paciente_idPaciente`),
  ADD KEY `Consulta_Medico_idMedico` (`Consulta_Medico_idMedico`),
  ADD KEY `Consulta_Medico_Especialidade_idEspecialidade` (`Consulta_Medico_Especialidade_idEspecialidade`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `Paciente_idPaciente` (`Paciente_idPaciente`),
  ADD KEY `Medico_idMedico` (`Medico_idMedico`),
  ADD KEY `Medico_Especialidade_idEspecialidade` (`Medico_Especialidade_idEspecialidade`);

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`idEspecialidade`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idMedico`),
  ADD KEY `Especialidade_idEspecialidade` (`Especialidade_idEspecialidade`);

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `atendimento`
--
ALTER TABLE `atendimento`
  ADD CONSTRAINT `atendimento_ibfk_1` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`),
  ADD CONSTRAINT `atendimento_ibfk_2` FOREIGN KEY (`Consulta_Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `atendimento_ibfk_3` FOREIGN KEY (`Consulta_Medico_idMedico`) REFERENCES `medico` (`idMedico`),
  ADD CONSTRAINT `atendimento_ibfk_4` FOREIGN KEY (`Consulta_Medico_Especialidade_idEspecialidade`) REFERENCES `especialidade` (`idEspecialidade`);

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`Paciente_idPaciente`) REFERENCES `paciente` (`idPaciente`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`Medico_idMedico`) REFERENCES `medico` (`idMedico`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`Medico_Especialidade_idEspecialidade`) REFERENCES `especialidade` (`idEspecialidade`);

--
-- Restrições para tabelas `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`Especialidade_idEspecialidade`) REFERENCES `especialidade` (`idEspecialidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
