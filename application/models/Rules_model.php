<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('rules');
    }

    public function edit($id)
    {
        $data = array(
            'rule' => $this->input->post('rule')
        );  
        $this->db->where('id',$id);
        $query = $this->db->update('rules',$data);
        if ($query) {
            return TRUE;
        }else{
            return FALSE;
        }
    }

}
