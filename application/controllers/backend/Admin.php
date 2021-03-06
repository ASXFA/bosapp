<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('is_login')!=1) {
            $this->session->set_userdata('login','Anda belum login, Silahkan Login Terlebih dahulu !');
            redirect(base_url());
        }
    }
    
	public function index()
	{
		$this->load->model('users_model');
		$this->load->model('kategori_skripsi_model');
		$this->load->model('skripsi_model');

		$data['mhs'] = $this->users_model->getByLevel('mahasiswa')->num_rows();
		$data['dosen'] = $this->users_model->getByLevel('dosen')->num_rows();
		$data['kategori'] = $this->kategori_skripsi_model->getAll()->num_rows();
		$data['skripsi'] = $this->skripsi_model->getByLevel('lulus')->num_rows();

        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php');
        $this->load->view('backend/dashboard',$data);
        $this->load->view('backend/include/footer.php');
	}
}
