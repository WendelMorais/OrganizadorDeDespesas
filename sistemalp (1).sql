-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2020 às 18:57
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemalp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `debcred`
--

CREATE TABLE `debcred` (
  `cod_debcred` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `valor` float NOT NULL,
  `data` date NOT NULL,
  `produto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `debcred`
--

INSERT INTO `debcred` (`cod_debcred`, `descricao`, `tipo`, `valor`, `data`, `produto`) VALUES
(4, 'Tecido', 'Debito', 50, '2020-04-10', 'Cueca'),
(5, 'LG 50 Polegadas', 'Credito', 1100, '2022-04-10', 'TV'),
(6, 'Pegada sapatenis', 'Debito', 169, '2212-02-15', 'Tênis'),
(8, 'asdsad', 'Debito', 300.55, '2222-02-12', 'asdsad'),
(9, 'Video Game Sony Com 3 Jogos', 'Debito', 1800, '2020-09-28', 'PlayStation 4'),
(10, '36 xicaras', 'Credito', 151, '2020-09-29', 'Cafeteira'),
(11, 'Tecido', 'Debito', 50, '2020-04-10', 'Cueca'),
(12, 'mercadoria1', 'debito', 200, '2020-04-11', 'mercadoria1'),
(13, 'mercadoria6', 'debito', 200, '2020-04-11', 'mercadoria6'),
(14, 'mercadoria2', 'debito', 300, '2020-04-10', 'mercadoria2'),
(15, 'mercadoria3', 'credito', 50, '2020-04-14', 'mercadoria3'),
(16, 'mercadoria4', 'credito', 73, '2020-04-09', 'mercadoria4'),
(17, 'mercadoria5', 'debito', 51, '2020-04-07', 'mercadoria5'),
(18, 'mercadoria', 'debito', 200, '2020-01-01', 'mercadoria'),
(19, 'mercadoria', 'debito', 200, '2020-02-01', 'mercadoria'),
(20, 'mercadoria', 'debito', 200, '2020-03-01', 'mercadoria'),
(21, 'mercadoria', 'debito', 200, '2020-04-01', 'mercadoria'),
(22, 'mercadoria', 'debito', 200, '2020-05-01', 'mercadoria'),
(23, 'mercadoria', 'debito', 200, '2020-06-01', 'mercadoria'),
(24, 'mercadoria', 'debito', 200, '2020-07-01', 'mercadoria'),
(25, 'mercadoria', 'debito', 200, '2020-08-01', 'mercadoria'),
(26, 'mercadoria', 'debito', 200, '2020-09-01', 'mercadoria'),
(27, 'mercadoria', 'debito', 200, '2020-10-01', 'mercadoria'),
(28, 'mercadoria', 'debito', 200, '2020-11-01', 'mercadoria'),
(29, 'mercadoria', 'debito', 200, '2020-12-01', 'mercadoria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `cd_imagem` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`cd_imagem`, `imagem`) VALUES
(1, 'D:xampphtdocsLPimg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` int(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nivel`, `telefone`, `nome`, `data_nasc`, `email`, `cpf`, `senha`, `genero`, `imagem`) VALUES
(7, '1', 55555555, 'Wendel henrique morais de moura', '1997-04-10', 'wendelxd10@hotmail.com', 2147483647, '698dc19d489c4e4db73e28a713eab07b', 'M', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `debcred`
--
ALTER TABLE `debcred`
  ADD PRIMARY KEY (`cod_debcred`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`cd_imagem`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `debcred`
--
ALTER TABLE `debcred`
  MODIFY `cod_debcred` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `cd_imagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
