<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->library(array('ion_auth', 'form_validation', 'upload'));
        $this->load->helper(array('url'));
        $this->load->database();
        $this->lang->load('auth');      

    }

    public function sosmed(){
        $m=array();
        $m['message'] = "Get Method not aloowed";
      if($_SERVER['REQUEST_METHOD']=='POST'){
        //print_r(json_encode($_POST));die();        
        $email = strtolower($this->input->post('email'));
        $fbId = $this->input->post('uid');
        $displayName = $this->input->post('displayName');
        
        $remember = 1;
        $identity_column = $this->config->item('identity', 'ion_auth');        
        $identity = ($identity_column === 'email') ? $email : $fbId;   

        if($this->input->post('providerId')=='google.com'){
            $password = "GG".$fbId;//random_string('alpha',6);
        }else{
            $password = "FB".$fbId;//random_string('alpha',6);                
        }

        if ($this->ion_auth->login($email, $password, $remember)) {
            $m['message'] = "success";                          
        } else {
            //cek email 
            if($this->ion_auth->email_check($email)){
                //update user
                if($this->input->post('providerId')=='google.com'){
                    $a = array('google_id' =>  $fbId);
                }else{
                    $a = array('facebook_id' => $fbId);
                }
                $this->blog_model->update_data('users', $a, array('email' => $email));
                if ($this->ion_auth->login($email, $password, $remember)) {
                    $m['message'] = "success";
                } else {
                    $m['message'] = "login failed";
                }                

            }else{
                //register user
                $id_reg = 'GEEQ-' . random_string('numeric', 5) . date('y');
                $remember = true;
                $sp = explode(" ", $displayName);
                if(count($sp)>1){
                    $fn = $sp[0];
                    $ln = $sp[1];
                }else{
                    $fn = $sp[0];
                    $ln = "";            
                }
                if($this->input->post('providerId')=='google.com'){
                    $add_data['google_id'] =  $fbId;
                }else{
                    $add_data['facebook_id'] = $fbId;
                }
                $additional_data = array(
                    'first_name' => $fn,
                    'last_name' => $ln,
                    'id_reg' => $id_reg,
                    'active' => 1                    
                );
                $additional_data = array_merge($additional_data,$add_data);


                $path = APPPATH . '../assets/member/' . $id_reg . '';
                if (!is_dir($path)) {
                    mkdir($path, 0755, TRUE);
                }
                $paths = $path . '/thumb/';
                if (!is_dir($paths)) {
                    mkdir($paths, 0755, TRUE);
                }

                //insert profile picture
                // $url = 'http://graph.facebook.com/shashankvaishnav/picture';
                 $data = file_get_contents($this->input->post('photoURL'));
                 $fileName = $path.'/profil-id-'.$id_reg.'.jpg';
                 $file = fopen($fileName, 'w+');
                 fputs($file, $data);
                 fclose($file);
                // end profile picture
                 $photo = array( 'picture' => 'profil-id-'.$id_reg.'.jpg');
                 $additional_data = array_merge($additional_data,$photo);

                if ($this->ion_auth->register($identity, $password, $email, $additional_data)) {
                    if ($this->ion_auth->login($identity, $password, $remember)) {
                        $m['message'] = "success";
                    } else {
                        $m['message'] = "login failed";
                    }                
                } else {
                    $m['message'] = "Register failed";
                }            
                //return json_encode($m);

            }


        }
        echo json_encode($m);
        return json_encode($m);
      }else{
        redirect(site_url(),'refresh');
      }

    }
    
    public function out() {
        $this->ion_auth->logout();
        //$this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('./', 'refresh');
    }

}