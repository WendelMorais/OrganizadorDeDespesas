-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Out-2020 às 23:20
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

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
(4, 'Tecido', 'D', 50, '2020-04-10', 'Cueca'),
(5, 'LG 50 Polegadas', 'C', 5000, '2022-04-10', 'TV'),
(6, 'Pegada sapatenis', 'Debito', 169, '2212-02-15', 'Tênis'),
(8, 'asdsad', 'Debito', 5987.55, '2222-02-12', 'asdsad'),
(9, 'Video Game Sony Com 3 Jogos', 'Debito', 1800, '2020-09-28', 'PlayStation 4'),
(10, '36 xicaras', 'Credito', 151, '2020-09-29', 'Cafeteira');

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
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nivel`, `telefone`, `nome`, `data_nasc`, `email`, `cpf`, `senha`, `genero`) VALUES
(7, '1', 55555555, 'Wendel henrique morais de moura', '1997-04-10', 'wendelxd10@hotmail.com', 2147483647, '698dc19d489c4e4db73e28a713eab07b', 'M');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `debcred`
--
ALTER TABLE `debcred`
  ADD PRIMARY KEY (`cod_debcred`);

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
  MODIFY `cod_debcred` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
