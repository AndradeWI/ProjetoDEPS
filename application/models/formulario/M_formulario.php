<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_formulario extends CI_Model
{
    public function get($id = null)
    {
        if ($id) {
            $this->db->where('id_formulario', $id);
        }
        $this->db->order_by("id_formulario", 'desc');
        return $this->db->get('formulario');
    }

    public function store($dados = null, $id = null)
    {
        if ($dados) {
            if ($id) {
                $this->db->where('id_formulario', $id);
                if ($this->db->update("formulario", $dados)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->insert("formulario", $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}