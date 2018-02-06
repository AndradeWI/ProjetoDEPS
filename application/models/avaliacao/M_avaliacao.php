<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_avaliacao extends CI_Model
{
    public function get($id = null)
    {
        if ($id) {
            $this->db->where('id_avaliacao', $id);
        }
        $this->db->order_by("id_avaliacao", 'desc');
        return $this->db->get('avaliacao');
    }

    public function store($dados = null, $id = null)
    {
        if ($dados) {
            if ($id) {
                $this->db->where('id_avaliacao', $id);
                if ($this->db->update("avaliacao", $dados)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->insert("avaliacao", $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function buscarPorAvaliador($id_avaliador){
        $this->db->where('fk_id_avaliador', $id_avaliador);

        $this->db->order_by("id_avaliacao", 'desc');
        $subs = $this->db->get('avaliacao');
        return $subs;
    }

    public function buscarPorSubmissao($id_submissao){
        $this->db->where('fk_id_submissao', $id_submissao);

        $this->db->order_by("id_avaliacao", 'desc');
        $subs = $this->db->get('avaliacao');
        return $subs;
    }

    public function buscarPorUsuario($id_usuario){
        $this->db->where('fk_id_usuario', $id_usuario);

        $this->db->order_by("id_avaliacao", 'desc');
        $subs = $this->db->get('avaliacao');
        return $subs;
    }

    public function delete($id = null){
        if ($id) {
            return $this->db->where('id_avaliacao', $id)->delete('avaliacao');
        }
    }
}
