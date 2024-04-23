-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23/04/2024 às 22:56
-- Versão do servidor: 10.11.7-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u455152201_barbearia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbagenda`
--

CREATE TABLE `tbagenda` (
  `idagenda` int(11) NOT NULL,
  `dataAgenda` date NOT NULL,
  `horaAgenda` varchar(20) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tbagenda`
--

INSERT INTO `tbagenda` (`idagenda`, `dataAgenda`, `horaAgenda`, `idcliente`, `idservico`, `idusuario`) VALUES
(1, '2024-04-03', '15:07', 1, 1, 2),
(2, '2024-04-20', '15:12', 2, 1, 2),
(4, '2024-05-01', '17:32', 3, 1, 2),
(5, '2024-04-24', '21:28', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(300) NOT NULL,
  `cpfCliente` varchar(15) NOT NULL,
  `celularCliente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `celularCliente`) VALUES
(1, 'tedste', '490.401.288-71', '(12)98836-7044'),
(3, 'Lucas', '490.401.288-71', '1298383933'),
(4, 'Giovanna', '490.309.423-14', '(12)98836-7044');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcontato`
--

CREATE TABLE `tbcontato` (
  `idContato` int(11) NOT NULL,
  `emailContato` varchar(250) NOT NULL,
  `textoContato` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tbcontato`
--

INSERT INTO `tbcontato` (`idContato`, `emailContato`, `textoContato`) VALUES
(1, 'teste@gmail.com', 'qwdr qwd wqdf wqfcwqcqwcvqw'),
(4, 'teste@gmail.com', 'asdqw qwd qwdqw');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(300) NOT NULL,
  `descProduto` varchar(300) NOT NULL,
  `fotoProduto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `nomeProduto`, `descProduto`, `fotoProduto`) VALUES
(2, 'Pomada pra Cabelo', 'Pomada Modeladora com fixação forte e efeito seco, molda e alinha os cabelos mantendo-os estruturados e livres de frizz, mesmo em ambientes úmidos. Elaborada com Pantenol e Vitamina E, com ação antioxidante e condicionante.', 'imgs/produtos/6621833be2e45.webp'),
(3, 'Produto teste 41', 'Esse é um oroduto teste de numero 41', 'imgs/produtos/662819f15cd6d.webp'),
(4, 'produto teste 42', 'Esse é um oroduto teste de numero 42 bom para cabelo dar mortal, e deixar o cabelo com aspecto natureba', 'imgs/produtos/66281a3438714.webp');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbservico`
--

CREATE TABLE `tbservico` (
  `idServico` int(11) NOT NULL,
  `nomeServico` varchar(300) NOT NULL,
  `descServico` varchar(300) NOT NULL,
  `fotoServico` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tbservico`
--

INSERT INTO `tbservico` (`idServico`, `nomeServico`, `descServico`, `fotoServico`) VALUES
(1, 'Corte Social', 'Corte simples, com no máximo um navalhado', 'imgs/servicos/661ebcb235fe1.png'),
(3, 'Corte de barba', 'Esse pé um serviço de mortal kombat, para voce matar geral e arrebenar na festa', 'imgs/servicos/66281a7248cd8.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idusuario` int(11) NOT NULL,
  `nomeUsuario` varchar(300) NOT NULL,
  `cpfUsuario` varchar(15) NOT NULL,
  `celularUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idusuario`, `nomeUsuario`, `cpfUsuario`, `celularUsuario`) VALUES
(2, 'vitor moreira', '408.847.847-89', '(12)9876-3645');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbagenda`
--
ALTER TABLE `tbagenda`
  ADD PRIMARY KEY (`idagenda`);

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `tbcontato`
--
ALTER TABLE `tbcontato`
  ADD PRIMARY KEY (`idContato`);

--
-- Índices de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `tbservico`
--
ALTER TABLE `tbservico`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbagenda`
--
ALTER TABLE `tbagenda`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbcontato`
--
ALTER TABLE `tbcontato`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbservico`
--
ALTER TABLE `tbservico`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
