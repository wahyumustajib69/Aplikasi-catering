<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Issue_model');
	}

	public function index(){
		$data['issue'] 		= $this->Issue_model->tampilIssue();
		$data['id_issue'] 	= $this->Issue_model->idIssue();
		$data['barang']		= $this->Issue_model->tampilBarang();
		$this->load->view('template/header');
		$this->load->view('issue/issuebarang', $data);
		$this->load->view('template/footer');
	}

	public function simpanIssue(){
		$idb = $this->input->post('nm_brg');
		$sql = "SELECT harga FROM barang WHERE id_brg='$idb' ";
		$query = $this->db->query($sql)->row();
		$hrg = $query->harga;

		$jml = $this->input->post('jml');
		$ttl = $hrg*$jml;
		$data = array(
			'id_issue'		=> $this->input->post('id_issue'),
			'id_brg'		=> $this->input->post('nm_brg'),
			'tgl_issue'		=> $this->input->post('tgl'),
			'jml_issue'		=> $this->input->post('jml'),
			'total_issue'	=> $ttl,
			'ket_issue'		=> $this->input->post('ket')
		);
		$this->Issue_model->addIssue($data,$hrg);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('issue');
	}

	public function updateIssue(){
		$idb 	= $this->input->post('nm_brg2');
		$sql 	= "SELECT harga FROM barang WHERE id_brg='$idb' ";
		$query 	= $this->db->query($sql)->row();
		$hrg 	= $query->harga;
		$jlm 	= $this->input->post('jml_lama');

		$jml 	= $this->input->post('jml');
		$ttl 	= $hrg*$jml;

		$data = array(
			'id_issue' 		=> $this->input->post('id_issue'),
			'id_brg' 		=> $this->input->post('nm_brg2'),
			'tgl_issue' 	=> $this->input->post('tgl'),
			'jml_issue' 	=> $this->input->post('jml'),
			'total_issue' 	=> $ttl,
			'ket_issue' 	=> $this->input->post('ket')
		);

		$this->Issue_model->ubahIssue($data,$hrg,$jlm);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('issue');
	}

	public function deleteIssue(){
		$idb = $this->input->post('id_brg');
		$jml = $this->input->post('jml');
		$idi = $this->input->post('id_hapus');
		$sql = "SELECT harga FROM barang WHERE id_brg='$idb' ";
		$qry = $this->db->query($sql)->row();
		$hrg = $qry->harga;
		$ttl = $jml*$hrg;

		$this->Issue_model->hapusIssue($idi,$idb,$jml,$ttl);
		$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-success" role="alert"><i class="fa fa-check-circle fa-2x"></i> Data Berhasil Dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('issue');
	}
}