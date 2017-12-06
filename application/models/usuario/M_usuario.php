<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuario extends CI_Model {
	
	public function validate($login, $senha) {
        //$this->db->where('login', $login)->where('senha', md5($senha));
        //$get = $this->db->get('usuario');
        
        $query = $this->db->query("SELECT * FROM usuario WHERE login = '".$login."'
        AND senha = '".md5($senha)."'");
 		return $query->result_array();
        
        //if($get->num_rows > 0) return $get->row_array();
        //return array();
    }
}
