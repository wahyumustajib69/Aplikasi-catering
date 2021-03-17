<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issuebc_model extends CI_Model
{
	
	public function tampilIssue(){
		$this->db->order_by('tgl_bc','DESC');
		$this->db->select('*');
		$this->db->from('issue_bc');
		$this->db->join('barang','issue_bc.id_brg=barang.id_brg');
		return $this->db->get()->result();
	}

	public function idIssue(){
		$this->db->select('RIGHT(issue_bc.id_bc,3) AS id_issue', FALSE);
		$this->db->order_by('id_bc','DESC');
		$this->db->limit(1);
		$query = $this->db->get('issue_bc');

		if($query->num_rows() <> 0){
			$data = $query->row();
			$kd_is = intval($data->id_issue)+1;
		}else{
			$kd_is = 1;
		}

		$tgl = date('dmY');
		$max = str_pad($kd_is, 4,"0", STR_PAD_LEFT);
		$tmp = "BC"."5".$tgl.$max;
		return $tmp;
	}

	public function tampilBarang(){
		$this->db->order_by('nm_brg','ASC');
		return $this->db->from('barang')->get()->result();
	}

	public function addIssue($data,$hrg){
		$idb = $data['id_brg'];
		$jml = $data['jml_issue'];
		$ttl = $hrg*$jml;
		$sql = "UPDATE barang set stok=stok-'$jml', total=total-'$ttl' WHERE id_brg='$idb'";
		$this->db->query($sql);
		$this->db->insert('issue_bc',$data);
		return true;
	}

	public function ubahIssue($data,$hrg,$jlm){
		$idi = $data['id_bc'];
		$idb = $data['id_brg'];
		$jml = $data['jml_bc'];

		$ttl = $hrg*$jml; //total baru setelah diupdate
		$tlm = $hrg*$jlm; //total lama sebelum diupdate
		$sql = "UPDATE barang set stok=(stok+'$jlm')-'$jml', total=(total+'$tlm')-'$ttl' WHERE id_brg='$idb'";
		$this->db->query($sql);

		$this->db->where('id_bc',$idi);
		$this->db->update('issue_bc',$data);
		return true;
	}

	public function hapusIssue($idi,$idb,$jml,$ttl){
		$sql = "UPDATE barang SET stok=stok+'$jml', total=total+'$ttl' WHERE id_brg='$idb' ";//update stok barang
		$this->db->query($sql);

		$this->db->delete('issue_bc', array('id_bc'=>$idi)); //proses hapus barang pada tabel issue
		return true;
	}

}