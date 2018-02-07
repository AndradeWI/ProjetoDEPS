<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Controller
{

    /**
     * Carrega o formulário para listar submissao
     * @param nenhum
     * @return view
     */
    public function create()
    {
        $id_logado = $this->session->userdata('usuario');
        $pendentes = $this->m_notificacao->getPendentes($id_logado);
        $variaveis['pendentes'] = $pendentes;
        $variaveis['titulo'] = 'Listar Submissao';
        $variaveis['categorias'] = $this->m_submissoes->get();
        $this->template->load('templating/base', 'submissao/v_listar', $variaveis);
    }


    public function listar_sub()
    {
        //Carrega o Model
        $this->load->model('m_submissoes');

        //Executa o método get_produtos
        $variaveis['submissoes'] = $this->m_submissoes->get();
        $id_logado = $this->session->userdata('usuario');
        $pendentes = $this->m_notificacao->getPendentes($id_logado);
        $variaveis['pendentes'] = $pendentes;
        //Carrega a View
        $this->template->load('templating/base', 'submissao/v_listar', $variaveis);
    }

    /**
     * Chama o formulário com os campos preenchidos pelo registro selecioando.
     * @param $id do registro
     * @return view
     */
    public function detalhes($id = null)
    {

        if ($id) {

            $submissao = $this->m_submissoes->get($id);

            if ($submissao->num_rows() > 0 && $this->input->post('flag') != 1) {
                $idcateg = $submissao->row()->fk_id_categoria;
                $categ = $this->m_categorias->get($idcateg);

                $variaveis['titulo'] = 'Edição de Registro';
                $variaveis['id_submissao'] = $submissao->row()->id_submissao;
                $variaveis['titulo_submissao'] = $submissao->row()->titulo;
                $variaveis['id_categoria_atual'] = $idcateg;
                $variaveis['categoria_atual'] = $categ->row()->nome_categoria;
                $variaveis['isb'] = $submissao->row()->isb;
                $variaveis['n_pagina'] = $submissao->row()->numero_paginas;
                $variaveis['sinopse'] = $submissao->row()->sinopse;
                $variaveis['status_sub'] = $submissao->row()->status_sub;
                $variaveis['data_submissao'] = $submissao->row()->data_submissao;
                $variaveis['arquivo'] = $submissao->row()->arquivo;
                $id_logado = $this->session->userdata('usuario');
                $pendentes = $this->m_notificacao->getPendentes($id_logado);
                $variaveis['pendentes'] = $pendentes;
                $variaveis['categorias'] = $this->m_categorias->get();
                $papel = "Avaliador";
                $variaveis['avaliadores'] = $this->m_usuario->getAvaliadores($papel);
                //$variaveis['avaliacoes'] = $this->m_avaliacoes->get();
                $this->template->load('templating/base', 'submissao/v_detalhes', $variaveis);
            } elseif ($this->input->post('flag') == 1) {//definir o avaliador

                $id_usuario_avaliador = $this->input->post('selectAvaliadores');
                //$avaliador = $this->m_avaliador->buscarPorUsuario($id_usuario_avaliador);
                $avaliadores = $this->m_avaliador->get();
                if($avaliadores->num_rows() > 0){
                    foreach ($avaliadores->result() as $avaliador){
                        if($avaliador->fk_id_usuario == $id_usuario_avaliador){
                            $id_avaliador = $avaliador->id_avaliador;
                        }
                    }
                }

                $id_submissao = $this->input->post('id_submissao');

                $submissao = $this->m_submissoes->get($id_submissao);
                $dados_submissao = array(
                    "titulo" => $submissao->row()->titulo,
                    "status_sub" => 'Avaliação',
                    "isb" => $submissao->row()->isb,
                    "sinopse" => $submissao->row()->sinopse,
                    "arquivo" => $submissao->row()->arquivo,
                    "disponivel" => $submissao->row()->disponivel,
                    "numero_paginas" => $submissao->row()->numero_paginas,
                    "fk_id_categoria" => $submissao->row()->fk_id_categoria,
                    "fk_id_usuario" => $submissao->row()->fk_id_usuario
                );
                //altero o status da submissão
                $this->m_submissoes->store($dados_submissao, $id);

                $dados_avaliacao = array(
                    "fk_id_submissao" => $id_submissao,
                    "fk_id_avaliador" => $id_avaliador,
                    "fk_id_usuario" => $submissao->row()->fk_id_usuario
                );
                $this->m_avaliacao->store($dados_avaliacao);

                //notificar o avaliador que ele tem uma nova avaliacao
                $dados_notificacao_avaliador = array(
                    "pendente" => 1,
                    "titulo" => 'Você tem uma nova avaliação.',
                    "mensagem" => 'Foi designidado para você realizar a avaliação da submissão '.$id_submissao.'.',
                    "action_path" => '/avaliador/home',
                    "fk_id_usuario" => $id_usuario_avaliador,
                    "fk_id_submissao" => $id_submissao
                );
                $this->m_notificacao->store($dados_notificacao_avaliador);

                //notificar o autor sobre a movimentação da submissão
                $dados_notificacao_autor = array(
                    "pendente" => 1,
                    "titulo" => 'A submissão '.$id_submissao.' está agora em "Avaliação".',
                    "mensagem" => 'A sua submissão '.$id_submissao.' está agora na fase de avaliação.',
                    "action_path" => '//submissao/listar/detalhes/'.$id_submissao,
                    "fk_id_usuario" => $submissao->row()->fk_id_usuario,
                    "fk_id_submissao" => $id_submissao
                );
                $this->m_notificacao->store($dados_notificacao_autor);

                $this->listar_sub();

            } else {
                $id_logado = $this->session->userdata('usuario');
                $pendentes = $this->m_notificacao->getPendentes($id_logado);
                $variaveis['pendentes'] = $pendentes;
                $variaveis['mensagem'] = "Registro não encontrado.";
                $this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
            }

        }
    }
}
