<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
	public function index()
	{
		if(!$this->session->userdata('logado')) {
			$this->load->view('usuario/login');	
		} else {
			$this->template->load('templating/base', 'home');
		}
	}
}
