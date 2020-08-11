<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index($level)
	{
        if ($this->session->userdata('is_login')==1) {
            redirect('admin');
		}
		$data['level'] = $level;
		$this->load->view('login',$data);
	}

	public function aksi_login($level)
	{
		$this->load->model('users_model');
		$check = $this->users_model->check($level);
		if ($check->num_rows() > 0) {
			foreach($check->result() as $user){
				if($user->status == "tidak aktif"){
					$this->session->set_flashdata('login','Akun anda belum Aktif, Silahkan hubungi admin Prodi IF UNLA !');
					redirect('masuk/'.$level);
				}else{
					$sess = array(
						'is_login' => 1,
						'id' => $user->id,
						'nama'=> $user->nama,
						'nomor_induk'=> $user->nomor_induk,
						'jenis_kelamin'=> $user->jenis_kelamin,
						'telepon' => $user->telepon,
						'email' => $user->email,
						'konsentrasi' => $user->konsentrasi,
						'angkatan' => $user->angkatan,
						'jabatan' => $user->jabatan,
						'status' => $user->status,
						'foto' => $user->foto,
						'level' => $user->level,
						'username' => $user->username
	
					);
					$this->session->set_userdata($sess);
				}
			}
			if ($this->session->userdata('level')=="admin") {
				$this->session->set_flashdata('login','Selamat Datang !');
				redirect('admin');
			}else if($this->session->userdata('level')=="mahasiswa"){
				$this->session->set_flashdata('login','Selamat Datang !');
				redirect('mahasiswa');
			}else if($this->session->userdata('level')=="dosen"){
				$this->session->set_flashdata('login','Selamat Datang !');
				redirect('admin');
			}
		}else{
			$this->session->set_flashdata('login','Password atau Username anda tidak cocok !');
			redirect('masuk/'.$level);
		}
	}

	public function logout()
	{
		$status = $this->session->flashdata('gantiPass');
		$level = $this->session->flashdata('level');
		$this->session->set_userdata('is_login','0');
		$this->session->sess_destroy();
		if ($status=="1") {
			$this->session->set_flashdata('kondisi','1');
			$this->session->set_flashdata('login','Password berhasil diganti !');
			?>
		<script>
			window.alert('Password Berhasil Diganti !');
			window.location.href="<?php echo site_url('masuk/'.$level); ?>";
		</script>
		<?php
		}else{
			redirect(base_url());
		}
	}

}
