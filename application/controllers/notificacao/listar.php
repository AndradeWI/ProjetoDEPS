<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Controller {

	public function detalhes($id_notificacao) {
		$id_logado = $this->session->userdata('usuario');
		$pendentes = $this->m_notificacao->getPendentes($id_logado);
		$variaveis['pendentes'] = $pendentes;
        
        $notificacao = $this->m_notificacao->getNotificacao($id_notificacao);
        if ($notificacao->num_rows() > 0 ) {
            $variaveis['titulo'] = $notificacao->row()->titulo;
            $variaveis['data'] = $notificacao->row()->data;
            $variaveis['msg'] = $notificacao->row()->mensagem;
            $variaveis['action_path'] = $notificacao->row()->action_path;
        } else {
            $variaveis['mensagem'] = "Você não possui notificações" ;
        }

		$this->template->load('templating/base', 'notificacao/v_detalhes', $variaveis);
	}
}

