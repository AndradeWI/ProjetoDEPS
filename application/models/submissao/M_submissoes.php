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

	public function buscaPorStatus($status){

		$this->db->where('status_sub', $status);
		$this->db->order_by("data_submissao", 'desc');
		if($status == "Publicado"){
			$this->db->limit(8);
		}
		$subs = $this->db->get('submissao');
		return $subs;
	}

	public function BuscaFKUsuario($fk = null){
		
		if ($fk) {
			$this->db->where('fk_id_usuario', $fk);
		}
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

	// Busca por isbn
	public function FKCategoria($fk = null){
		
		if ($fk) {
			$this->db->where('fk_id_categoria', $fk);
		}
		$this->db->order_by("fk_id_categoria", 'desc');
		return $this->db->get('submissao');
	}

	//Pesquisa de Livros publicados com like
	public function pesquisa($pesquisa = null){
		$status = 'Publicado';

		if($pesquisa){
			$this->db->from('submissao');
			$this->db->where('status_sub', $status);
			$this->db->like('titulo', $pesquisa);
		}else{
			$this->db->from('submissao');
			return $this->db->get();
		}

		$this->db->order_by('id_submissao', 'desc');
		return $this->db->get();
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
