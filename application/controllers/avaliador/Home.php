<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $variaveis['avaliacoes'] = $this->m_avaliacao->get();
        $variaveis['avaliadores'] = $this->m_avaliador->get();
        $variaveis['usuarios'] = $this->m_usuario->get();
        $this->template->load('templating/base', 'avaliador/v_home', $variaveis);
    }

    public function formulario($id = null)
    {
        if ($id) {
            //$avaliacao = $this->m_categorias->get($id);

            $variaveis['id_avaliacao'] = $id;
            $this->template->load('templating/base', 'avaliador/v_formulario', $variaveis);
        }
    }
}