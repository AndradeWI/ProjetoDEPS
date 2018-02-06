<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('usuario/login');
    }
    
    public function validar() {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
    
        $this->load->model('M_usuario');
        $result = $this->m_usuario->validate($login,$senha);
        if($result) {
            $this->session->set_userdata(array(
                'logado' => true,
                'papel'  => $result[0]['papel'],
                'usuario' => $result[0]['id_usuario']
            ));

            redirect('home'); 
            exit;
        } else {
            $data['error'] = "Login ou senha incorretos!";
            $this->load->view('usuario/login', $data);
        }
    }

    public function logoff() {
        $this->session->unset_userdata("logado"); 
        $this->session->unset_userdata("papel"); 
        $this->session->unset_userdata("usuario"); 
        $this->session->sess_destroy(); 
        redirect('portal');

        session_write_close(); 
        exit; 
    }
	

}
