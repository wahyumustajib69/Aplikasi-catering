<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model{

	public function tampilSupplier(){
		$this->db->order_by('id_sup', 'ASC');
		return $this->db->from('supplier')->get()->result();
	}

	public function joinSupdanKtg(){
		$this->db->order_by('id_sup', 'ASC');
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('supplier','supplier.ktg = kategori.id_ktg');
		return $this->db->get()->result();
	}

	//menampilkan kategori supplier
	public function selectKategori(){
		$this->db->order_by('nm_ktg','ASC');
		return $this->db->from('kategori')->get()->result();
	}

	public function idSupplier(){
		$this->db->select('RIGHT(supplier.id_sup,3) AS id_sup', FALSE);
		$this->db->order_by('id_sup', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('supplier');

		if($query->num_rows() <> 0){
			$data 	= $query->row();
			$kd_sup = intval($data->id_sup) + 1;
		}else{
			$kd_sup = 1;
		}
		$tgl = date('dmY');
		$bts = str_pad($kd_sup, 4, "0", STR_PAD_LEFT);
		$tmp = "SP"."2".$tgl.$bts;
		return $tmp;
	}

	public function ubahSupplier($data, $id){
		$this->db->where('id_sup', $id);
		$this->db->update('supplier', $data);
		return TRUE;
	}

	public function hapusSupplier($id){
		$this->db->delete('supplier', array('id_sup'=>$id));
		return TRUE;
	}

}