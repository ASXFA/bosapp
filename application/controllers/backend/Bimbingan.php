<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

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
        // $this->load->model('skripsi_model');
    }
    
	public function bimbingan($idDosen)
	{
        // $this->load->model('kategori_skripsi_model');
        $this->load->model('users_model');
        $data['title'] = "bimbingan";
        // $data['skripsi'] = $this->skripsi_model->getByLevel($statusMhs)->result();
        $data['dosen'] = $this->users_model->getById($idDosen)->row();
        // $data['kategori_skripsi'] = $this->kategori_skripsi_model->getAll()->result();
        // $data['skripsiModal'] = $this->skripsi_model->getByLevel($statusMhs)->result();
        // $data['kategori'] = $this->kategori_skripsi_model->getAll()->result();
        // $data['userModal'] = $this->users_model->getByLevel($level)->result();
        $this->load->view('frontend/mahasiswa/include/header',$data);
        $this->load->view('frontend/mahasiswa/bimbingan',$data);
        $this->load->view('frontend/mahasiswa/include/footer');
    }
    
    public function gantiStatus($id,$status,$level){
        $data = $this->skripsi_model->gantiStatus($id,$status);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Status Berhasil diganti !');
            redirect('backend/skripsi/skripsi/'.$level);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Status Gagal diganti !');
            redirect('backend/skripsi/skripsi/'.$level);
        }
    }

    public function tambah($level)
    {
        $config['upload_path']          = './assets/file/skripsi/'.$level.'/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5120;
        
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('file')) {
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','File terlalu besar atau Ekstensi bukan PDF !');
            redirect('backend/skripsi/skripsi/'.$level);
        }else{
            $file_name = $this->upload->data('file_name');
            $file_size = $this->upload->data('file_size');
            $data = $this->skripsi_model->tambah($file_name,$file_size,$level);
            if ($data == TRUE) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('status','Data Berhasil disimpan !');
                redirect('backend/skripsi/skripsi/'.$level);
            }else{
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('status','Data Gagal disimpan !');
                redirect('backend/skripsi/skripsi/'.$level);
            }
        }
    }

    public function edit($id,$level)
    {
        $config['upload_path']          = './assets/file/skripsi/'.$level.'/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5120;
        
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('new_file')) {
            $file_name = $this->input->post('old_file');
            $file_size = $this->input->post('file_size');
        }else{
            $file_name= $this->upload->data('file_name');
            $file_size = $this->upload->data('file_size');
        }

        $data = $this->skripsi_model->edit($id,$file_name,$file_size,$level);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Data Berhasil disimpan !');
            redirect('backend/skripsi/skripsi/'.$level);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Data Gagal diedit !');
            redirect('backend/skripsi/skripsi/'.$level);
        }
    }

    public function delete($id,$level)
    {
        $data = $this->skripsi_model->delete($id);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Data Berhasil dihapus !');
            redirect('backend/skripsi/skripsi/'.$level);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Data Gagal dihapus !');
            redirect('backend/skripsi/skripsi/'.$level);
        }
    }

}