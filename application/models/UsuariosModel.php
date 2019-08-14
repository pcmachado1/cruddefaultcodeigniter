<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model {

	public function getUsuarios(){

		$query = $this->db->get('usuario');

		return $query->result();
	}
	public function editUsuarios($id,$data){
		$this->db->where('id', $id);
		 if ($this->db->update('usuario', $data)) {
		 return true;
		 } else {
		 return false;
		 }
	}

	public function getUserDetails($id){
		$this->db->where('id', $id);
		return $this->db->get('usuario');
	}

	public function novoUsuario($data){
		if ($this->db->insert('usuario', $data)) {
		 return true;
		 } else {
		 return false;
		 }
	}

	public function deletarUsuario($id){
		$this->db->where('id', $id);
		 if ($this->db->delete('usuario')) {
		 return true;
		 } else {
		 return false;
		 }

	}

	
}