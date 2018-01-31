<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Controller {

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


	public function listar_sub(){
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
	public function detalhes($id = null){
		
		if ($id) {
			
			$submissao = $this->m_submissoes->get($id);
			
			if ($submissao->num_rows() > 0 ) {
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
				$this->template->load('templating/base', 'submissao/v_detalhes', $variaveis);
			} else {
				$id_logado = $this->session->userdata('usuario');
				$pendentes = $this->m_notificacao->getPendentes($id_logado);
				$variaveis['pendentes'] = $pendentes;	
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
			}
			
		}
		
	}


}

