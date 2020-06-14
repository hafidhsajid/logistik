<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->API = "http://localhost:8000/api";
		$this->load->library('session');
		$this->load->library('curl');
		$this->load->helper('form');
		$this->load->helper('url');
		//load library form validasi
		$this->load->library('form_validation');
		//load model admin
		$this->load->model('admin');
	}

	public function index()
	{
		if ($this->admin->logged_id()) {
			//jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
			redirect("barang");
			echo var_dump($_SESSION);
		} else {

			//jika session belum terdaftar

			//set form validation
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

			//cek validasi
			if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
				$username = $this->input->post("username", TRUE);
				$password = md5($this->input->post('password', TRUE));
				//checking data via model
				// echo $username . '<br>' . $password;
				$checking = $this->admin->check_login($username, $password);
				//jika ditemukan, maka create session
				// echo var_dump($checking);
				if ($checking == "gagal") {

					$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
					$this->load->view('login', $data);
				} else {
					$asdf = array(
						'id'   => $checking->id,
						'nama' => $checking->nama,
						'password' => $checking->password,
					);
					//set session userdata
					$this->session->set_userdata($asdf);

					redirect('barang');
				}
			} else {

				$this->load->view('login');
			}
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
