<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model{
	
	public function TampilKategori(){
		$this->db->order_by('id_ktg', 'ASC');
		return $this->db->from('kategori')
		->get()
		->result();
	}

	public function idKategori(){
		$this->db->select('RIGHT(kategori.id_ktg,2) AS id_ktg', FALSE);
		$this->db->order_by('id_ktg', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('kategori');

		if($query->num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->id_ktg) + 1;
		}else{
			$kode = 1;
		}
		$tgl = date('dmY');
		$bts = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$ktm = "K"."1".$tgl.$bts;
		return $ktm;
	}

	public function ubahKategori($data, $id){
		$this->db->where('id_ktg', $id);
		$this->db->update('kategori', $data);
		return TRUE;
	}

	public function hapusKategori($id){
		$this->db->delete('kategori', array('id_ktg'=>$id));
	}

}