<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_edicao extends CI_Model
{
    public function get($id = null)
    {
        if ($id) {
            $this->db->where('id_edicao', $id);
        }
        $this->db->order_by("id_edicao", 'desc');
        return $this->db->get('edicao');
    }

    public function store($dados = null, $id = null)
    {
        if ($dados) {
            if ($id) {
                $this->db->where('id_edicao', $id);
                if ($this->db->update("edicao", $dados)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->insert("edicao", $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
