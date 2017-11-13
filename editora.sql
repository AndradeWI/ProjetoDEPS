-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2017 às 19:03
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `editora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliador`
--

CREATE TABLE `avaliador` (
  `id_avaliador` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(50) DEFAULT NULL,
  `descricao_categoria` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `descricao_categoria`) VALUES
(12, 'Meio Ambiente', 'Todos os livros e artigos voltado para Área de meio Ambiente devem ser submetidos nesta categoria.()'),
(15, 'dagadá', 'dagadá'),
(17, 'teste', 'testette');

-- --------------------------------------------------------

--
-- Estrutura da tabela `edicao`
--

CREATE TABLE `edicao` (
  `id_edicao` int(11) NOT NULL,
  `data_edicao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacao` varchar(200) DEFAULT NULL,
  `status_pendencia` varchar(20) DEFAULT NULL,
  `fk_id_submissao` int(11) NOT NULL,
  `fk_id_editor` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL,
  `editora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`id_editora`, `editora`) VALUES
(1, 'Gregore');

-- --------------------------------------------------------

--
-- Estrutura da tabela `editor_serie`
--

CREATE TABLE `editor_serie` (
  `id_editor_serie` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `submissao`
--

CREATE TABLE `submissao` (
  `id_submissao` int(11) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `data_submissao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_sub` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `isb` int(11) DEFAULT NULL,
  `sinopse` text CHARACTER SET utf8,
  `arquivo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `disponivel` tinyint(1) DEFAULT NULL,
  `numero_paginas` int(11) DEFAULT NULL,
  `fk_id_categoria` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `submissao`
--

INSERT INTO `submissao` (`id_submissao`, `titulo`, `data_submissao`, `status_sub`, `isb`, `sinopse`, `arquivo`, `disponivel`, `numero_paginas`, `fk_id_categoria`, `fk_id_usuario`) VALUES
(34, 'upload', '2017-11-12 14:19:58', 'Submetido', 15, 'snkfjfbdjkgr', 'nrimpaVv/7efc2ea2b6c9b40d87dd01270665244d.pdf', 0, 20, 15, 1),
(35, 'upload', '2017-11-12 15:40:15', 'Submetido', 15, 'snkfjfbdjkgr', 'rzgBviPa/2ccaf14d356b66d7921694b7ce286fa4.pdf', 0, 20, 12, 1),
(36, 'upload', '2017-11-12 15:56:13', 'Submetido', 15, 'snkfjfbdjkgr', 'gxtLOYKU/', 0, 20, 12, 1),
(37, 'uploadbbhj', '2017-11-12 15:55:39', 'Submetido', 15, 'snkfjfbdjkgr', 'rnQzwoRk/', 0, 20, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `papel` varchar(50) NOT NULL,
  `fk_id_editora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `login`, `senha`, `papel`, `fk_id_editora`) VALUES
(1, 'José Carlos', 'jose@mpf.mp.br', 'jose', '123', 'Autor', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`,`fk_id_usuario`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indexes for table `avaliador`
--
ALTER TABLE `avaliador`
  ADD PRIMARY KEY (`id_avaliador`,`fk_id_usuario`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `edicao`
--
ALTER TABLE `edicao`
  ADD PRIMARY KEY (`id_edicao`),
  ADD KEY `fk_id_editor` (`fk_id_editor`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_submissao` (`fk_id_submissao`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `editor_serie`
--
ALTER TABLE `editor_serie`
  ADD PRIMARY KEY (`id_editor_serie`,`fk_id_usuario`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indexes for table `submissao`
--
ALTER TABLE `submissao`
  ADD PRIMARY KEY (`id_submissao`),
  ADD KEY `fk_id_categoria` (`fk_id_categoria`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_id_editora` (`fk_id_editora`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `avaliador`
--
ALTER TABLE `avaliador`
  MODIFY `id_avaliador` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `edicao`
--
ALTER TABLE `edicao`
  MODIFY `id_edicao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `editor_serie`
--
ALTER TABLE `editor_serie`
  MODIFY `id_editor_serie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submissao`
--
ALTER TABLE `submissao`
  MODIFY `id_submissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `autor`
--
ALTER TABLE `autor`
  ADD CONSTRAINT `autor_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `avaliador`
--
ALTER TABLE `avaliador`
  ADD CONSTRAINT `avaliador_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `edicao`
--
ALTER TABLE `edicao`
  ADD CONSTRAINT `edicao_ibfk_1` FOREIGN KEY (`fk_id_editor`) REFERENCES `editor_serie` (`id_editor_serie`),
  ADD CONSTRAINT `edicao_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `edicao_ibfk_3` FOREIGN KEY (`fk_id_submissao`) REFERENCES `submissao` (`id_submissao`);

--
-- Limitadores para a tabela `editor_serie`
--
ALTER TABLE `editor_serie`
  ADD CONSTRAINT `editor_serie_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `submissao`
--
ALTER TABLE `submissao`
  ADD CONSTRAINT `submissao_ibfk_1` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `submissao_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_id_editora`) REFERENCES `editora` (`id_editora`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
