<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
	public function index()
	{
		if(!$this->session->userdata('logado') || is_null($this->session->userdata('logado'))) {
			$this->load->view('usuario/login');	
		} else {
			if($this->session->userdata('papel') == 'Gerente') {
				$variaveis['submissoes'] = $this->m_submissoes->buscaPorStatus("Submetido");
				$this->template->load('templating/base', 'home', $variaveis);
			} else {
				$this->template->load('templating/base', 'home');	
			}
		}
	}
}
