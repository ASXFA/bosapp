<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('permintaan');
    }

    public function tambah()
    {
        $data = array(
            'id_mahasiswa' => $this->session->userdata('id'),
            'subject' => $this->input->post('subject'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => 0
        );
        $query = $this->db->insert('permintaan',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }


    public function getById($id_permintaan){
        $this->db->where('id',$id_permintaan);
        return $this->db->get('permintaan');
    }

    public function gantiStatus($id_permintaan,$status)
    {
        $this->db->where('id',$id_permintaan);
        $this->db->update('permintaan',['status'=>$status]);
    }

    public function getByStatus($status)
    {
        $this->db->where('status',$status);
        return $this->db->get('permintaan');
    }

}
