<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_model extends CI_Model
{
	
	public function tampilIssue(){
		$this->db->order_by('tgl_issue','DESC');
		$this->db->select('*');
		$this->db->from('issue_barang');
		$this->db->join('barang','issue_barang.id_brg=barang.id_brg');
		return $this->db->get()->result();
	}

	public function idIssue(){
		$this->db->select('RIGHT(issue_barang.id_issue,3) AS id_issue', FALSE);
		$this->db->order_by('id_issue','DESC');
		$this->db->limit(1);
		$query = $this->db->get('issue_barang');

		if($query->num_rows() <> 0){
			$data = $query->row();
			$kd_is = intval($data->id_issue)+1;
		}else{
			$kd_is = 1;
		}

		$tgl = date('dmY');
		$max = str_pad($kd_is, 4,"0", STR_PAD_LEFT);
		$tmp = "IS"."5".$tgl.$max;
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
		$this->db->insert('issue_barang',$data);
		return true;
	}

	public function ubahIssue($data,$hrg,$jlm){
		$idi = $data['id_issue'];
		$idb = $data['id_brg'];
		$jml = $data['jml_issue'];

		$ttl = $hrg*$jml; //total baru setelah diupdate
		$tlm = $hrg*$jlm; //total lama sebelum diupdate
		$sql = "UPDATE barang set stok=(stok+'$jlm')-'$jml', total=(total+'$tlm')-'$ttl' WHERE id_brg='$idb'";
		$this->db->query($sql);

		$this->db->where('id_issue',$idi);
		$this->db->update('issue_barang',$data);
		return true;
	}

	public function hapusIssue($idi,$idb,$jml,$ttl){
		$sql = "UPDATE barang SET stok=stok+'$jml', total=total+'$ttl' WHERE id_brg='$idb' ";//update stok barang
		$this->db->query($sql);

		$this->db->delete('issue_barang', array('id_issue'=>$idi)); //proses hapus barang pada tabel issue
		return true;
	}

}