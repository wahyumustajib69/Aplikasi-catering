<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Sales extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('login'));
		}
		$this->load->model('Sales_model');
	}

	public function index(){
		$data['sales'] = $this->Sales_model->tampilSales();
		$data['id_sl'] = $this->Sales_model->IdSales();
		$data['tt_sl'] = $this->Sales_model->totalIssue();
		$data['t_sal'] = $this->Sales_model->t_sales();
		$data['t_isu'] = $this->Sales_model->t_issue();
		$this->load->view('template/header');
		$this->load->view('sales/sales',$data);
		$this->load->view('template/footer');
	}

	public function simpanSales(){
		$data = array(
			'id_sales'	=> $this->input->post('id_sales'),
			'tgl_sales' => $this->input->post('tgl'),
			'jml_sales' => $this->input->post('jml'),
			'ttl_issue' => $this->input->post('tis')
		);
		$this->Sales_model->addSales($data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Sales Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('sales');
	}

	public function updateSales(){
		$id = $this->input->post('id_sales');
		$data = array(
			'tgl_sales' => $this->input->post('tgl'),
			'jml_sales' => $this->input->post('jml'),
			'ttl_issue' => $this->input->post('tis')
		);
		$this->Sales_model->ubahSales($id,$data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Sales Berhasil Diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('sales');
	}

	public function deleteSales(){
		$id = $this->input->post('id_sales');
		$this->Sales_model->hapusSales($id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Sales Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('sales');
	}
}