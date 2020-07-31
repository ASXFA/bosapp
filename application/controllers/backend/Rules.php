<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends CI_Controller {

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
        $this->load->model('rules_model');
    }
    
    public function edit($id)
    {
        $data = $this->rules_model->edit($id);
        if ($data == TRUE) {
            $this->session->set_flashdata('kondisi','1');
            $this->session->set_flashdata('status','Rules berhasil diubah !');
            redirect('backend/permintaan');
        }else{
            $this->session->set_flashdata('kondisi','0');
            $this->session->set_flashdata('status','Rules gagal diubah !');
            redirect('backend/permintaan');
        }
    }
}
