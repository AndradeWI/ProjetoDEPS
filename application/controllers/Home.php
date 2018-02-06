<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
	public function index()
	{
		#if(!$this->session->userdata('logado') || is_null($this->session->userdata('logado'))) {
			#$this->load->view('usuario/login');
		if(!$this->session->userdata('logado') || is_null($this->session->userdata('logado'))) {
			$this->load->view('portal');	
		} else {
			if($this->session->userdata('papel') == 'Gerente') {
				$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus("Enviado");
				$this->template->load('templating/base', 'home', $variaveis);
			} else {
				$this->template->load('templating/base', 'home');
			}
		}
	}

	public function submissoes() {
		$variaveis['submissoes'] = $this->m_submissoes->buscaFKUsuario($this->session->userdata('usuario'));
		$this->template->load('templating/base', 'home', $variaveis);
	}

	public function meusdados() {
		$variaveis['usuarios'] = $this->m_usuario->buscaFKUsuario($this->session->userdata('usuario'));
		$this->template->load('templating/base', 'home', $variaveis);
	}

	public function canceladas() {
		$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus("Cancelado");
		$this->template->load('templating/base', 'home', $variaveis);
	}
}
