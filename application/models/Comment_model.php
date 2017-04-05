<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Comment_model extends CI_Model {

    function tree_all($id_post) {
        $result = $this->db->query("SELECT * FROM comment where id_post = $id_post")->result_array();
        $data = NULL;
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function tree_by_parent($id_post, $in_parent) {
        $result = $this->db->query("SELECT * FROM comment where parent_id = $in_parent AND id_post = $id_post")->result_array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    function add_new_comment() {
        $this->db->set("id_post", $this->input->post('id_post'));
        $this->db->set("parent_id", $this->input->post('parent_id'));
        $this->db->set("comment_name", $this->input->post('comment_name'));
        $this->db->set("comment_email", $this->input->post('comment_email'));
        $this->db->set("comment_body", $this->input->post('comment_body'));
        $this->db->set("comment_created", date('Y-m-d H:i:s'));
        $this->db->insert('comment');
        return $this->input->post('parent_id');
    }

    function get_total_comment($where = '') {
        $query = $this->db->query("SELECT count(*) AS num_row FROM comment $where");
        return $query->row()->num_row;
    }

}
