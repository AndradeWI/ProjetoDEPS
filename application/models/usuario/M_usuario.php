<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuario extends CI_Model {

	public function store($dados = null, $id = null) {
		
		if ($dados) {
			if ($id) {
				$this->db->where('id_usuario', $id);
				if ($this->db->update("usuario", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("usuario", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
	}

	// Busca por nome
	public function busca($email = null){
		
		if ($email) {
			$this->db->where('email', $email);
		}
		$this->db->order_by("nome", 'desc');
		return $this->db->get('usuario');
	}
	/**
	 * Deleta um registro.
	 * @param $id do registro a ser deletado
	 * @return boolean;
	 */
	public function delete($id = null){
		if ($id) {
			return $this->db->where('id_usuario', $id)->delete('usuario');
		}
	}

	
	/**
	 * Recupera o registro do banco de dados
	 * @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
	 * @return objeto da banco de dados da tabela cadastros
	 */

	public function get($id = null){
		
		if ($id) {
			$this->db->where('id_usuario', $id);
		}
		$this->db->order_by("nome", 'desc');
		return $this->db->get('usuario');
	}
	
	
	
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
