<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk_model extends CI_Model{

	public function tampilBarangMasuk(){
		//$this->db->order_by('tgl_masuk','DESC');
		$this->db->from('barang_masuk')->get()->result();
	}

	public function joinSup(){
		$this->db->order_by('tgl_masuk','DESC');
		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('supplier','barang_masuk.supplier = supplier.id_sup');
		$this->db->join('barang','barang_masuk.id_brg = barang.id_brg');
		return $this->db->get()->result();
	}

	public function idMasuk(){
		$this->db->select('RIGHT(barang_masuk.id_masuk,3) AS id_masuk', FALSE);
		$this->db->order_by('id_masuk','DESC');
		$this->db->limit(1);
		$query = $this->db->get('barang_masuk');

		if($query->num_rows() <> 0){
			$data = $query->row();
			$kdms = intval($data->id_masuk) + 1;
		}else{
			$kdms = 1;
		}

		$tgl = date('dmY');
		$max = str_pad($kdms, 4,"0", STR_PAD_LEFT);
		$tam = "PR"."4".$tgl.$max;

		return $tam;
	}

	public function supplier(){
		$this->db->order_by('nm_sup', 'ASC');
		$this->db->from('supplier');
		$this->db->join('kategori','supplier.ktg = kategori.id_ktg');
		return $this->db->get()->result();
	}

	public function dataBrg(){
		$this->db->order_by('nm_brg','ASC');
		return $this->db->from('barang')->get()->result();
	}

	public function addData($data){
		$this->db->insert('barang_masuk', $data);
		return TRUE;
	}

	public function stokMasuk($data){
		$idbrg 	= $data['id_brg'];
		$jmasuk = $data['jml_masuk'];
		$hrga 	= $data['hrga'];
		$ttl 	= $jmasuk*$hrga;
		$sql 	= "UPDATE barang SET stok = stok + '$jmasuk', total = total+'$ttl' WHERE id_brg='$idbrg' ";
		$this->db->query($sql);
	}

	public function updateData($data,$id){
		$this->db->where('id_masuk', $id);
		$this->db->update('barang_masuk', $data);
		return TRUE;
	}

	public function stokMasukEdit($data, $jlama){
		$idbrg  = $data['id_brg'];
		$jmasuk = $data['jml_masuk'];
		$hrga 	= $data['hrga'];
		$tlama 	= $jlama*$hrga;
		$ttl 	= $jmasuk*$hrga;
		$sql	= "UPDATE barang SET stok = (stok - '$jlama') + '$jmasuk', total = (total-'$tlama')+'$ttl' WHERE id_brg='$idbrg' ";
		$this->db->query($sql);
	}

	public function hapusMasuk($data, $id){
		$this->db->delete('barang_masuk', array('id_masuk'=>$id)); //Menghapus Data Pada Tabel barang_masuk

		//mengupdate stok & total harga pada tabel barang
		$hrga 	= $data['harga'];
		$idbrg 	= $data['id_brg'];
		$stok 	= $data['stok'];
		$total	= $hrga*$stok;
		$sql = "UPDATE barang SET stok = stok-'$stok', total=total - '$total' WHERE id_brg='$idbrg' ";
		$this->db->query($sql);

		return TRUE;
	}


}