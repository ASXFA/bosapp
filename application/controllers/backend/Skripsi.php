<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Controller {

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
        $this->load->model('skripsi_model');
        $this->load->model('bimbingan_model');
    }
    
	public function skripsi($statusMhs)
	{
        $this->load->model('kategori_skripsi_model');
        $this->load->model('users_model');
        $data['title'] = $statusMhs;
        $data['skripsi'] = $this->skripsi_model->getByLevel($statusMhs)->result();
        $data['users'] = $this->users_model->getAll()->result();
        $data['kategori_skripsi'] = $this->kategori_skripsi_model->getAll()->result();
        $data['skripsiModal'] = $this->skripsi_model->getByLevel($statusMhs)->result();
        $data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'));
        $data['userNotif'] = $this->users_model->getByLevel('mahasiswa')->result();
        // $data['kategori'] = $this->kategori_skripsi_model->getAll()->result();
        // $data['userModal'] = $this->users_model->getByLevel($level)->result();
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/skripsi',$data);
        $this->load->view('backend/include/footer.php');
    }
    
    public function gantiStatus($id,$status,$level){
        if ($status == "lulus") {
            $data = $this->skripsi_model->gantiStatusMHS($id,$status);
        }else{
            $data = $this->skripsi_model->gantiStatus($id,$status);
        }
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
