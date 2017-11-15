<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submissoes extends CI_Model {
	
	/**
	 * Grava os dados na tabela.
	 * @param $dados. Array que contém os campos a serem inseridos
	 * @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	 * @return boolean
	 */
	public function store($dados = null, $id = null) {
		
		if ($dados) {
			if ($id) {
				$this->db->where('id_submissao', $id);
				if ($this->db->update("submissao", $dados)) {
					return true;
				} else {
					return false;
				}
			} else {
				if ($this->db->insert("submissao", $dados)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
	}
	/**
	 * Recupera o registro do banco de dados
	 * @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
	 * @return objeto da banco de dados da tabela cadastros
	 */
	public function get($id = null){
		
		if ($id) {
			$this->db->where('id_submissao', $id);
		}
		$this->db->order_by("id_submissao", 'desc');
		return $this->db->get('submissao');
	}

	// Busca por isbn
	public function busca($isbn = null){
		
		if ($isbn) {
			$this->db->where('isb', $isbn);
		}
		$this->db->order_by("isb", 'desc');
		return $this->db->get('submissao');
	}
	/**
	 * Deleta um registro.
	 * @param $id do registro a ser deletado
	 * @return boolean;
	 */
	public function delete($id = null){
		if ($id) {
			return $this->db->where('id_submissao', $id)->delete('submissao');
		}
	}
}
