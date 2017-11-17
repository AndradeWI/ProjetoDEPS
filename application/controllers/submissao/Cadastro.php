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
		$variaveis['categorias'] = $this->m_categorias->get();
		$this->load->view('submissao/v_cadastro', $variaveis);
	}
	/**
	 * Salva o registro no banco de dados.
	 * Caso venha o valor id, indica uma edição, caso contrário, um insert.
	 * @param campos do formulário
	 * @return view
	 */
	public function store(){
		
		$this->load->library('form_validation');
		$this->load->helper('date');

		 // definimos um nome aleatório para o diretório 
		$folder = random_string('alpha');
        // definimos o path onde o arquivo será gravado
		$path = "./uploads/".$folder;

        // verificamos se o diretório existe
        // se não existe criamos com permissão de leitura e escrita
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

        // definimos as configurações para o upload
        // determinamos o path para gravar o arquivo
		$configUpload['upload_path']   = $path;
        // definimos - através da extensão - 
        // os tipos de arquivos suportados
		$configUpload['allowed_types'] = 'pdf|doc';
        // definimos que o nome do arquivo
        // será alterado para um nome criptografado
		$configUpload['encrypt_name']  = TRUE;

        // passamos as configurações para a library upload
		$this->upload->initialize($configUpload);
		
		
		$regras = array(
			array(
				'field' => 'titulo_submissao',
				'label' => 'titulo',
				'rules' => 'required'
			),
			array(
				'field' => 'categoria',
				'label' => 'categoria',
				'rules' => 'required'
			),
			array(
				'field' => 'isb',
				'label' => 'isbn',
				'rules' => 'required'
			),
			array(
				'field' => 'n_pagina',
				'label' => 'número de páginas',
				'rules' => 'required'
			),
			array(
				'field' => 'sinopse',
				'label' => 'sinopse',
				'rules' => 'required'
			) 
		);
		
		$this->form_validation->set_rules($regras);
		$isbn = $this->input->post('isb');
		$submissao = $this->m_submissoes->busca($isbn);

		$id = $this->input->post('id');

		if (($this->form_validation->run() == FALSE)|| ($submissao->num_rows() > 0 ) && $id == null) {
			$variaveis['titulo'] = 'Edição de Registro';
			$variaveis['isbn'] = $isbn;
			$variaveis['id_submissao'] = $id;
			$variaveis['mensagem'] = 'Isbn já está cadastrado!';
			$variaveis['categorias'] = $this->m_categorias->get();
			$this->load->view('submissao/v_cadastro', $variaveis);
		}
		else {
			$id = $this->input->post('id');
			$this->upload->do_upload('arquivo');
            //se correu tudo bem, recuperamos os dados do arquivo
			$data['dadosArquivo'] = $this->upload->data();
			
            // definimos a URL para download
			$downloadPath = $folder."/".$data['dadosArquivo']['file_name'];
            // passando para o array '$data'
			$data = $downloadPath;

			$dados = array(

				"titulo" => $this->input->post('titulo_submissao'),
				"status_sub" =>'Submetido',
				"isb" => $this->input->post('isb'),
				"sinopse" => $this->input->post('sinopse'),
				"arquivo" =>$data,
				"disponivel" =>0,
				"numero_paginas" => $this->input->post('n_pagina'),
				"fk_id_categoria" =>  $this->input->post('categoria'),
				"fk_id_usuario" => 1


			);
			if ($this->m_submissoes->store($dados, $id)) {
				$variaveis['submissoes'] = $this->m_submissoes->get();
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('submissao/v_home', $variaveis);
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

				$variaveis['categorias'] = $this->m_categorias->get();
				$this->load->view('submissao/v_cadastro', $variaveis);
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
		if ($this->m_submissoes->delete($id)) {
			$variaveis['submissoes'] = $this->m_submissoes->get();
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('submissao/v_home', $variaveis);
		}
	}

	
	 // Método que fará o download do arquivo
	
	public function Download(){
		$arquivo = $_GET["arquivo"];
		// falta terminar para receber dinamicamente o parametro
		force_download('./uploads/'.$arquivo ,null);
		
	}
}
