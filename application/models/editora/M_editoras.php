<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_editoras extends CI_Model {
	
	/**
	 * Recupera o registro do banco de dados
	 * @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
	 * @return objeto da banco de dados da tabela cadastros
	 */
	public function get($id = null){
		
		if ($id) {
			$this->db->where('id_editora', $id);
		}
		$this->db->order_by("id_editora", 'desc');
		return $this->db->get('editora');
	}
	
}
