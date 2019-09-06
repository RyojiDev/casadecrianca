-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Set-2019 às 00:02
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
  `serie` int(2) NOT NULL,
  `turno` varchar(1) NOT NULL,
  `cpfresponsavel` varchar(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nascimento` date NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vaga` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `casamatriculaconfig`
--

CREATE TABLE `casamatriculaconfig` (
  `ano` int(4) NOT NULL,
  `data_ini` date NOT NULL,
  `hora_ini` varchar(6) NOT NULL,
  `data_fim` date NOT NULL,
  `hora_fim` varchar(6) NOT NULL,
  `cabecalho` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casamatriculaconfig`
--

INSERT INTO `casamatriculaconfig` (`ano`, `data_ini`, `hora_ini`, `data_fim`, `hora_fim`, `cabecalho`, `descricao`, `observacao`) VALUES
(2019, '2019-09-01', '080000', '2019-09-07', '150000', 'Matrícula de Novatos para 2020', 'Após o cadastro do aluno a matrícula será validada com a verificação dos dados.', 'Teremos 20 vagas pata cada séries que só será registrada após concluir o cadastro, caso não  tenha vagas disponíveis, o aluno(a) entrará para uma fila de espera.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `casaresponsavel`
--

CREATE TABLE `casaresponsavel` (
  `ano` int(4) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `matriculados` int(4) NOT NULL,
  `caminho_pdf` varchar(150) NOT NULL,
  `observacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `casaserie`
--

INSERT INTO `casaserie` (`ano`, `serie`, `turno`, `serie_longa`, `data_referencia_ini`, `data_referencia_fim`, `vagas`, `matriculados`, `caminho_pdf`, `observacao`) VALUES
(2019, 0, 'M', 'Berçário', '2019-04-01', '2019-08-15', 0, 3, '', ''),
(2019, 0, 'T', 'Berçário', '2019-04-01', '2019-08-15', 8, 9, '', ''),
(2019, 1, 'M', 'Infantil I', '2018-04-01', '2018-11-30', 28, 1, '2019 [1-3].pdf', ''),
(2019, 1, 'T', 'Infantil I', '2018-04-01', '2018-11-30', 42, 1, '2019 [1-3].pdf', ''),
(2019, 2, 'M', 'Infantil II', '2017-04-01', '2018-03-31', 1, 2, '2019 [1-3].pdf', ''),
(2019, 2, 'T', 'Infantil II', '2017-04-01', '2018-03-31', 48, 2, '2019 [1-3].pdf', '');

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
