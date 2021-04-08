<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kategori extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('login'));
		}
		$this->load->model('Kategori_model');
	}

	public function index(){
		$data['kode'] 		= $this->Kategori_model->idKategori();
		$data['kategori'] 	= $this->Kategori_model->TampilKategori();
		$this->load->view('template/header');
		$this->load->view('barang/kategori', $data);
		$this->load->view('template/footer');
	}

	public function simpanKategori(){
		$data = array(
			'id_ktg' 	=> $this->input->post('id_ktg'),
			'nm_ktg'	=> $this->input->post('nm_ktg'),
			'ket'		=> $this->input->post('ket')
		);
		$this->db->insert('kategori', $data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('kategori');
	}

	public function updateKategori(){
		$id = $this->input->post('id_ktg');
		$data = array(
			'nm_ktg'	=> $this->input->post('nm_ktg'),
			'ket'		=> $this->input->post('ket')
		);
		$this->Kategori_model->ubahKategori($data, $id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('kategori');
	}

	public function deleteKategori(){
		$id = $this->input->post('id_hapus');
		$this->Kategori_model->hapusKategori($id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('kategori');
	}


}