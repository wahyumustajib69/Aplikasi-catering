<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barangmasuk extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Barangmasuk_model');
	}

	public function index(){
		$data['brg_masuk'] 	= $this->Barangmasuk_model->tampilBarangMasuk();
		$data['join_masuk'] = $this->Barangmasuk_model->joinSup();
		$data['id_masuk']	= $this->Barangmasuk_model->idMasuk();
		$data['sup']		= $this->Barangmasuk_model->supplier();
		$data['tmpbrg']	= $this->Barangmasuk_model->dataBrg();
		$this->load->view('template/header');
		$this->load->view('barang/barang_masuk', $data);
		$this->load->view('template/footer');
	}

	public function simpanMasuk(){
		$jml = $this->input->post('jml');
		$hrg = $this->input->post('harga');
		$ttl = $jml*$hrg;
		$data = array(
			'id_masuk'	=> $this->input->post('id_masuk'),
			'id_brg'	=> $this->input->post('id_brg'),
			'tgl_masuk'	=> $this->input->post('tgl'),
			'supplier'	=> $this->input->post('sup'),
			'jml_masuk'	=> $this->input->post('jml'),
			'hrga'		=> $this->input->post('harga'),
			'ttl_hrga'	=> $ttl
		);
		$this->Barangmasuk_model->addData($data);
		$this->Barangmasuk_model->stokMasuk($data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('barangmasuk');
	}

	public function updateMasuk(){
		$id 	= $this->input->post('id_masuk');
		$jml 	= $this->input->post('jml');
		$hrg 	= $this->input->post('harga');
		$jlama	= $this->input->post('jml_lama');
		$ttl 	= $jml*$hrg;
		$data = array(
			'id_masuk'	=> $this->input->post('id_masuk'),
			'id_brg'	=> $this->input->post('id_brg2'),
			'tgl_masuk'	=> $this->input->post('tgl'),
			'supplier'	=> $this->input->post('sup'),
			'jml_masuk'	=> $this->input->post('jml'),
			'hrga'		=> $this->input->post('harga'),
			'ttl_hrga'	=> $ttl
		);
		$this->Barangmasuk_model->updateData($data,$id);
		$this->Barangmasuk_model->stokMasukEdit($data, $jlama);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('barangmasuk');
	}

	public function deleteMasuk(){
		$id = $this->input->post('id_hapus');
		$data = array(
			'id_brg'	=> $this->input->post('id_brg'),
			'stok'		=> $this->input->post('jmasuk'),
			'harga'		=> $this->input->post('hrga')
		);
		$this->Barangmasuk_model->hapusMasuk($data,$id);
		//$this->Barangmasuk_model->hapusStok($data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('barangmasuk');
	}

}