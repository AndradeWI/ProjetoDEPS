<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {



	public function login($papel){
	
		// session_start inicia a sessão
		session_start();
		$_SESSION['papel'] = $papel;		
		//redirect('home/', 'refresh');
		$this->twig->display('home');
	}


}

