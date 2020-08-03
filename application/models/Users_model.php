<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function check($level)
    {
        $where = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pass')),
            'level' => $level
        );
        return $this->db->get_where('users',$where);
    }

    public function getByLevel($level)
    {
        $this->db->where('level',$level);
        return $this->db->get('users');
    }

    public function getByStatus($status,$level)
    {
        $this->db->where('status',$status);
        $this->db->where('level',$level);
        return $this->db->get('users');
    }

    public function getById($id)
    {
        $this->db->where('id',$id);
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
        if ($this->session->userdata('level')=="dosen") {
            $data = array(
                'nama' => $this->input->post('nama'),
                'nomor_induk' => $this->input->post('nomor_induk'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'jabatan' => $this->input->post('jabatan'),
                'foto' => $foto,
                'username'=>$this->input->post('nomor_induk')
            );
        }else if($this->session->userdata('level')=="admin" && $id==$this->session->userdata('id')){
            $data = array(
                'nama' => $this->input->post('nama'),
                'foto' => $foto
            );
        }else{
            $data = array(
                'nama' => $this->input->post('nama'),
                'nomor_induk' => $this->input->post('nomor_induk'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'konsentrasi' => $this->input->post('konsentrasi'),
                'angkatan' => $this->input->post('angkatan'),
                'jabatan' => $this->input->post('jabatan'),
                'foto' => $foto,
                'username'=>$this->input->post('nomor_induk')
            );
        }
        $this->db->where('id',$id);
        $query = $this->db->update('users',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function editAturan()
    {
        $data = array(
            'aturan' => $this->input->post('aturan')
        );
        $this->db->where('id',$this->session->userdata('id'));
        $query = $this->db->update('users',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function cek($password)
    {
        $this->db->where('id',$this->session->userdata('id'));
        $this->db->where('password',md5($password));
        $data = $this->db->get('users');
        if ($data) {
            return $data;
        }else{
            return FALSE;
        }
    }

    public function gantiPassword($password)
    {
        $data = array('password'=> md5($password));
        $this->db->where('id',$this->session->userdata('id'));
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
