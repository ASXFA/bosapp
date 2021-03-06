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
        $this->load->model('bimbingan_model');
    }

    public function index()
    {
        $this->load->model('users_model');
        $this->load->model('skripsi_model');
        $this->load->model('permintaan_model');
        $data['user'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['dosen'] = $this->users_model->getByLevel('dosen')->result();
        $data['skripsi'] = $this->skripsi_model->getByLevel('aktif')->result();
        $data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'));
        $data['userNotif'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['cekBimbingan'] = $this->bimbingan_model->getAll()->result();
        if ($this->session->userdata('level')=="admin") {
			$data['permintaanBaru'] = $this->permintaan_model->getByStatus(0);
            $data['skripsiArsipBaru'] = $this->skripsi_model->getByStatusBaru('lulus','unpublish');
            $data['userSekarang'] = $this->users_model->getById($this->session->userdata('id'))->row();
		}
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/logBimbingan',$data);
        $this->load->view('backend/include/footer.php');
    }
    
	public function bimbingan($idDosen)
	{
        // $this->load->model('kategori_skripsi_model');
        $this->load->model('users_model');
        $data['title'] = "bimbingan";
        // $data['skripsi'] = $this->skripsi_model->getByLevel($statusMhs)->result();
        $data['dosen'] = $this->users_model->getById($idDosen)->row();
        $data['bimbingan'] = $this->bimbingan_model->getByIdLimit($idDosen,$this->session->userdata('id'))->row();
        $data['bimbinganAll'] = $this->bimbingan_model->getByStatusNol($idDosen,$this->session->userdata('id'),'0')->result();
        // $data['bimbinganRiwayat'] = $this->bimbingan_model->getById($idDosen,$this->session->userdata('id'))->result();
        $b1 = $this->bimbingan_model->getById($idDosen,$this->session->userdata('id'))->result();
        $b2 = $this->bimbingan_model->getById($this->session->userdata('id'),$idDosen)->result();
        $bMix1 = array_merge($b1,$b2);
        $bMix = json_decode(json_encode($bMix1),true);
        function build_sorter($key) {
            return function ($a, $b) use ($key) {
                return strnatcmp($a[$key], $b[$key]);
            };
        }
        usort($bMix, build_sorter('tgl_bimbingan'));
        array_multisort($bMix, SORT_DESC);
        function arrayToObject($d) {
            if (is_array($d)) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return (object) array_map(__FUNCTION__, $d);
            }else{
                return $d;
            }
        }
        $bMixx = arrayToObject($bMix);
        $data['bimbinganRiwayat'] = $bMixx;
        // $data['kategori_skripsi'] = $this->kategori_skripsi_model->getAll()->result();
        // $data['skripsiModal'] = $this->skripsi_model->getByLevel($statusMhs)->result();
        // $data['kategori'] = $this->kategori_skripsi_model->getAll()->result();
        // $data['userModal'] = $this->users_model->getByLevel($level)->result();
        $this->load->view('frontend/mahasiswa/include/header',$data);
        $this->load->view('frontend/mahasiswa/bimbingan',$data);
        $this->load->view('frontend/mahasiswa/include/footer');
    }

    public function detailBimbingan($idUser)
    {
        $this->load->model('users_model');
        $this->load->model('skripsi_model');
		$data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'));
        $data['bimbingan'] = $this->bimbingan_model->getByIdLimitDosen($idUser,$this->session->userdata('id'))->row();
        // $data['bimbinganRiwayat'] = $this->bimbingan_model->getById($idUser,$this->session->userdata('id'))->result();
        
        $b1 = $this->bimbingan_model->getById($idUser,$this->session->userdata('id'))->result();
        $b2 = $this->bimbingan_model->getById($this->session->userdata('id'),$idUser)->result();
        $bMix1 = array_merge($b1,$b2);
        $bMix = json_decode(json_encode($bMix1),true);
        function build_sorter($key) {
            return function ($a, $b) use ($key) {
                return strnatcmp($a[$key], $b[$key]);
            };
        }
        usort($bMix, build_sorter('tgl_bimbingan'));
        array_multisort($bMix, SORT_DESC);
        function arrayToObject($d) {
            if (is_array($d)) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return (object) array_map(__FUNCTION__, $d);
            }else{
                return $d;
            }
        }
        $bMixx = arrayToObject($bMix);
        $data['bimbinganRiwayat'] = $bMixx;
        $data['bimbinganDetail'] = $bMixx;
        $data['bimbinganRiwayatCek'] = $this->bimbingan_model->getById($idUser,$this->session->userdata('id'))->result();
        $data['user'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['userModal'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['userNotif'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['skripsi'] = $this->skripsi_model->getByLevel('aktif')->result();
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/detailBimbingan',$data);
        $this->load->view('backend/include/footer.php');
    }

    public function detailBimbinganRiwayat($idUser,$idBimbingan)
    {
        $this->load->model('users_model');
        $this->load->model('skripsi_model');
        $data['bimbingan'] = $this->bimbingan_model->getByIdSatuRiwayat($idUser,$idBimbingan)->row();
        // $data['bimbinganRiwayat'] = $this->bimbingan_model->getById($idUser,$this->session->userdata('id'))->result();
        $b1 = $this->bimbingan_model->getById($idUser,$this->session->userdata('id'))->result();
        $b2 = $this->bimbingan_model->getById($this->session->userdata('id'),$idUser)->result();
        $bMix1 = array_merge($b1,$b2);
        $bMix = json_decode(json_encode($bMix1),true);
        function build_sorter($key) {
            return function ($a, $b) use ($key) {
                return strnatcmp($a[$key], $b[$key]);
            };
        }
        usort($bMix, build_sorter('tgl_bimbingan'));
        array_multisort($bMix, SORT_DESC);
        function arrayToObject($d) {
            if (is_array($d)) {
                /*
                * Return array converted to object
                * Using __FUNCTION__ (Magic constant)
                * for recursive call
                */
                return (object) array_map(__FUNCTION__, $d);
            }else{
                return $d;
            }
        }
        $bMixx = arrayToObject($bMix);
        $data['bimbinganRiwayat'] = $bMixx;
        $data['bimbinganDetail'] = $bMixx;
        $data['bimbinganRiwayatCek'] = $this->bimbingan_model->getById($idUser,$this->session->userdata('id'))->result();
        $data['user'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['userModal'] = $this->users_model->getByLevel('mahasiswa')->result();
        $data['skripsi'] = $this->skripsi_model->getByLevel('aktif')->result();
        $data['userNotif'] = $this->users_model->getByLevel('mahasiswa')->result();
		$data['bimbinganBaru'] = $this->bimbingan_model->getByStatus('0',$this->session->userdata('id'));
        $this->load->view('backend/include/head.php');
        $this->load->view('backend/include/sider.php');
        $this->load->view('backend/include/navbar.php',$data);
        $this->load->view('backend/detailBimbingan',$data);
        $this->load->view('backend/include/footer.php');
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

    public function tambahBimbingan()
    {
        if ($this->session->userdata('level')=="mahasiswa") {
            if (!is_dir('assets/bimbingan/'.$this->input->post('id_from'))) {
                mkdir('assets/bimbingan/'.$this->input->post('id_from'));
                mkdir('assets/bimbingan/'.$this->input->post('id_from').'/'.$this->input->post('id_to'));
            }else{
                if (!is_dir('assets/bimbingan/'.$this->input->post('id_from').'/'.$this->input->post('id_to'))) {
                    mkdir('assets/bimbingan/'.$this->input->post('id_from').'/'.$this->input->post('id_to'));
                }
            }
            $config['upload_path']          = './assets/bimbingan/'.$this->input->post('id_from').'/'.$this->input->post('id_to');
        }else if($this->session->userdata('level')=="dosen"){
            if (!is_dir('assets/bimbingan/'.$this->input->post('id_to'))) {
                mkdir('assets/bimbingan/'.$this->input->post('id_to'));
                mkdir('assets/bimbingan/'.$this->input->post('id_to').'/'.$this->input->post('id_from'));
            }else{
                if (!is_dir('assets/bimbingan/'.$this->input->post('id_to').'/'.$this->input->post('id_from'))) {
                    mkdir('assets/bimbingan/'.$this->input->post('id_to').'/'.$this->input->post('id_from'));
                }
            }
            $config['upload_path']          = './assets/bimbingan/'.$this->input->post('id_to').'/'.$this->input->post('id_from');
        }
        
		$config['allowed_types']        = '*';
		$config['max_size']             = 20480;
        
        $this->load->library('upload', $config);
        $idBimbingan = $this->input->post('idBimbingan');
        if (! $this->upload->do_upload('file')) {
            $file_name = "";
            $file_size = "";
            $data = $this->bimbingan_model->tambahBimbingan($file_name,$file_size);
            if ($data == TRUE) {
                if($this->session->userdata('level')=="mahasiswa"){
                    if ($idBimbingan != "") {
                        $list = $this->bimbingan_model->getByStatusNol($this->input->post('id_to'),$this->session->userdata('id'),"0")->result();
                        foreach($list as $list){
                            $this->bimbingan_model->gantiStatus($list->id);
                        }
                    }
                }else{
                    if ($idBimbingan != "") {
                        $this->bimbingan_model->gantiStatus($idBimbingan);
                    }
                }
                $this->session->set_flashdata('kondisi','1');
                $this->session->set_flashdata('status','Pesan Berhasil dikirim !');
                if ($this->session->userdata('level')=="dosen") {
                    redirect('backend/bimbingan/detailBimbingan/'.$this->input->post('id_to').'/'.$this->input->post('idBimbingan'));
                }else if($this->session->userdata('level')=="mahasiswa"){
                    redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                }
            }else{
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('status','Pesan Gagal dikirim !');
                if ($this->session->userdata('level')=="dosen") {
                    redirect('backend/bimbingan/'.$this->input->post('idBimbingan'));
                }else if($this->session->userdata('level')=="mahasiswa"){
                    redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                }
            }
        }else{
            if ($this->upload->data('file_ext')==".pdf" || $this->upload->data('file_ext')==".PDF") {
                $file_name = $this->upload->data('file_name');
                $file_size = $this->upload->data('file_size');
                $data = $this->bimbingan_model->tambahBimbingan($file_name,$file_size);
                if ($data == TRUE) {
                    if ($idBimbingan != "") {
                        $list = $this->bimbingan_model->getByStatusNol($this->input->post('id_to'),$this->session->userdata('id'),"0")->result();
                        foreach($list as $list){
                            $this->bimbingan_model->gantiStatus($list->id);
                        }
                    }
                    $this->session->set_flashdata('kondisi','1');
                    $this->session->set_flashdata('status','Pesan Berhasil dikirim !');
                    if ($this->session->userdata('level')=="dosen") {
                        redirect('backend/bimbingan/detailBimbingan/'.$this->input->post('id_to').'/'.$this->input->post('idBimbingan'));
                    }else if($this->session->userdata('level')=="mahasiswa"){
                        redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                    }
                }else{
                    $this->session->set_flashdata('kondisi','0');
                    $this->session->set_flashdata('status','Pesan Gagal dikirim !');
                    if ($this->session->userdata('level')=="dosen") {
                        redirect('backend/bimbingan/'.$this->input->post('idBimbingan'));
                    }else if($this->session->userdata('level')=="mahasiswa"){
                        redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                    }
                }
            }else if ($this->upload->data('file_ext')==".doc" || $this->upload->data('file_ext')==".DOC") {
                $file_name = $this->upload->data('file_name');
                $file_size = $this->upload->data('file_size');
                $data = $this->bimbingan_model->tambahBimbingan($file_name,$file_size);
                if ($data == TRUE) {
                    if ($idBimbingan != "") {
                        $list = $this->bimbingan_model->getByStatusNol($this->input->post('id_to'),$this->session->userdata('id'),"0")->result();
                        foreach($list as $list){
                            $this->bimbingan_model->gantiStatus($list->id);
                        }
                    }
                    $this->session->set_flashdata('kondisi','1');
                    $this->session->set_flashdata('status','Pesan Berhasil dikirim !');
                    if ($this->session->userdata('level')=="dosen") {
                        redirect('backend/bimbingan/detailBimbingan/'.$this->input->post('id_to').'/'.$this->input->post('idBimbingan'));
                    }else if($this->session->userdata('level')=="mahasiswa"){
                        redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                    }
                }else{
                    $this->session->set_flashdata('kondisi','0');
                    $this->session->set_flashdata('status','Pesan Gagal dikirim !');
                    if ($this->session->userdata('level')=="dosen") {
                        redirect('backend/bimbingan/'.$this->input->post('idBimbingan'));
                    }else if($this->session->userdata('level')=="mahasiswa"){
                        redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                    }
                }
            }else if ($this->upload->data('file_ext')==".docx" || $this->upload->data('file_ext')==".DOCX") {
                $file_name = $this->upload->data('file_name');
                $file_size = $this->upload->data('file_size');
                $data = $this->bimbingan_model->tambahBimbingan($file_name,$file_size);
                if ($data == TRUE) {
                    if ($idBimbingan != "") {
                        $list = $this->bimbingan_model->getByStatusNol($this->input->post('id_to'),$this->session->userdata('id'),"0")->result();
                        foreach($list as $list){
                            $this->bimbingan_model->gantiStatus($list->id);
                        }
                    }
                    $this->session->set_flashdata('kondisi','1');
                    $this->session->set_flashdata('status','Pesan Berhasil dikirim !');
                    if ($this->session->userdata('level')=="dosen") {
                        redirect('backend/bimbingan/detailBimbingan/'.$this->input->post('id_to').'/'.$this->input->post('idBimbingan'));
                    }else if($this->session->userdata('level')=="mahasiswa"){
                        redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                    }
                }else{
                    $this->session->set_flashdata('kondisi','0');
                    $this->session->set_flashdata('status','Pesan Gagal dikirim !');
                    if ($this->session->userdata('level')=="dosen") {
                        redirect('backend/bimbingan/'.$this->input->post('idBimbingan'));
                    }else if($this->session->userdata('level')=="mahasiswa"){
                        redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                    }
                }
            }else{
                $this->session->set_flashdata('kondisi','0');
                $this->session->set_flashdata('status','File Ekstensi bukan PDF DOC atau DOCX !');
                if ($this->session->userdata('level')=="dosen") {
                    redirect('backend/bimbingan/detailBimbingan/'.$this->input->post('id_to').'/'.$this->input->post('idBimbingan'));
                }else if($this->session->userdata('level')=="mahasiswa"){
                    redirect('backend/bimbingan/bimbingan/'.$this->input->post('id_to'));
                }
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

    public function cetakBimbingan($id)
    {
        $this->load->model('skripsi_model');
        $this->load->model('users_model');
        $skripsi = $this->skripsi_model->getById($id)->row();
        $dospem1 = $skripsi->dospem1;
        $dospem2 = $skripsi->dospem2;
        $data['skripsi'] = $this->skripsi_model->getById($id)->row();
        $data['user'] = $this->users_model->getById($id)->row();
        $data['dospem1'] = $this->users_model->getById($dospem1)->row();
        $data['dospem2'] = $this->users_model->getById($dospem2)->row();
        $data['bimbinganDospem1'] = $this->bimbingan_model->getByIdCetak($dospem1,$id)->result();
        $data['bimbinganDospem2'] = $this->bimbingan_model->getByIdCetak($dospem2,$id)->result();
        $this->load->view('frontend/mahasiswa/kartuBimbingan',$data);
    }

}
