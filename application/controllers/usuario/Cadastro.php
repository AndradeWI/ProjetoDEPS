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
		$variaveis['editoras'] = $this->m_editoras->get();
		$this->load->view('usuario/v_cadastro', $variaveis);
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
				'field' => 'login',
				'label' => 'Login',
				'rules' => 'required'
			),
			array(
				'field' => 'senha',
				'label' => 'Senha',
				'rules' => 'required'
			)
		);
		
		$this->form_validation->set_rules($regras);

		$email = $this->input->post('email');
		$usuario = $this->m_usuario->busca($email);
		if (($this->form_validation->run() == FALSE) || ($usuario->num_rows() > 0 ) && $id == null ) {
			$variaveis['titulo'] = 'Novo Registro';
			$variaveis['email'] = $email;
			$variaveis['mensagem'] = 'Usuário já está cadastrado!';
			$this->load->view('usuario/v_cadastro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			$papel = 'usuario';
			$dados = array(
				
				"nome" => $this->input->post('nome'),
				"email" => $this->input->post('email'),
				"papel" => $papel,
				"login" => $this->input->post('login'),
				"senha" => md5($this->input->post('senha')),
				"fk_id_editora" => $this->input->post('editora')
			);
			if ($this->m_usuario->store($dados, $id)) {
				$variaveis['usuarios']   = $this->m_usuario->get();
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('home', $variaveis);
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
