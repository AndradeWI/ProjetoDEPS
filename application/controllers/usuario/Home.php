<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function login($papel){
		// session_start inicia a sessão
		session_start();
		$_SESSION['papel'] = $papel;
        
		//redirect('/', 'refresh');
        $this->template->load('templating/base', 'home');
	}

    //trocar nome para index depois
	public function loginpage(){
		
        //Sem template, pois a pagina de login nao deve puxar ele
        $data['error'] = null;
        $this->load->view('usuario/login', $data);
	}


}

