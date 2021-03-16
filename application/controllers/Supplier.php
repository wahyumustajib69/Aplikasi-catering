<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Supplier extends CI_Controller{
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Supplier_model');
	}

	public function index(){
		$data['id_supplier'] 	= $this->Supplier_model->idSupplier();
		$data['supplier'] 		= $this->Supplier_model->tampilSupplier();
		$data['ktg_sup'] 		= $this->Supplier_model->selectKategori();
		$data['join_ktg_sup']	= $this->Supplier_model->joinSupdanKtg();
		$this->load->view('template/header');
		$this->load->view('supplier/supplier', $data);
		$this->load->view('template/footer');
	}

	public function simpanSupplier(){
		$data = array(
			'id_sup'	=> $this->input->post('id_sup'),
			'nm_sup'	=> $this->input->post('nm_sup'),
			'ktg'		=> $this->input->post('ktg'),
			'telp'		=> $this->input->post('telp_sup'),
			'email'		=> $this->input->post('email_sup'),
			'almt'		=> $this->input->post('alamat')
		);
		$this->db->insert('supplier', $data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Supplier Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('supplier');
	}

	public function updateSupplier(){
		$id = $this->input->post('id_sup');
		$data = array(
			'nm_sup'	=> $this->input->post('nm_sup'),
			'ktg'		=> $this->input->post('ktg'),
			'telp'		=> $this->input->post('telp_sup'),
			'email'		=> $this->input->post('email_sup'),
			'almt'		=> $this->input->post('alamat')
		);
		$this->Supplier_model->ubahSupplier($data, $id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Supplier Berhasil Diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('supplier');
	}

	public function deleteSupplier(){
		$id = $this->input->post('id_hapus');
		$this->Supplier_model->hapusSupplier($id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Supplier Berhasil Dihapus !!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('supplier');
	}

}