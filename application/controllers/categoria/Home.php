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
		$variaveis['categorias'] = $this->m_cadastros->get();
		$this->load->view('categoria/v_home', $variaveis);
	}
}
