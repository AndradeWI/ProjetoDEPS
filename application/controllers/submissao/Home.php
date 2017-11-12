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
		$variaveis['submissoes'] = $this->m_submissoes->get();
		$this->load->view('submissao/v_home', $variaveis);
	}
}
