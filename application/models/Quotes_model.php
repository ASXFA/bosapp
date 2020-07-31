<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('quotes');
    }

    public function tambah()
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi')
        );
        $query = $this->db->insert('quotes',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function edit($id)
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi')
        );  
        $this->db->where('id',$id);
        $query = $this->db->update('quotes',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->delete('quotes');
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }


}
