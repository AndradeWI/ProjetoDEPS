<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */
	
	public function index()
	{
		$variaveis['mensagem'] = null;		
		$variaveis['usuarios'] = $this->m_usuarios->get();		
		$this->template->load('templating/base', 'usuario/v_home', $variaveis);
	}

	/**
	 * Carrega o formulário para novo cadastro
	 * @param nenhum
	 * @return view
	 */
	public function create()
	{
		
		$variaveis['titulo'] = 'Novo Cadastro';
		$variaveis['usuarios'] = $this->m_usuarios->get();
		$this->template->load('templating/base', 'usuario/v_cadastro', $variaveis);		
		
	}
	
	public function login($papel){
		// session_start inicia a sessão
		session_start();
		$_SESSION['papel'] = $papel;
        
		//redirect('/', 'refresh');
        $this->template->load('templating/base', 'home');
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
				'label' => 'nome',
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
			),
			array(
				'field' => 'senha',
				'label' => 'Senha',
				'rules' => 'required'
			),
			array(
				'field' => 'editora',
				'label' => 'Editora',
				'rules' => 'required'
			) 
		);
		
		$this->form_validation->set_rules($regras);
		$nome = $this->input->post('nome');
		$usuario = $this->m_submissoes->busca($usuario);

		if (($this->form_validation->run() == FALSE)|| ($usuario->num_rows() > 0 ) && id == null) {
			$variaveis['titulo'] = 'Novo Registro';
			$variaveis['nome'] = $nome;
			$variaveis['email'] = $email;
			$variaveis['papel'] = $papel;
			$variaveis['login'] = $login;
			$variaveis['senha'] = $senha;
			$variaveis['editora'] = $editora;
			$variaveis['mensagem'] = 'Usuário já está cadastrado!';
			$variaveis['usuarios'] = $this->m_usuarios->get();
			$this->template->load('templating/base', 'usuario/v_cadastro', $variaveis);
		}else {
			$id = $this->input->post('id');
			
			$dados = array(

				"nome" => $this->input->post('nome'),
				"email" => $this->input->post('email'),
				"papel" => $this->input->post('papel'),
				"login" => $this->input->post('login'),
				"senha" => $this->input->post('senha'),
				//"editora" => $this->input->post('editora'),
				
				//"fk_id_editora " =>  $this->input->post('editora')
			);
			if ($this->m_usuarios->store($dados, $id)) {
				$variaveis['usuarios'] = $this->m_usuarios->get();
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->template->load('templating/base', 'usuario/v_home', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
			}

		}
	}
}

