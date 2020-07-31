<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

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
        $this->load->model('quotes_model');
    }

    public function index()
    {
        $this->load->model('permintaan_model');
        $this->load->model('users_model');
        $this->load->model('skripsi_model');
        $data['quotes'] = $this->quotes_model->getAll()->result();
        $data['quotesModal'] = $this->quotes_model->getAll()->result();
        $data['title'] = "Quotes";
        if ($this->session->userdata('level')=="admin") {
            $data['permintaanBaru'] = $this->permintaan_model->getByStatus(0);
			$data['skripsiArsipBaru'] = $this->skripsi_model->getByStatusBaru('lulus','unpublish');
        }
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/quotes',$data);
        $this->load->view('backend/include/footer.php');
    }
    
    public function tambah()
    {
        $data = $this->quotes_model->tambah();
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Quotes berhasil ditambahkan !');
            redirect('backend/quotes');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Quotes gagal ditambahkan !');
            redirect('backend/quotes');
        }
    }

    public function edit($id)
    {
        $data = $this->quotes_model->edit($id);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Quotes berhasil diubah !');
            redirect('backend/quotes');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Quotes gagal diubah !');
            redirect('backend/quotes');
        }
    }

    public function delete($id)
    {
        $data = $this->quotes_model->delete($id);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Quotes berhasil dihapus !');
            redirect('backend/quotes');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Quotes gagal dihapus !');
            redirect('backend/quotes');
        }
    }
}
