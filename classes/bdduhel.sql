-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2024 às 16:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdduhel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios_disponiveis`
--

CREATE TABLE `horarios_disponiveis` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `horarios_disponiveis`
--

INSERT INTO `horarios_disponiveis` (`id`, `data`, `hora`) VALUES
(19, '2024-05-31', '09:00:00'),
(20, '2024-05-31', '09:30:00'),
(21, '2024-05-31', '10:00:00'),
(22, '2024-05-31', '10:30:00'),
(23, '2024-05-31', '11:00:00'),
(24, '2024-05-31', '11:30:00'),
(25, '2024-05-31', '12:00:00'),
(26, '2024-05-31', '12:30:00'),
(27, '2024-05-31', '13:00:00'),
(28, '2024-05-31', '13:30:00'),
(29, '2024-05-31', '14:00:00'),
(30, '2024-05-31', '14:30:00'),
(31, '2024-05-31', '15:00:00'),
(32, '2024-05-31', '15:30:00'),
(33, '2024-05-31', '16:00:00'),
(34, '2024-05-31', '16:30:00'),
(35, '2024-05-31', '17:00:00'),
(36, '2024-05-31', '17:30:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbagenda`
--

CREATE TABLE `tbagenda` (
  `idagenda` int(11) NOT NULL,
  `dataAgenda` date NOT NULL,
  `horaAgenda` time NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idservico` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbagenda`
--

INSERT INTO `tbagenda` (`idagenda`, `dataAgenda`, `horaAgenda`, `idcliente`, `idservico`, `idusuario`) VALUES
(19, '2024-05-31', '15:00:00', 2, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(300) NOT NULL,
  `cpfCliente` varchar(15) NOT NULL,
  `celularCliente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `celularCliente`) VALUES
(1, 'tedste', '490.401.288-71', '(12)98836-7044'),
(2, 'Maria Souza', '', ''),
(3, 'Lucas', '490.401.288-71', '1298383933'),
(4, 'Giovanna', '490.309.423-14', '(12)98836-7044'),
(9, 'João Silva', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcontato`
--

CREATE TABLE `tbcontato` (
  `idContato` int(11) NOT NULL,
  `emailContato` varchar(250) NOT NULL,
  `textoContato` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(300) NOT NULL,
  `descProduto` varchar(300) NOT NULL,
  `fotoProduto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idusuario`, `nomeUsuario`, `cpfUsuario`, `celularUsuario`) VALUES
(2, 'vitor moreira', '408.847.847-89', '(12)9876-3645');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `horarios_disponiveis`
--
ALTER TABLE `horarios_disponiveis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data` (`data`,`hora`);

--
-- Índices de tabela `tbagenda`
--
ALTER TABLE `tbagenda`
  ADD PRIMARY KEY (`idagenda`),
  ADD UNIQUE KEY `UC_Agenda` (`dataAgenda`,`horaAgenda`);

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
-- AUTO_INCREMENT de tabela `horarios_disponiveis`
--
ALTER TABLE `horarios_disponiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tbagenda`
--
ALTER TABLE `tbagenda`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
