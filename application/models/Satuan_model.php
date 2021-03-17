<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_model extends CI_Model{
	
	public function idSatuan(){
		date_default_timezone_set('Asia/Makassar');
		$time = date('his');
		$is = 'S-'.$time;
		return $is;
	}

	public function tampilSatuan(){
		$this->db->order_by('nm_sat', 'ASC');
		return $this->db->from('satuan')
		->get()
		->result();
	}
	
	public function ubahSatuan($data, $id){
		$this->db->where('id_sat', $id);
		$this->db->update('satuan', $data);
		return TRUE;
	}

	public function hapusSatuan($id){
		$this->db->delete('satuan', array('id_sat' =>$id));
	}
}