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
		
		#$variaveis['submissoes'] = $this->m_submissoes->get();
		$variaveis['submissoes'] = $this->m_submissoes->buscaFKUsuario($this->session->userdata('usuario'));
		$this->template->load('templating/base', 'submissao/v_home', $variaveis);
	}
}
