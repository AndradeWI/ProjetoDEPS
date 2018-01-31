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
		$id_logado = $this->session->userdata('usuario');
		$pendentes = $this->m_notificacao->getPendentes($id_logado);
		$variaveis['pendentes'] = $pendentes;	
		$variaveis['mensagem'] = null;
		$variaveis['usuarios'] = $this->m_usuario->get();
		$this->template->load('templating/base', 'usuario/v_home', $variaveis);
	}
}

