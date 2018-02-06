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
		$this->template->load('templating/portalbase', 'usuario/v_cadastro', $variaveis);
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
			$variaveis['editoras'] = $this->m_editoras->get();
			$this->load->view('usuario/v_cadastro', $variaveis);
		} else {
			
			$id = $this->input->post('id');
			$papel = 'Autor';
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
				$variaveis['mensagem'] = "Cadastro realizado com sucesso!";
				$this->load->view('usuario/login', $variaveis);
			} else {
				$id_logado = $this->session->userdata('usuario');
				$pendentes = $this->m_notificacao->getPendentes($id_logado);
				$variaveis['pendentes'] = $pendentes;	
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
			}
			
		}
	}

	

}
