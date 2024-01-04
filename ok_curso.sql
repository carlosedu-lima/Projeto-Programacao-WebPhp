-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/01/2024 às 23:21
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
-- Banco de dados: `ok_curso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `cod_matricula` int(11) NOT NULL,
  `des_nome` varchar(250) DEFAULT NULL,
  `cod_genero` char(1) DEFAULT NULL,
  `num_cep` char(8) DEFAULT NULL,
  `des_email` varchar(100) DEFAULT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`cod_matricula`, `des_nome`, `cod_genero`, `num_cep`, `des_email`, `id_curso`) VALUES
(2, 'Maria da Silva', 'F', '70767120', 'maria@silva.com', 0),
(9, 'Érika', 'F', '71098425', 'erika@kdu.com.br', 0),
(12345678, 'Carlos Eduardo', 'M', '71258425', 'kdu@kdu.com', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `des_login` varchar(60) NOT NULL,
  `des_email` varchar(80) NOT NULL,
  `des_senha` varchar(64) NOT NULL,
  `matricula` smallint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cadastro`
--

INSERT INTO `cadastro` (`des_login`, `des_email`, `des_senha`, `matricula`) VALUES
('Ana Paula', 'kdulace30031986@gmail.com', 'bf4d0aaa1f673aacc966982c04981725692a46da4a03c0221113a4343eda7bdb', 4),
('ana', 'sadoi@indsa', 'bf4d0aaa1f673aacc966982c04981725692a46da4a03c0221113a4343eda7bdb', 9),
('Carlos Eduardo', 'kdu@carlos.com', 'bf4d0aaa1f673aacc966982c04981725692a46da4a03c0221113a4343eda7bdb', 10),
('Kdu', 'kdu@gmail.com', 'bf4d0aaa1f673aacc966982c04981725692a46da4a03c0221113a4343eda7bdb', 11),
('Ana Paula Lima', 'kdulace30031986@gmail.com', '8a8f8a5c778627f852b4d9eedecc764f4c961e1234615357168638dc8b5d1617', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `cod_cidade` int(11) NOT NULL,
  `nom_cidade` varchar(80) DEFAULT NULL,
  `sig_uf` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidade`
--

INSERT INTO `cidade` (`cod_cidade`, `nom_cidade`, `sig_uf`) VALUES
(2, 'Brasília', 'DF'),
(3, 'Ceilandia', 'DF'),
(5, 'Valparaiso', 'DF'),
(6, 'Salvador', 'BA'),
(14, 'Estrutural', 'DF');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `cid_aluno`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `cid_aluno` (
`nom_cidade` varchar(80)
,`des_nome` varchar(250)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `valor_semestre` varchar(4) DEFAULT NULL,
  `total_semestre` int(11) DEFAULT NULL,
  `des_materia` varchar(250) DEFAULT NULL,
  `tipo_materia` varchar(20) DEFAULT NULL,
  `matricula_professor` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `valor_semestre`, `total_semestre`, `des_materia`, `tipo_materia`, `matricula_professor`) VALUES
(0, '500', 8, 'Ciencia da Computação', 'Bacharelado', '8');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `num_cep` char(8) NOT NULL,
  `des_logradouro` varchar(100) DEFAULT NULL,
  `des_rua` varchar(50) DEFAULT NULL,
  `des_bairro` varchar(80) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`num_cep`, `des_logradouro`, `des_rua`, `des_bairro`, `cod_cidade`) VALUES
('70767120', 'SQN 310 Bl D', 'APT 303', 'ASA NORTE', 1),
('70767130', 'SQN 310 Bl C', 'APT 410', 'ASA NORTE', 1),
('71258425', 'Q 4 C 15', 'CASA 3', 'VILA ESTRUTURAL', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `matricula_professor` char(11) NOT NULL,
  `des_nome` varchar(250) DEFAULT NULL,
  `cod_genero` char(1) DEFAULT NULL,
  `des_email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`matricula_professor`, `des_nome`, `cod_genero`, `des_email`) VALUES
('0', 'Carlos Eduardo', 'M', 'carloseduard@kdu.com'),
('3', 'Érika Ribeiro Lima', 'F', 'erika@kdu.com.br');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `des_login` varchar(20) NOT NULL,
  `des_senha` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`des_login`, `des_senha`) VALUES
('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Estrutura para view `cid_aluno`
--
DROP TABLE IF EXISTS `cid_aluno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cid_aluno`  AS SELECT `c`.`nom_cidade` AS `nom_cidade`, `a`.`des_nome` AS `des_nome` FROM ((`aluno` `a` join `endereco` `e` on(`a`.`num_cep` = `e`.`num_cep`)) join `cidade` `c` on(`e`.`cod_cidade` = `c`.`cod_cidade`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`cod_matricula`);

--
-- Índices de tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cod_cidade`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`num_cep`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`matricula_professor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`des_login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `matricula` smallint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
