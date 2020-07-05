<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function check()
    {
        $where = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pass'))
        );
        return $this->db->get_where('users',$where);
    }

    public function getByLevel($level)
    {
        $this->db->where('level',$level);
        return $this->db->get('users');
    }

    public function getAll()
    {
        return $this->db->get('users');
    }

    public function gantiStatus($id,$status)
    {
        $data = array('status'=>$status);
        $this->db->where('id',$id);
        $query = $this->db->update('users',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function tambah($foto,$level)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'konsentrasi' => $this->input->post('konsentrasi'),
            'angkatan' => $this->input->post('angkatan'),
            'jabatan' => $this->input->post('jabatan'),
            'status' => 'belum aktif',
            'level' => $level,
            'username' => $this->input->post('nomor_induk'),
            'password' => md5($this->input->post('nomor_induk')),
            'foto' => $foto
        );
        $query = $this->db->insert('users',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id,$foto)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'nomor_induk' => $this->input->post('nomor_induk'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'konsentrasi' => $this->input->post('konsentrasi'),
            'angkatan' => $this->input->post('angkatan'),
            'jabatan' => $this->input->post('jabatan'),
            'foto' => $foto
        );
        $this->db->where('id',$id);
        $query = $this->db->update('users',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('users');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
