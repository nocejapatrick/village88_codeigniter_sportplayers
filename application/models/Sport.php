<?php
class Sport extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get(){
        return $this->db->get('sports')->result();
    }
}