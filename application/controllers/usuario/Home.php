<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Método principal do mini-crud
	 * @param nenhum
	 * @return view
	 */

    public function index()//home
    {
        $variaveis['mensagem'] = null;
        $variaveis['usuarios'] = $this->m_usuario->get();
        $variaveis['select'] = '0';
        $this->template->load('templating/base', 'usuario/v_home', $variaveis);
    }

    public function avaliadores(){
        $papel = "Avaliador";
        $variaveis['mensagem'] = null;
        $variaveis['usuarios'] = $this->m_usuario->getAvaliadores($papel);
        $variaveis['select'] = '1';
        $this->template->load('templating/base', 'usuario/v_home', $variaveis);
    }

    public function autores(){
        $papel = "Autor";
        $variaveis['mensagem'] = null;
        $variaveis['usuarios'] = $this->m_usuario->getAutores($papel);
        $variaveis['select'] = '2';
        $this->template->load('templating/base', 'usuario/v_home', $variaveis);
    }

    public function gerente(){
        $papel = "Gerente";
        $variaveis['mensagem'] = null;
        $variaveis['usuarios'] = $this->m_usuario->getGerente($papel);
        $variaveis['select'] = '3';
        $this->template->load('templating/base', 'usuario/v_home', $variaveis);
    }

    public function usuarios(){
        $papel = "Usuario";
        $variaveis['mensagem'] = null;
        $variaveis['usuarios'] = $this->m_usuario->getUsuarios($papel);
        $variaveis['select'] = '4';
        $this->template->load('templating/base', 'usuario/v_home', $variaveis);
    }
}

