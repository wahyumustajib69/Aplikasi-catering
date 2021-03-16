<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller{
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Satuan_model');
	}

	public function index(){
		$data['id_satuan'] 	= $this->Satuan_model->idSatuan();
		$data['satuan'] 	= $this->Satuan_model->tampilSatuan();
		$this->load->view('template/header');
		$this->load->view('barang/satuan', $data);
		$this->load->view('template/footer');
	}

	public function simpanSatuan(){
		$data = array(
			'id_sat'	=> $this->input->post('id_sat'),
			'nm_sat'	=> $this->input->post('nm_sat'),
			'ktrg'		=> $this->input->post('ket')
		);
		$this->db->insert('satuan', $data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('satuan');
	}

	public function updateSatuan(){
		$id = $this->input->post('id_sat');
		$data = array(
			'nm_sat'	=>$this->input->post('nm_sat'),
			'ktrg'		=>$this->input->post('ket')
		);
		$this->Satuan_model->ubahSatuan($data, $id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('satuan');
	}

	public function hapusSatuan(){
		$id = $this->input->post('id_hapus');
		$this->Satuan_model->hapusSatuan($id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('satuan');
	}
}