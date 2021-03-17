<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model{

	public function tampilBarang(){
		$this->db->order_by('id_brg', 'ASC');
		return $this->db->from('barang')->get()->result();
	}

	public function joinKtgBrg(){
		$this->db->order_by('id_brg','ASC');
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori','barang.ktg = kategori.id_ktg');
		$this->db->join('satuan','barang.satuan = satuan.id_sat');
		return $this->db->get()->result();
	}


	//menampilkan kategori barang
	public function pilihKategori(){
		$this->db->order_by('nm_ktg','ASC');
		return $this->db->from('kategori')->get()->result();
	}

	public function pilihSatuan(){
		$this->db->order_by('nm_sat','ASC');
		return $this->db->from('satuan')->get()->result();
	}

	public function kodeBarang(){
		$this->db->select('RIGHT(barang.id_brg,3) AS id_brg', FALSE);
		$this->db->order_by('id_brg','DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang');

		if($query->num_rows() <> 0){
			$data	= $query->row();
			$kd_brg = intval($data->id_brg) + 1; 
		}else{
			$kd_brg = 1;
		}

		$tgl = date('dmY');
		$max = str_pad($kd_brg, 4,"0", STR_PAD_LEFT);
		$tmp = "BR"."3".$tgl.$max;
		return $tmp;
	}

	public function addBarang($data){
		$this->db->insert('barang',$data);
		return TRUE;
	}

	public function ubahBarang($data, $id){
		$this->db->where('id_brg', $id);
		$this->db->update('barang', $data);
		return TRUE;
	}

	public function hapusBarang($id){
		$this->db->delete('barang', array('id_brg'=>$id));
		return TRUE;
	}
	

}