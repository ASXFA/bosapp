<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model extends CI_Model {

    public function check()
    {
        $where = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('pass'))
        );
        return $this->db->get_where('users',$where);
    }

    public function getAll()
    {
        return $this->db->get('bimbingan'); 
    }

    public function getByStatusLimit($status,$idUser)
    {
        $this->db->where('status',$status);
        $this->db->where('id_to',$idUser);
        $this->db->order_by('id','ASC');
        $this->db->limit(1);
        return $this->db->get('bimbingan');
    }
    public function getByStatus($status,$idUser)
    {
        $this->db->where('status',$status);
        $this->db->where('id_to',$idUser);
        return $this->db->get('bimbingan');
    }
    public function getByStatusAndDospem($status,$idUser,$dospem)
    {
        $this->db->where('status',$status);
        $this->db->where('id_to',$idUser);
        $this->db->where('id_from',$dospem);
        return $this->db->get('bimbingan');
    }

    public function getByIdTo($idTo)
    {
        $this->db->where('id_to',$idTo);
        return $this->db->get('bimbingan');
    }

    public function getById($idUser,$idDosen)
    {
        $this->db->where('id_from',$idUser);
        $this->db->where('id_to',$idDosen);
        $this->db->order_by('id','DESC');
        return $this->db->get('bimbingan');
    }
    public function getByIdSatuRiwayat($idUser,$idBimbingan)
    {
        $this->db->where('id_from',$idUser);
        $this->db->where('id',$idBimbingan);
        return $this->db->get('bimbingan');
    }

    public function getByStatusNol($idFrom,$idTo,$status)
    {
        $this->db->where('id_from',$idFrom);
        $this->db->where('id_to',$idTo);
        $this->db->where('status',$status);
        $this->db->order_by('id','DESC');
        return $this->db->get('bimbingan');
    }

    public function getByIdLimit($idUser,$idDosen)
    {
        $this->db->where('id_from',$idUser);
        $this->db->where('id_to',$idDosen);
        $this->db->where('status','0');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get('bimbingan');
    }

    public function getByIdLimitDosen($idUser,$idDosen)
    {
        $this->db->where('id_from',$idUser);
        $this->db->where('id_to',$idDosen);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        return $this->db->get('bimbingan');
    }


    public function tambahBimbingan($file_name,$file_size)
    {
        $data = array(
            'id_from' => $this->input->post('id_from'),
            'id_to' => $this->input->post('id_to'),
            'subject' => $this->input->post('subject'),
            'keterangan' => $this->input->post('message'),
            'file_name' => $file_name,
            'file_size' => $file_size,
            'status' => "0"
        );
        $query = $this->db->insert('bimbingan',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function gantiStatus($idBimbingan)
    {
        $dataStatus = array(
            'status' => "1"
        );
        $this->db->where('id',$idBimbingan);
        $gantiStatus = $this->db->update('bimbingan',$dataStatus);
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
