<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User_model extends CI_Model {

     public function __construct() {
            parent::__construct();
            $this->db = $this->load->database('user',TRUE);        
    }   

    function get_user($where = '') {
        return $this->db->query("SELECT * FROM users $where;");
    }    

    function get_user_col($field="*",$where=""){
    	return $this->db->query("SELECT $field FROM users $where;");
    }

}