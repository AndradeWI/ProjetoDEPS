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
		
		$notificacoes = $this->m_notificacao->getAll($id_logado);
		$variaveis['notificacoes'] = $notificacoes;
		$this->template->load('templating/base', 'notificacao/v_home', $variaveis);
	}

	public function show($id_notificacao) {
		$id_logado = $this->session->userdata('usuario');
		$pendentes = $this->m_notificacao->getPendentes($id_logado);
		$variaveis['pendentes'] = $pendentes;
		
		$notificacao = $this->m_notificacao->getNotificacao($id_notificacao);
		$variaveis['notificacao'] = $notificacao;
		$this->template->load('templating/base', 'notificacao/v_detalhes', $variaveis);
	}
}

