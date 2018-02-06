<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Portal extends CI_Controller {

		public function index(){
			$this->load->model('m_categorias');
			$variaveis['categorias'] = $this->m_categorias->get();

			$this->load->model('m_submissoes');
			$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus('Publicado');

			$this->load->view('portal/v_portal', $variaveis);

		}

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
					$variaveis['isbn'] = $submissao->row()->isb;
					$variaveis['n_pagina'] = $submissao->row()->numero_paginas;
					$variaveis['sinopse'] = $submissao->row()->sinopse;
					$variaveis['status_sub'] = $submissao->row()->status_sub;
					$variaveis['data_submissao'] = $submissao->row()->data_submissao;
					$variaveis['arquivo'] = $submissao->row()->arquivo;

					$variaveis['categorias'] = $this->m_categorias->get();
					$this->load->view('portal/v_detalhes', $variaveis);
				} else {
					$variaveis['mensagem'] = "Registro não encontrado." ;
					$this->load->view('errors/html/v_erro', $variaveis);
				}
			
			}
		
		}

		public function pesquisa(){
			$pesquisa = $this->input->post('pesquisa');
			$variaveis['pesquisa'] = $pesquisa;
			$this->load->model('M_submissoes');

			if($pesquisa != "" && $pesquisa != null){
				$variaveis['submissoes'] = $this->m_submissoes->pesquisa($pesquisa);
				$this->load->view('portal/v_portal', $variaveis);
			}
			else{
				$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus('Publicado');
				$this->load->view('portal/v_portal', $variaveis);
			}
		}

	}
?>