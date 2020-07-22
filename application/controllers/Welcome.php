<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('users_model');
		$this->load->model('skripsi_model');
		$data['mahasiswa'] = $this->users_model->getByLevel('mahasiswa')->num_rows();
		$data['dosen'] = $this->users_model->getByLevel('dosen')->num_rows();
		$data['skripsi'] = $this->skripsi_model->getByLevel('lulus')->num_rows();
		$this->load->view('frontend/include/header');
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/include/footer');
	}

	public function skripsi(){
		$this->load->model('skripsi_model');
		$data['skripsi'] = $this->skripsi_model->getByLevel('lulus')->result();
		$this->load->view('frontend/skripsi',$data);
	}
}
