<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
		//$this->load->library('form_validation');
	}

	public function index(){
		$data['barang']		= $this->Barang_model->tampilBarang();
		$data['ktg_brg'] 	= $this->Barang_model->joinKtgBrg();
		$data['tmp_ktg']	= $this->Barang_model->pilihKategori();
		$data['tmp_sat']	= $this->Barang_model->pilihSatuan();
		$data['kode_brg']	= $this->Barang_model->kodeBarang();
		$this->load->view('template/header');
		$this->load->view('barang/barang', $data);
		$this->load->view('template/footer');
	}

	public function simpanBarang(){
		$stok 	= $this->input->post('stok');
		$harga 	= $this->input->post('harga');
		$total 	= $stok*$harga;
		$data = array(
			'id_brg' 	=> $this->input->post('id_brg'),
			'nm_brg' 	=> $this->input->post('nm_brg'),
			'ktg' 		=> $this->input->post('ktg'),
			'satuan'	=> $this->input->post('sat'),
			'stok' 		=> $this->input->post('stok'),
			'harga' 	=> $this->input->post('harga'),
			'total' 	=> $total
		);
		$this->Barang_model->addBarang($data);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('barang');
	}

	public function updateBarang(){
		$id = $this->input->post('id_brg');
		$stok 	= $this->input->post('stok');
		$harga 	= $this->input->post('harga');
		$total 	= $stok*$harga;
		$data = array(
			'nm_brg' 	=> $this->input->post('nm_brg'),
			'ktg' 		=> $this->input->post('ktg'),
			'satuan'	=> $this->input->post('sat'),
			'stok' 		=> $this->input->post('stok'),
			'harga' 	=> $this->input->post('harga'),
			'total' 	=> $total
		);
		$this->Barang_model->ubahBarang($data,$id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Diupdate <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('barang');
	}

	public function deleteBarang(){
		$id = $this->input->post('id_hapus');
		$this->Barang_model->hapusBarang($id);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('barang');
	}



}