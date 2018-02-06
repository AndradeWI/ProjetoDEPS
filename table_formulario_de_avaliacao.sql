CREATE TABLE formulario(
  id_formulario int(11) NOT NULL,
  fk_id_avaliacao int(11) NOT NULL,
  o_tema_e_relevante int (2) NOT NULL,
  o_tema_e_atual int (2) NOT NULL,
  a_obra_comunica_pesquisa_original int (2) NOT NULL,
  a_pesquisa_e_predominantemente_qualitativa int (2) NOT NULL,
  a_pesquisa_e_predominantemente_quantitativa int (2) NOT NULL,
  a_pesquisa_apresenta_rigor_cientifico int (2) NOT NULL,
  a_abordagem_do_tema_e_inovadora int (2) NOT NULL,
  o_titulo_e_adequado int (2) NOT NULL,
  a_escrita_e_clara_e_objetiva int (2) NOT NULL,
  as_ilustracoes_estao_bem_preparadas int (2) NOT NULL,
  biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema int (2) NOT NULL,
  biblio_utilizada_e_atual int (2) NOT NULL,
  obras_semelhantes_nos_ultimos_cinco_anos int (2) NOT NULL,
  comente_os_aspectos_positivos varchar(500),
  comente_os_aspectos_negativos varchar(500),
  parecer int (2) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE formulario
  ADD PRIMARY KEY (id_formulario),
  ADD KEY fk_id_avaliacao (fk_id_avaliacao);

ALTER TABLE formulario
  MODIFY id_formulario int (11) NOT NULL AUTO_INCREMENT;

ALTER TABLE formulario
  ADD CONSTRAINT formulario_ibfk_1 FOREIGN KEY (fk_id_avaliacao) REFERENCES avaliacao (id_avaliacao);