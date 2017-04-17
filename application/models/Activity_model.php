<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Activity_model extends CI_Model {

     public function __construct() {
            parent::__construct();
            $this->db = $this->load->database('user',TRUE);        
    }   


    function insert_act($type=0,$user_id=0,$postid=0){
        $res = $this->db->query("select * from cat_activity where idx='$type'")->result_array();
        foreach ($res as $key => $val) {
            $poin = $val['poin'];
            $name = $val['activity_name'];            
        }

        $data['date'] = date("Y-m-d H:i:s");
        $data['act_type'] = $type;
        $data['user_id'] = $user_id;
        $data['poin'] = $poin;
        $data['desc'] = $name;
        $result = $this->db->insert('activity', $data);

        return $this->db->query("Update users set total_poin=total_poin+".$poin." where id='$user_id'");
    }

}