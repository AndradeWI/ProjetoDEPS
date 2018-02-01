 CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL AUTO_INCREMENT,
  `pendente` int(1) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data` date DEFAULT NULL,
  `action_path` varchar(120) DEFAULT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `fk_id_submissao` int(11) NOT NULL,
  PRIMARY KEY (`id_notificacao`),
  KEY `fk_id_usuario` (`fk_id_usuario`),
  KEY `fk_id_submissao` (`fk_id_submissao`),
  CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `notificacao_ibfk_2` FOREIGN KEY (`fk_id_submissao`) REFERENCES `submissao` (`id_submissao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

