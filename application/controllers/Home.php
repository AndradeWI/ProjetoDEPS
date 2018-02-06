<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
	public function index()
	{
		if(!$this->session->userdata('logado') || is_null($this->session->userdata('logado'))) {
			$this->template->load('templating/portalbase', 'usuario/login');	
		} else {
			$id_logado = $this->session->userdata('usuario');
			$pendentes = $this->m_notificacao->getPendentes($id_logado);
			$variaveis['pendentes'] = $pendentes;	
			if($this->session->userdata('papel') == 'Gerente') {
				$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus("Enviado");
				$this->template->load('templating/base', 'home', $variaveis);
			} else {
				$this->template->load('templating/base', 'home', $variaveis);
			}
		}
	}

	public function submissoes() {
		$id_logado = $this->session->userdata('usuario');
		$pendentes = $this->m_notificacao->getPendentes($id_logado);
		$variaveis['pendentes'] = $pendentes;	
		$variaveis['submissoes'] = $this->m_submissoes->buscaFKUsuario($this->session->userdata('usuario'));
		$this->template->load('templating/base', 'home', $variaveis);
	}

	public function meusdados() {
		$id_logado = $this->session->userdata('usuario');
		$pendentes = $this->m_notificacao->getPendentes($id_logado);
		$variaveis['pendentes'] = $pendentes;	
		$variaveis['usuarios'] = $this->m_usuario->buscaFKUsuario($this->session->userdata('usuario'));
		$this->template->load('templating/base', 'home', $variaveis);
	}

	public function canceladas() {
		$id_logado = $this->session->userdata('usuario');
		$pendentes = $this->m_notificacao->getPendentes($id_logado);
		$variaveis['pendentes'] = $pendentes;	
		$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus("Cancelado");
		$this->template->load('templating/base', 'home', $variaveis);
	}
}
