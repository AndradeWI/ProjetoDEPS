CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `data_avaliacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacao` varchar(200) DEFAULT NULL,
  `fk_id_submissao` int(11) NOT NULL,
  `fk_id_avaliador` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_id_avaliador` (`fk_id_avaliador`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_submissao` (`fk_id_submissao`);

ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`fk_id_avaliador`) REFERENCES `avaliador` (`id_avaliador`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `avaliacao_ibfk_3` FOREIGN KEY (`fk_id_submissao`) REFERENCES `submissao` (`id_submissao`);