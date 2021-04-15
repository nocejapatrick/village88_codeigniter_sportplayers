<?php 

class Player extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_sports_by_filter($arr){
        if(count($arr)==0){

            return $this->db->get('players')->result();

        }else{
         
            $this->db->select("*");
            $this->db->from("players");

            // if there's any name search
            if($arr["name"] != null || $arr["name"] != ""){
                $this->db->like('name',$arr["name"]);
            }

            // if there's any gender filter sent to server (loop through it)
            if(isset($arr["gender"])){
                $this->db->group_start();
                foreach($arr["gender"] as $gender){
                    $this->db->or_where('gender',$gender);
                }
                $this->db->group_end();
            }

            // if there's any sport filter sent to server (loop through it)
            if(isset($arr["sports"])){
                $this->db->group_start();
                $this->db->where('sport_id',intval($arr["sports"][0]));
                foreach($arr["sports"] as $sport){
                    $this->db->or_where('sport_id',intval($sport));
                }
                $this->db->group_end();
            }
            return $this->db->get()->result();
        }
    }
}