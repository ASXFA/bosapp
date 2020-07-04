<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_skripsi_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('kategori_skripsi');
    }

}
