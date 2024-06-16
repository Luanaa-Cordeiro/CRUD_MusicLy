-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2024 às 02:28
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `catalogo_musicas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_lanc` date NOT NULL,
  `id_artista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `album`
--

INSERT INTO `album` (`id_album`, `nome`, `data_lanc`, `id_artista`) VALUES
(15, 'Escandalo Intimo', '2024-06-28', 34),
(16, 'My Dear Melancholy', '2024-05-31', 36),
(17, 'Dois', '2024-06-20', 35),
(18, 'Minha vida é um filme', '2024-06-10', 38),
(20, 'Wake up', '2024-06-18', 46),
(21, 'Manual de Como Amar Errado', '2024-06-25', 47);

-- --------------------------------------------------------

--
-- Estrutura para tabela `artista`
--

CREATE TABLE `artista` (
  `id_artista` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `artista`
--

INSERT INTO `artista` (`id_artista`, `nome`) VALUES
(48, 'Ghost'),
(35, 'Legião Urbana'),
(46, 'Lovejoy'),
(34, 'Luiza Sonsa'),
(39, 'Matue'),
(49, 'Metallica'),
(38, 'Teto'),
(36, 'The weekend'),
(47, 'WIU');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id_genero`, `nome`) VALUES
(39, 'mpb'),
(38, 'pop'),
(40, 'rap'),
(42, 'rock'),
(43, 'samba');

-- --------------------------------------------------------

--
-- Estrutura para tabela `musicas`
--

CREATE TABLE `musicas` (
  `id_musica` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_lanc` date NOT NULL,
  `id_artista` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `musicas`
--

INSERT INTO `musicas` (`id_musica`, `nome`, `data_lanc`, `id_artista`, `id_album`, `id_genero`) VALUES
(13, 'Surreal', '2024-06-19', 34, 15, 38),
(14, 'Tempo Perdido', '2024-06-21', 35, 17, 39),
(15, 'Call Out My Name', '2024-06-19', 36, 16, 38),
(16, 'Minha vida é um filme', '2024-06-17', 38, 18, 40),
(18, 'Portrait', '2024-06-17', 46, 20, 42);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `relatorioalbum`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `relatorioalbum` (
`contIDcat` bigint(21)
,`Álbum` varchar(45)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `relatoriogenero`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `relatoriogenero` (
`contIDcat` bigint(21)
,`Gênero` varchar(45)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `testerelatorio`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `testerelatorio` (
`contIDcat` bigint(21)
,`Artista` varchar(45)
);

-- --------------------------------------------------------

--
-- Estrutura para view `relatorioalbum`
--
DROP TABLE IF EXISTS `relatorioalbum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorioalbum`  AS SELECT count(`m`.`id_musica`) AS `contIDcat`, `a`.`nome` AS `Álbum` FROM (`musicas` `m` join `album` `a` on(`m`.`id_album` = `a`.`id_album`)) GROUP BY `a`.`id_album` ORDER BY count(`m`.`id_musica`) DESC ;

-- --------------------------------------------------------

--
-- Estrutura para view `relatoriogenero`
--
DROP TABLE IF EXISTS `relatoriogenero`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatoriogenero`  AS SELECT count(`m`.`id_musica`) AS `contIDcat`, `g`.`nome` AS `Gênero` FROM (`musicas` `m` join `genero` `g` on(`m`.`id_genero` = `g`.`id_genero`)) GROUP BY `g`.`id_genero` ORDER BY count(`m`.`id_musica`) DESC ;

-- --------------------------------------------------------

--
-- Estrutura para view `testerelatorio`
--
DROP TABLE IF EXISTS `testerelatorio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `testerelatorio`  AS SELECT count(`m`.`id_musica`) AS `contIDcat`, `ar`.`nome` AS `Artista` FROM (`musicas` `m` join `artista` `ar` on(`m`.`id_artista` = `ar`.`id_artista`)) GROUP BY `ar`.`id_artista` ORDER BY count(`m`.`id_musica`) DESC ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Índices de tabela `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id_artista`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `id_artista` (`id_artista`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_genero` (`id_genero`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `artista`
--
ALTER TABLE `artista`
  MODIFY `id_artista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `musicas`
--
ALTER TABLE `musicas`
  ADD CONSTRAINT `musicas_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `musicas_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `musicas_ibfk_3` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
