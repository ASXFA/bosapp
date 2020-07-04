<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        if ($this->session->userdata('is_login')==1) {
            redirect('admin');
		}
		$this->session->sess_destroy();
		$this->load->view('login');
	}

	public function aksi_login()
	{
		$this->load->model('users_model');
		$check = $this->users_model->check();
		if ($check->num_rows() > 0) {
			foreach($check->result() as $user){
				$sess = array(
					'is_login' => 1,
					'nama'=> $user->nama,
					'nomor_induk'=> $user->nomor_induk,
					'jenis_kelamin'=> $user->jenis_kelamin,
					'telepon' => $user->telepon,
					'email' => $user->email,
					'konsentrasi' => $user->konsentrasi,
					'angkatan' => $user->angkatan,
					'jabatan' => $user->jabatan,
					'status' => $user->status,
					'foto' => $user->foto,
					'level' => $user->level,
					'username' => $user->username

				);
				$this->session->set_userdata($sess);
			}
			if ($this->session->userdata('level')=="admin") {
				$this->session->set_userdata('login','Selamat Datang !');
				redirect('admin');
			}else if($this->session->useradata('level')=="mahasiswa"){
				echo "Mahasiswa";
			}else if($this->session->useradata('level')=="dosen"){
				echo "Dosen";
			}
		}else{
			$this->session->set_userdata('login','Password atau Username anda tidak cocok !');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->set_userdata('is_login','0');
		$this->session->sess_destroy();
		redirect('login');
	}

}
