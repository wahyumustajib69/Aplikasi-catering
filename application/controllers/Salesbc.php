<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Salesbc extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('login'));
		}
		$this->load->model('Salesbc_model');
	}

	public function index()
	{
		$data['sales_bc'] 	= $this->Salesbc_model->tampilData();
		$data['id_bc'] 		= $this->Salesbc_model->IdBc();
		$data['total']		= $this->Salesbc_model->totalIssue();
		$data['t_sales'] 	= $this->Salesbc_model->t_sales();
		$data['t_issue'] 	= $this->Salesbc_model->t_issue();
		$this->load->view('template/header');
		$this->load->view('sales/salesbc', $data);
		$this->load->view('template/footer');
	}


	public function simpanSales()
	{
		$data = array(
			'id_sbc'	=> $this->input->post('id_sales'),
			'tgl_sbc' 	=> $this->input->post('tgl'),
			'jml_sbc' 	=> $this->input->post('jml'),
			'ttl_ibc' 	=> $this->input->post('tis')
		);
		$this->Salesbc_model->addSales($data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Sales Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('salesbc');
	}

	public function updateSales()
	{
		$id = $this->input->post('id_sales');
		$data = array(
			'tgl_sbc' 	=> $this->input->post('tgl'),
			'jml_sbc' 	=> $this->input->post('jml'),
			'ttl_ibc' 	=> $this->input->post('tis')
		);
		$this->Salesbc_model->editSales($id,$data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Sales Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('salesbc');
	}

	public function deleteSales()
	{
		$id = $this->input->post('id_sales');
		$this->Salesbc_model->hapusSales($id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Sales Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('salesbc');
	}

}