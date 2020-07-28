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
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('login','Anda belum login, Silahkan Login Terlebih dahulu !');
            redirect('login');
        }
        $this->load->model('users_model');
        $this->load->model('bimbingan_model');
    }
    
	public function user($level)
	{
        $this->load->model('kategori_skripsi_model');
        $data['title'] = $level;
        $data['user'] = $this->users_model->getByLevel($level)->result();
        $data['kategori'] = $this->kategori_skripsi_model->getAll()->result();
        $data['userModal'] = $this->users_model->getByLevel($level)->result();
        $data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'));
        $data['userNotif'] = $this->users_model->getByLevel('mahasiswa')->result();
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
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
            if ($this->session->userdata('level')=="dosen") {
                redirect('backend/users/editProfil');
            }else{
                redirect('backend/users/user/'.$level);
            }
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Data Gagal diedit !');
            if ($this->session->userdata('level')=="dosen") {
                redirect('backend/users/editProfil');
            }else{
                redirect('backend/users/user/'.$level);
            }
        }
    }

    public function editProfil()
    {
        $data['userNotif'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'));
        $data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/editProfil',$data);
        $this->load->view('backend/include/footer.php');
    }

    public function editAturan()
    {
        $data = $this->users_model->editAturan();
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Data Berhasil disimpan !');
            redirect('backend/users/editProfil');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Data Gagal diedit !');
            redirect('backend/users/editProfil');
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

    public function mahasiswa(){
        $data['user'] = $this->users_model->getById($this->session->userdata('id'))->row();
        $this->load->model('skripsi_model');
        $this->load->model('bimbingan_model');
        $data['title'] = "dashboard";
        $data['skripsi'] = $this->skripsi_model->getById($this->session->userdata('id'))->row();
        $data['dosen'] = $this->users_model->getByLevel('Dosen')->result();
        $data['dosen2'] = $this->users_model->getByLevel('Dosen')->result();
        $skripsi = $this->skripsi_model->getByLevel('aktif')->result();
        $dospem1 = "";
        $dospem2 = "";
        foreach($skripsi as $s):
			if($s->mahasiswa == $this->session->userdata('id')){
				$dospem1 = $s->dospem1;
				$dospem2 = $s->dospem2;
			}
        endforeach;
        $data['bimbinganBaruDospem1'] = $this->bimbingan_model->getByStatusAndDospem('0',$this->session->userdata('id'),$dospem1)->result();
		$data['bimbinganBaruDospem2'] = $this->bimbingan_model->getByStatusAndDospem('0',$this->session->userdata('id'),$dospem2)->result();
        $data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'))->result();
        $this->load->view('frontend/mahasiswa/include/header',$data);
        $this->load->view('frontend/mahasiswa/mahasiswa',$data);
        $this->load->view('frontend/mahasiswa/include/footer');
    }

    public function gantiPassword()
    {
        $oldPass = $this->input->post('old_pass');
        $newPass = $this->input->post('new_pass');
        $confPass = $this->input->post('conf_pass');
        
        if ($newPass != $confPass) {
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Password Baru dengan Konfirmasi beda  !');
            redirect('backend/users/editProfil');
        }else{
            $check = $this->users_model->cek($oldPass);
            if ($check == FALSE) {
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('status','Password Lama tidak cocok !');
                redirect('backend/users/editProfil');
            }else{
                $ganti = $this->users_model->gantiPassword($newPass);
                if ($ganti==TRUE) {
                    $this->session->set_flashdata('gantiPass','1');
                    redirect('login/logout');
                }else{
                    $this->session->set_flashdata('kondisi','0');
                    $this->session->set_flashdata('status','Password gagal diganti !');
                    redirect('backend/users/editProfil');
                }
            }
        }
    }
}
