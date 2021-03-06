<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usuarios extends CI_Model {
	
	/**
	 * Grava os dados na tabela.
	 * @param $dados. Array que contém os campos a serem inseridos
	 * @param Se for passado o $id via parâmetro, então atualizo o registro em vez de inseri-lo.
	 * @return boolean
	 */
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
	
	// Busca por nome
	public function busca($nome = null){
		
		if ($nome) {
			$this->db->where('nome', $nome);
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
}
