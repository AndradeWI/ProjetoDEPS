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
		$this->load->view('categoria/v_cadastro', $variaveis);
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
		$categoria = $this->m_categorias->busca($nome);
		if (($this->form_validation->run() == FALSE) || ($categoria->num_rows() > 0 ) ) {
			$variaveis['titulo'] = 'Novo Registro';
			$variaveis['mensagem'] = 'Categoria já está cadastrada!';
			$this->load->view('categoria/v_cadastro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
				
				"nome_categoria" => $this->input->post('nome'),
				"descricao_categoria" => $this->input->post('descricao')
				
			);
			if ($this->m_categorias->store($dados, $id)) {
				$variaveis['categorias'] = $this->m_categorias->get();
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('categoria/v_home', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
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
				$this->load->view('categoria/v_cadastro', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}
			
		}
		
	}
	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
	 */
	public function delete($id = null) {
		if ($this->m_categorias->delete($id)) {
			$variaveis['categorias'] = $this->m_categorias->get();
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('categoria/v_home', $variaveis);
		}
	}
}
