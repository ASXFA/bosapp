<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi_model extends CI_Model {

    public function check()
    {
        $where = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pass'))
        );
        return $this->db->get_where('users',$where);
    }

    public function getByLevel($statusMhs)
    {
        $this->db->where('status_mahasiswa',$statusMhs);
        return $this->db->get('skripsi');
    }

    public function getById($name)
    {
        $this->db->where('mahasiswa',$name);
        return $this->db->get('skripsi');
    }


    public function gantiStatus($id,$status)
    {
        $data = array('status_skripsi'=>$status);
        $this->db->where('id',$id);
        $query = $this->db->update('skripsi',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function tambah($file_name,$file_size,$level)
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'mahasiswa' => $this->input->post('mahasiswa'),
            'dospem1' => $this->input->post('dospem1'),
            'dospem2' => $this->input->post('dospem2'),
            'kategoriskripsi' => $this->input->post('kategoriskripsi'),
            'tahun' => $this->input->post('tahun'),
            'status_mahasiswa' => $level,
            'status_skripsi' => "unpublish",
            'file' => $file_name,
            'file_size' => $file_size
        );
        $query = $this->db->insert('skripsi',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id,$file_name,$file_size)
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'mahasiswa' => $this->input->post('mahasiswa'),
            'dospem1' => $this->input->post('dospem1'),
            'dospem2' => $this->input->post('dospem2'),
            'kategoriskripsi' => $this->input->post('kategoriskripsi'),
            'tahun' => $this->input->post('tahun'),
            'status_mahasiswa' => $this->input->post('status_mahasiswa'),
            'status_skripsi' => $this->input->post('status_skripsi'),
            'file' => $file_name,
            'file_size' => $file_size
        );
        $this->db->where('id',$id);
        $query = $this->db->update('skripsi',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('skripsi');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
