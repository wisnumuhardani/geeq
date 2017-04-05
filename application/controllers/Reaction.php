<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reaction extends CI_Controller {

    function smile() {
        $id_post = $_POST['id_post'];
        if (!isset($_COOKIE[$id_post])) {
            $baseurl = $_SERVER['REMOTE_ADDR'];
            $content = $this->blog_model->get_post_reaction("WHERE id_post = '$id_post'")->result_array();
            if (!empty($content[0]['id_post'])) {
                $result = $this->blog_model->update_data('post_reaction', array('smile' => ($content[0]['smile'] + 1)), array('id_post' => $id_post));
                if ($result == 1) {
                    setcookie($id_post, $baseurl, time() + 3600);
                }
            } else {
                $data = array(
                    'id_post' => $id_post,
                    'smile' => '1',
                );
                setcookie($id_post, $baseurl, time() + 3600);
                $this->blog_model->insert_data('post_reaction', $data);
            }
        }
    }

    function rofl() {
        $id_post = $_POST['id_post'];
        if (!isset($_COOKIE[$id_post])) {
            $baseurl = $_SERVER['REMOTE_ADDR'];
            $content = $this->blog_model->get_post("WHERE id_post = '$id_post'")->result_array();
            if (!empty($content[0]['id_post'])) {
                $result = $this->blog_model->update_data('post_reaction', array('rofl' => ($content[0]['rofl'] + 1)), array('id_post' => $id_post));
                if ($result == 1) {
                    setcookie($id_post, $baseurl, time() + 3600);
                }
            } else {
                $data = array(
                    'id_post' => $id_post,
                    'rofl' => '1',
                );
                setcookie($id_post, $baseurl, time() + 3600);
                $this->blog_model->insert_data('post_reaction', $data);
            }
        }
    }

    function love() {
        $id_post = $_POST['id_post'];
        if (!isset($_COOKIE[$id_post])) {
            $baseurl = $_SERVER['REMOTE_ADDR'];
            $content = $this->blog_model->get_post("WHERE id_post = '$id_post'")->result_array();
            if (!empty($content[0]['id_post'])) {
                $result = $this->blog_model->update_data('post_reaction', array('love' => ($content[0]['love'] + 1)), array('id_post' => $id_post));
                if ($result == 1) {
                    setcookie($id_post, $baseurl, time() + 3600);
                }
            } else {
                $data = array(
                    'id_post' => $id_post,
                    'love' => '1',
                );
                setcookie($id_post, $baseurl, time() + 3600);
                $this->blog_model->insert_data('post_reaction', $data);
            }
        }
    }

    function sad() {
        $id_post = $_POST['id_post'];
        if (!isset($_COOKIE[$id_post])) {
            $baseurl = $_SERVER['REMOTE_ADDR'];
            $content = $this->blog_model->get_post_reaction("WHERE id_post = '$id_post'")->result_array();
            if (!empty($content[0]['id_post'])) {
                $result = $this->blog_model->update_data('post_reaction', array('sad' => ($content[0]['sad'] + 1)), array('id_post' => $id_post));
                if ($result == 1) {
                    setcookie($id_post, $baseurl, time() + 3600);
                }
            } else {
                $data = array(
                    'id_post' => $id_post,
                    'sad' => '1',
                );
                setcookie($id_post, $baseurl, time() + 3600);
                $this->blog_model->insert_data('post_reaction', $data);
            }
        }
    }

    function disappointed() {
        $id_post = $_POST['id_post'];
        if (!isset($_COOKIE[$id_post])) {
            $baseurl = $_SERVER['REMOTE_ADDR'];
            $content = $this->blog_model->get_post_reaction("WHERE id_post = '$id_post'")->result_array();
            if (!empty($content[0]['id_post'])) {
                $result = $this->blog_model->update_data('post_reaction', array('disappointed' => ($content[0]['disappointed'] + 1)), array('id_post' => $id_post));
                if ($result == 1) {
                    setcookie($id_post, $baseurl, time() + 3600);
                }
            } else {
                $data = array(
                    'id_post' => $id_post,
                    'disappointed' => '1',
                );
                setcookie($id_post, $baseurl, time() + 3600);
                $this->blog_model->insert_data('post_reaction', $data);
            }
        }
    }

}
