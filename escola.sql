-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Ago-2019 às 19:39
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `casamatricula`
--

CREATE TABLE `casamatricula` (
  `ano` int(4) NOT NULL,
  `cpfresponsavel` bigint(11) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nascimento` date NOT NULL,
  `serie` int(2) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vaga` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casamatricula`
--

INSERT INTO `casamatricula` (`ano`, `cpfresponsavel`, `cpf`, `nome`, `sexo`, `nascimento`, `serie`, `data`, `vaga`) VALUES
(2019, 64906132391, 64906132391, 'Rodrigo Sousa', 'M', '2019-01-09', 15, '2019-08-19 09:12:18', 0),
(2019, 96919884372, 12312312312, 'Rayane Andrade Rodrigues', 'F', '2015-11-23', 4, '2019-08-27 08:12:36', 1),
(2019, 96919884372, 64906132391, 'Rodrigo Filho Sousa', 'M', '2017-11-14', 3, '2019-08-26 16:54:09', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `casamatriculaconfig`
--

CREATE TABLE `casamatriculaconfig` (
  `ano` int(4) NOT NULL,
  `data` date NOT NULL,
  `hora` varchar(6) NOT NULL,
  `data_fim` date NOT NULL,
  `hora_fim` varchar(6) NOT NULL,
  `cabecalho` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casamatriculaconfig`
--

INSERT INTO `casamatriculaconfig` (`ano`, `data`, `hora`, `data_fim`, `hora_fim`, `cabecalho`, `descricao`, `observacao`) VALUES
(2019, '2019-08-16', '080000', '2019-08-23', '235959', 'Matrícula de Novatos de 2019', 'Após o cadastro do aluno a matrícula será validada com a verificação dos dados.', 'Teremos 20 vagas pata cada séries que só será registrada após concluir o cadastro, caso não  tenha vagas disponíveis, o aluno(a) entrará para uma fila de espera.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `casaresponsavel`
--

CREATE TABLE `casaresponsavel` (
  `ano` int(4) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casaresponsavel`
--

INSERT INTO `casaresponsavel` (`ano`, `cpf`, `nome`, `senha`, `telefone`, `email`) VALUES
(2019, 64906132391, 'Rodrigo Sousa Rodrigues', '@Rodrigo@', '85987735777', 'rodrigo@computex.com.br'),
(2019, 96919884372, 'RosÃ¢ngela', 'aaaa', '85987735777', 'rosangelaandradeleite@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `casaserie`
--

CREATE TABLE `casaserie` (
  `ano` int(4) NOT NULL,
  `serie` int(2) NOT NULL,
  `turno` varchar(1) NOT NULL,
  `serie_longa` varchar(50) NOT NULL,
  `data_referencia_ini` date NOT NULL,
  `data_referencia_fim` date NOT NULL,
  `vagas` int(4) NOT NULL,
  `caminho_pdf` varchar(150) NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casaserie`
--

INSERT INTO `casaserie` (`ano`, `serie`, `turno`, `serie_longa`, `data_referencia_ini`, `data_referencia_fim`, `vagas`, `caminho_pdf`, `observacao`) VALUES
(2019, 2, 'M', 'Infantil II', '2017-04-01', '2018-03-31', 20, 'ficha.pdf', 'Só pode fazer matrícula alunos nascidos até 31 de Março de 2019'),
(2019, 3, 'M', 'Infantil III', '2016-04-01', '2017-03-31', 30, 'ficha.pdf', 'Olha a data de nascimento.'),
(2019, 3, 'T', 'Infantil III', '2016-04-01', '2017-03-31', 20, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casamatricula`
--
ALTER TABLE `casamatricula`
  ADD UNIQUE KEY `matricula_ano_cpfresponsavel_cpf` (`ano`,`cpfresponsavel`,`cpf`);

--
-- Indexes for table `casamatriculaconfig`
--
ALTER TABLE `casamatriculaconfig`
  ADD PRIMARY KEY (`ano`);

--
-- Indexes for table `casaresponsavel`
--
ALTER TABLE `casaresponsavel`
  ADD UNIQUE KEY `casaresponsavel_ano_cpf` (`ano`,`cpf`);

--
-- Indexes for table `casaserie`
--
ALTER TABLE `casaserie`
  ADD UNIQUE KEY `casaserie_ano_serie` (`ano`,`serie`,`turno`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
