<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $variaveis['avaliacoes'] = $this->m_avaliacao->get();
        $variaveis['avaliadores'] = $this->m_avaliador->get();
        $variaveis['usuarios'] = $this->m_usuario->get();
        $variaveis['formularios'] = $this->m_formulario->get();
        $this->template->load('templating/base', 'avaliador/v_home', $variaveis);
    }

    public function formulario($id = null)
    {
        if ($id) {
            //$avaliacao = $this->m_categorias->get($id);

            $variaveis['id_avaliacao'] = $id;
            $this->template->load('templating/base', 'avaliador/v_formulario', $variaveis);
        }
    }
    
    public function store()
    {
        $dados = array(
            "fk_id_avaliacao" => $this->input->post('fk_id_avaliacao'),
            "o_tema_e_relevante" => $this->input->post('o_tema_e_relevante'),
            "o_tema_e_atual" => $this->input->post('o_tema_e_atual'),
            "a_obra_comunica_pesquisa_original" => $this->input->post('a_obra_comunica_pesquisa_original'),
            "a_pesquisa_e_predominantemente_qualitativa" => $this->input->post('a_pesquisa_e_predominantemente_qualitativa'),
            "a_pesquisa_e_predominantemente_quantitativa" => $this->input->post('a_pesquisa_e_predominantemente_quantitativa'),
            "a_pesquisa_apresenta_rigor_cientifico" => $this->input->post('a_pesquisa_apresenta_rigor_cientifico'),
            "a_abordagem_do_tema_e_inovadora" => $this->input->post('a_abordagem_do_tema_e_inovadora'),
            "o_titulo_e_adequado" => $this->input->post('o_titulo_e_adequado'),
            "a_escrita_e_clara_e_objetiva" => $this->input->post('a_escrita_e_clara_e_objetiva'),
            "as_ilustracoes_estao_bem_preparadas" => $this->input->post('as_ilustracoes_estao_bem_preparadas'),
            "biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema" => $this->input->post('biblio_e_representativa_dos_estudos_relevantes_sobre_o_tema'),
            "biblio_utilizada_e_atual" => $this->input->post('biblio_utilizada_e_atual'),
            "obras_semelhantes_nos_ultimos_cinco_anos" => $this->input->post('obras_semelhantes_nos_ultimos_cinco_anos'),
            "comente_os_aspectos_positivos" => $this->input->post('comente_os_aspectos_positivos'),
            "comente_os_aspectos_negativos" => $this->input->post('comente_os_aspectos_negativos'),
            "parecer" => $this->input->post('parecer'),
        );

        $this->m_formulario->store($dados);
        $id_avaliacao = $this->input->post('id_avaliacao');
        $avaliacao = $this->m_avaliacao->get($id_avaliacao);
        $id_submissao = $avaliacao->row()->fk_id_submissao;
        $submissao = $this->m_submissoes->get($id_submissao);
        $dados_submissao = array(
            "titulo" => $submissao->row()->titulo,
            "status_sub" => 'Avaliada',
            "isb" => $submissao->row()->isb,
            "sinopse" => $submissao->row()->sinopse,
            "arquivo" => $submissao->row()->arquivo,
            "disponivel" => $submissao->row()->disponivel,
            "numero_paginas" => $submissao->row()->numero_paginas,
            "fk_id_categoria" => $submissao->row()->fk_id_categoria,
            "fk_id_usuario" => $submissao->row()->fk_id_usuario
        );
        //altero o status da submissão
        $this->m_submissoes->store($dados_submissao, $id_submissao);

        //notificar o gerente que a avaliacao foi feita

        //notificar o autor que a submissão mudou de status
        $dados_notificacao_autor = array(
            "pendente" => 1,
            "titulo" => 'A submissão '.$id_submissao.' foi avaliada..',
            "mensagem" => 'A sua submissão '.$id_submissao.' foi avaliada.',
            "action_path" => '//submissao/listar/detalhes/'.$id_submissao,
            "fk_id_usuario" => $submissao->row()->fk_id_usuario,
            "fk_id_submissao" => $id_submissao
        );
        $this->m_notificacao->store($dados_notificacao_autor);

        $this->index();
    }
}