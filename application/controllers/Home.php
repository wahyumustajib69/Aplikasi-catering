<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != 'login'){
			redirect(base_url('login'));
		}
		$this->load->model('Home_model');
	}

	public function index(){
		$data['t_brg'] = $this->Home_model->totalBarang();
		$data['t_sup'] = $this->Home_model->totalSupplier();
		$data['b_mas'] = $this->Home_model->barangMasuk();
		$data['issue'] = $this->Home_model->issueBarang();
		$data['graph'] = $this->Home_model->jenisIssue();
		$this->load->view('template/header');
		$this->load->view('template/index',$data);
		$this->load->view('template/footer',$data);
	}
}