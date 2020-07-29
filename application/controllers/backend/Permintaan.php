<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

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
            redirect('login');
        }
        $this->load->model('permintaan_model');
    }

    public function index()
    {
        $this->load->model('users_model');
        $this->load->model('skripsi_model');
        $data['permintaan'] = $this->permintaan_model->getAll()->result();
        $data['user'] = $this->users_model->getAll()->result();
        $data['title'] = "permintaan";
        if ($this->session->userdata('level')=="admin") {
            $data['permintaanBaru'] = $this->permintaan_model->getByStatus(0);
			$data['skripsiArsipBaru'] = $this->skripsi_model->getByStatusBaru('lulus','unpublish');
        }
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/permintaan',$data);
        $this->load->view('backend/include/footer.php');
    }

    public function gantiStatus($id_permintaan,$status,$id)
    {
        if ($status == 1) {
            $this->permintaan_model->gantiStatus($id_permintaan,$status);
            redirect('backend/users/userEdit/'.$id);
        }else if($status == 2){
            $this->permintaan_model->gantiStatus($id_permintaan,$status);
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Status Berhasil diganti !');
            redirect('backend/permintaan');
        }
    }
    
	public function ajukan()
	{
        $data['title'] = "Ajukan";
        $this->load->view('frontend/mahasiswa/include/header',$data);
        $this->load->view('frontend/mahasiswa/editProfil');
        $this->load->view('frontend/mahasiswa/include/footer');
    }
    
    public function tambah()
    {
        $data = $this->permintaan_model->tambah();
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Status Berhasil diganti !');
            redirect('backend/permintaan/ajukan');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Status Berhasil diganti !');
            redirect('backend/permintaan/ajukan');
        }
    }
}
