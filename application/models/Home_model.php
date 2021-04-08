<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home_model extends CI_Model
{
	
	public function totalBarang()
	{
		$this->db->select('count(barang.id_brg) as total');
		$query = $this->db->get('barang');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function totalSupplier()
	{
		$this->db->select('count(supplier.id_sup) as sup');
		$query = $this->db->get('supplier');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function barangMasuk()
	{
		$this->db->select('count(barang_masuk.id_masuk) as masuk');
		$query = $this->db->get('barang_masuk');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function issueBarang()
	{
		$this->db->select('count(issue_barang.id_issue) as issue');
		$query = $this->db->get('issue_barang');
		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function jenisIssue()
	{
		$this->db->select('count(issue_barang.id_brg) as issue');
		$this->db->from('issue_barang');
		$this->db->join('barang','issue_barang.id_brg=barang.id_brg');
		$this->db->join('kategori','barang.ktg=kategori.id_ktg');
		return $this->db->get()->result();
	}
}