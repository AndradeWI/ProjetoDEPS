<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notificacao extends CI_Model {
    
    public function getPendentes($user) {
        $this->db->where('pendente', 1);
        $this->db->where('fk_id_usuario', $user);
        $res = $this->db->get('notificacao');
        return $res->num_rows();
    }

    public function getAll($user) {
		$this->db->where('fk_id_usuario', $user);
        $res = $this->db->get('notificacao');
        return $res;
    }

    public function getNotificacao($id) {
		$this->db->where('id_notificacao', $id);
        $res = $this->db->get('notificacao');
        return $res;
    }

    public function tiraPendencia($id) {
        $dados = array("pendente" => 0);
        $this->db->where('id_notificacao', intval($id));
        $this->db->update("notificacao", $dados);
    }

    public function store($dados = null, $id = null) {
        if ($dados) {
            if ($id) {
                $this->db->where('id_notificacao', $id);
                if ($this->db->update("notificacao", $dados)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ($this->db->insert("notificacao", $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
        }

    }
}
