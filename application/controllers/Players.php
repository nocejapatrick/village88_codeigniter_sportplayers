<?php

class Players extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('session'));
        $this->load->model('Player');
        $this->load->model('Sport');
    }
    public function index(){
        // get all filters
        $inputs = $this->input->get();
        // get Players based on filters
        $players = $this->Player->get_sports_by_filter($inputs);

        // store in flashdata the old value of search
        $oldSearch = ($this->input->get('name')) ? $this->input->get('name') : "";
        $this->session->set_flashdata('search',$oldSearch);
        // end of store in flash data

        
        $this->load->view('index',array('players'=>$players,'sports'=>$this->Sport->get()));
    }
}