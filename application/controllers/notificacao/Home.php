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
		//Load notifications...
		$variaveis["not"] = "nada";
		$this->template->load('templating/base', 'notificacao/v_home', $variaveis);
	}
}

