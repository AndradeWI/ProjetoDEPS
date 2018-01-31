<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_notificacao extends CI_Model {
    
    public function getPendentes($user) {
		$this->db->where('fk_id_usuario', $user);
        $res = $this->db->count_all('notificacao');
        return $res;
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
      
}
