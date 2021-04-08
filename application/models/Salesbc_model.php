<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesbc_model extends CI_Model
{
	
	public function tampilData()
	{
		$this->db->order_by('tgl_sbc','DESC');
		$this->db->from('sales_bc');
		$this->db->group_by('tgl_sbc');
		return $this->db->get()->result();
	}

	public function IdBc()
	{
		$this->db->select('RIGHT(sales_bc.id_sbc,3) AS id_bc', FALSE);
		$this->db->order_by('id_sbc','DESC');
		$this->db->limit(1);
		$query = $this->db->get('sales_bc');

		if($query->num_rows() <> 0){
			$data = $query->row();
			$idbc = intval($data->id_bc)+1;
		}else{
			$idbc = 1;
		}

		$tgl = date('dmY');
		$max = str_pad($idbc, 4,"0", STR_PAD_LEFT);
		$idb = "SB"."7".$tgl.$max;
		return $idb;
	}

	public function totalIssue(){
		//$tgl = date('m');

		//$sql = "SELECT SUM(total_issue) AS total FROM issue_barang  GROUP BY date(tgl_issue)";
		$this->db->select('issue_bc.tgl_bc','issue_bc.id_bc');
		$this->db->select_sum('total_bc','total');
		$this->db->from('issue_bc');
		//$this->db->where('month(tgl_bc)',$tgl);
		$this->db->group_by('date(tgl_bc)');
		$this->db->order_by('tgl_bc','DESC');
		return $this->db->get()->result();
	}

	public function t_sales()
	{
		//$tl = date('m');
		$this->db->select_sum('jml_sbc','sal');
		$this->db->from('sales_bc');
		//$this->db->where('month(tgl_sbc)',$tl);
		return $this->db->get()->result();
	}

	public function t_issue()
	{
		//$tg = date('m');
		$this->db->select_sum('total_bc','tis');
		$this->db->from('issue_bc');
		//$this->db->where('month(tgl_bc)', $tg);
		return $this->db->get()->result();
	}

	public function addSales($data)
	{
		$this->db->insert('sales_bc',$data);
		return true;
	}

	public function editSales($id,$data)
	{
		$this->db->where('id_sbc',$id);
		$this->db->update('sales_bc',$data);
		return true;
	}

	public function hapusSales($id)
	{
		$this->db->delete('sales_bc',array('id_sbc'=>$id));
		return true;
	}

}