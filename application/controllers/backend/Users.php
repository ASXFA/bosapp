<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
        $this->load->model('users_model');
    }
    
	public function user($level)
	{
        $this->load->model('kategori_skripsi_model');
        $data['title'] = $level;
        $data['user'] = $this->users_model->getByLevel($level)->result();
        $data['kategori'] = $this->kategori_skripsi_model->getAll()->result();
        $data['userModal'] = $this->users_model->getByLevel($level)->result();
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php');
        $this->load->view('backend/users',$data);
        $this->load->view('backend/include/footer.php');
    }
    
    public function gantiStatus($id,$status,$level){
        if ($status=="block") {
            $newStatus = "tidak aktif";
        }else{
            $newStatus = "aktif";
        }
        $data = $this->users_model->gantiStatus($id,$newStatus);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Status Berhasil diganti !');
            redirect('backend/users/user/'.$level);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Status Gagal diganti !');
            redirect('backend/users/user/'.$level);
        }
    }

    public function tambah($level)
    {
        $config['upload_path']          = './assets/image/'.$level.'/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 15000;
		$config['max_width']            = 10000;
        $config['max_height']           = 10000;
        
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('foto')) {
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Gambar terlalu besar !');
            redirect('backend/users/user/'.$level);
        }else{
            $foto = $this->upload->data('file_name');
            $data = $this->users_model->tambah($foto,$level);
            if ($data == TRUE) {
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('status','Data Berhasil disimpan !');
                redirect('backend/users/user/'.$level);
            }else{
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('status','Data Gagal diedit !');
                redirect('backend/users/user/'.$level);
            }
        }
    }

    public function edit($id,$level)
    {
        $config['upload_path']          = './assets/image/'.$level.'/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 15000;
		$config['max_width']            = 10000;
        $config['max_height']           = 10000;
        
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('new_foto')) {
            $foto = $this->input->post('old_foto');
        }else{
            $foto = $this->upload->data('file_name');
        }

        $data = $this->users_model->edit($id,$foto);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Data Berhasil disimpan !');
            redirect('backend/users/user/'.$level);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Data Gagal diedit !');
            redirect('backend/users/user/'.$level);
        }
    }

    public function delete($id,$level)
    {
        $data = $this->users_model->delete($id);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Data Berhasil dihapus !');
            redirect('backend/users/user/'.$level);
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Data Gagal dihapus !');
            redirect('backend/users/user/'.$level);
        }
    }

    public function get_user()
    {
        $data = $this->db->getByLevel("mahasiswa")->result();
        json_encode($data);
    }
}
