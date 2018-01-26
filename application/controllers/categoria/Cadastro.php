<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	/**
	 * Carrega o formulário para novo cadastro
	 * @param nenhum
	 * @return view
	 */
	public function create()
	{

		$variaveis['titulo'] = 'Novo Cadastro';
		$this->template->load('templating/base', 'categoria/v_cadastro', $variaveis);
	}
	/**
	 * Salva o registro no banco de dados.
	 * Caso venha o valor id, indica uma edição, caso contrário, um insert.
	 * @param campos do formulário
	 * @return view
	 */
	public function store(){

		$this->load->library('form_validation');
		
		$regras = array(
			array(
				'field' => 'nome',
				'label' => 'Nome',
				'rules' => 'required'
			),
			array(
				'field' => 'descricao',
				'label' => 'Descrição',
				'rules' => 'required'
			)
		);
		
		$this->form_validation->set_rules($regras);

		$nome = $this->input->post('nome');
		//$id = $this->input->post('id');
		$categoria = $this->m_categorias->busca($nome);
		if (($this->form_validation->run() == FALSE) || ($categoria->num_rows() > 0 )) {
			$variaveis['titulo'] = 'Novo Registro';
			$variaveis['mensagem'] = 'Categoria já está cadastrada!';
			$this->template->load('templating/base', 'categoria/v_cadastro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
				
				"nome_categoria" => $this->input->post('nome'),
				"descricao_categoria" => $this->input->post('descricao')
				
			);
			if ($this->m_categorias->store($dados, $id)) {
				$variaveis['categorias'] = $this->m_categorias->get();
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->template->load('templating/base', 'categoria/v_home', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
			}
			
		}
	}

	
	/**
	 * Chama o formulário com os campos preenchidos pelo registro selecioando.
	 * @param $id do registro
	 * @return view
	 */
	public function edit($id = null){

		if ($id) {
			
			$categoria = $this->m_categorias->get($id);
			
			if ($categoria->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $categoria->row()->id_categoria;
				$variaveis['nome'] = $categoria->row()->nome_categoria;
				$variaveis['descricao'] = $categoria->row()->descricao_categoria;
				$this->template->load('templating/base', 'categoria/v_cadastro', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
			}
			
		}
		
	}
	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
	 */
	public function delete($id = null) {

		$categoria = $this->m_submissoes->FKCategoria($id);
		if ($categoria->num_rows() > 0) {
			$variaveis['categorias'] = $this->m_categorias->get();
			$variaveis['restricao'] = "Categoria não pode ser excluida!";
			$this->template->load('templating/base', 'categoria/v_home', $variaveis);
			
		}
		else{
			$this->m_categorias->delete($id);
			$variaveis['categorias'] = $this->m_categorias->get();
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->template->load('templating/base', 'categoria/v_home', $variaveis);
		}
	}
}
