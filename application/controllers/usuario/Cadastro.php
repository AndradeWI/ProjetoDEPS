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
		//die('tim');
		$variaveis['titulo'] = 'Novo Cadastro';
		$variaveis['usuarios'] = $this->m_usuarios->get();
		$this->template->load('templating/base', 'usuario/v_cadastro', $variaveis);		
		
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
				'field' => 'email',
				'label' => 'E-mail',
				'rules' => 'required'
			),
			array(
				'field' => 'papel',
				'label' => 'Papel',
				'rules' => 'required'
			)
		);
		
		$this->form_validation->set_rules($regras);

		$nome = $this->input->post('nome');
		$usuario = $this->m_usuarios->busca($nome);
		if (($this->form_validation->run() == FALSE) || ($usuario->num_rows() > 0 ) && $id == null ) {
			$variaveis['titulo'] = 'Novo Registro';
			$variaveis['nome'] = $nome;
			$variaveis['mensagem'] = 'Usuário já está cadastrado!';
			$this->template->load('templating/base', 'usuario/v_cadastro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			
			$dados = array(
				
				"nome" => $this->input->post('nome'),
				"email" => $this->input->post('email')
				"papel" => $this->input->post('papel')
			);
			if ($this->m_usuarios->store($dados, $id)) {
				$variaveis['usuarios']   = $this->m_usuarios->get();
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->template->load('templating/base', 'usuario/v_home', $variaveis);
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
			
			$usuario = $this->m_usuarios->get($id);
			
			if ($usuario->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $usuario->row()->id_usuario;
				$variaveis['nome'] = $usuario->row()->nome;
				$variaveis['email'] = $usuario->row()->email;
				$variaveis['papel'] = $usuario->row()->papel;
				$variaveis['login'] = $usuario->row()->login;
				$variaveis['senha'] = $usuario->row()->senha;
				
				$this->template->load('templating/base', 'usuario/v_cadastro', $variaveis);

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
		/*
		$usuario = $this->m_usuarios->FKCategoria($id);
		if ($usuario->num_rows() > 0) {
			$variaveis['usuarios'] = $this->m_usuarios->get();
			$variaveis['restricao'] = "Usuarios não pode ser excluido!";
			$this->template->load('templating/base', 'usuario/v_home', $variaveis);
			
		}
		else{
			$this->m_categorias->delete($id);
			$variaveis['categorias'] = $this->m_categorias->get();
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->template->load('templating/base', 'categoria/v_home', $variaveis);
		}
		*/
	}
	
}
