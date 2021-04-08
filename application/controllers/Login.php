<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		
		$this->load->view('template/login');
		$this->load->view('template/footer');
	}

	public function action()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$where = array(
			'username' => $user,
			'password' => md5($pass)
		);

		$cek = $this->Login_model->periksa('admin', $where)->num_rows();
		if($cek > 0) {
			$data = array(
				'nama' 		=> $user,
				'status'	=> "login"
			);
			$this->session->set_userdata($data);
			redirect('home');
		}else{
			$this->session->set_flashdata('notif', '<div id="pesan" class="alert alert-danger" role="alert"><i class="fa fa-times-circle fa-2x"></i> Password atau Username SALAH <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}