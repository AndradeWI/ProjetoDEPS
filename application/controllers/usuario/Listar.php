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
		$variaveis['titulo'] = 'Listar Usuario';
		$variaveis['usuarios'] = $this->m_usuarios->get();
		$this->template->load('templating/base', 'usuario/v_listar', $variaveis);
	}


	public function listar_usu(){
            //Carrega o Model            
            $this->load->model('m_usuarios');
 
            //Executa o método get_usuarios
            $variaveis['usuarios'] = $this->m_usuarios->get();            
 
            //Carrega a View
            $this->template->load('templating/base', 'usuario/v_listar', $variaveis);
  	}

/**
	 * Chama o formulário com os campos preenchidos pelo registro selecioando.
	 * @param $id do registro
	 * @return view
	 */
	public function detalhes($id = null){
		
		if ($id) {
			
			$usuario = $this->m_usuarios->get($id);
			
			if ($usuario->num_rows() > 0 ) {

				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id_usuario'] = $usuario->row()->id_usuario;
				$variaveis['nome'] = $usuario->row()->nome;
				$variaveis['email'] = $usuario->row()->email;
				$variaveis['papel'] = $usuario->row()->papel;
				
				$variaveis['usuarios'] = $this->m_categorias->get();
				$this->template->load('templating/base', 'usuario/v_detalhes', $variaveis);
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->template->load('templating/base', 'errors/html/v_erro', $variaveis);
			}			
		}		
	}
}
