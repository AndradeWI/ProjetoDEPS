<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_avaliador extends CI_Model
{
    public function get($id = null)
    {
        if ($id) {
            $this->db->where('id_avaliador', $id);
        }
        $this->db->order_by("id_avaliador", 'desc');
        return $this->db->get('avaliador');
    }

    public function store($dados = null, $id = null)
    {
        if ($dados) {
            if ($id) {
                $this->db->where('id_avaliador', $id);
                if ($this->db->update("avaliador", $dados)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->insert("avaliador", $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    public function buscarPorUsuario($id_usuario){
        $this->db->where('fk_id_usuario', $id_usuario);

        $this->db->order_by("id_avaliador", 'desc');
        $subs = $this->db->get('avaliador');
        return $subs;
    }
}
