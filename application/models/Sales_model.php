<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Sales_model extends CI_Model
{
	
	public function tampilSales(){
		$this->db->order_by('tgl_sales','DESC');
		$this->db->from('sales');
		//$this->db->join('issue_barang','sales.ttl_issue=issue_barang.total_issue');
		$this->db->group_by('tgl_sales');
		return $this->db->get()->result();
	}

	public function IdSales(){
		$this->db->select('RIGHT(sales.id_sales,3) AS id_sales', FALSE);
		$this->db->order_by('id_sales','DESC');
		$this->db->limit(1);
		$query = $this->db->get('sales');

		if($query->num_rows() <> 0){
			$data = $query->row();
			$kdsl = intval($data->id_sales)+1;
		}else{
			$kdsl = 1;
		}

		$tgl = date('dmY');
		$max = str_pad($kdsl, 4,"0", STR_PAD_LEFT);
		$ids = "SR"."6".$tgl.$max;
		return $ids;
	}

	public function totalIssue(){
		$tgl = date('m');

		//$sql = "SELECT SUM(total_issue) AS total FROM issue_barang  GROUP BY date(tgl_issue)";
		$this->db->select('issue_barang.tgl_issue','issue_barang.id_issue');
		$this->db->select_sum('total_issue','total');
		$this->db->from('issue_barang');
		$this->db->where('month(tgl_issue)',$tgl);
		$this->db->group_by('date(tgl_issue)');
		$this->db->order_by('tgl_issue','DESC');
		return $this->db->get()->result();
	}

	public function t_sales()
	{
		//$tl = date('m');
		$this->db->select_sum('jml_sales','sal');
		$this->db->from('sales');
		//$this->db->where('month(tgl_sales)',$tl);
		return $this->db->get()->result();
	}

	public function t_issue()
	{
		//$tg = date('m');
		$this->db->select_sum('total_issue','tis');
		$this->db->from('issue_barang');
		//$this->db->where('month(tgl_issue)', $tg);
		return $this->db->get()->result();
	}

	public function addSales($data){
		$this->db->insert('sales',$data);
		return true;
	}

	public function ubahSales($id,$data){
		$this->db->where('id_sales',$id);
		$this->db->update('sales',$data);
		return true;
	}

	public function hapusSales($id)
	{
		$this->db->delete('sales',array('id_sales'=>$id));
		return true;
	}
}