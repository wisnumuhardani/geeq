<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->database();
        //$this->load->helper(array('string', 'form', 'url', 'html', 'array'));
        $this->load->model('user_model');
        $this->load->model('activity_model');
        $this->load->library(array('ion_auth', 'pagination', 'session', 'form_validation'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function loadmorehome() {
        $today = date('Y-m-d h:i:s');
        $page = $_GET['page'];
        $offset = 9 * $page;
        $limit = 9;
        $data['data_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY date DESC LIMIT $offset,$limit")->result_array();
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();    
        $data['users'] = $this->get_user_array($users);

        $this->load->view('page/loadmore-home', $data);
    }

    public function load_more() {
        $group_no = $this->input->post('group_no');
        $content_per_page = 8;
        $start = ceil($group_no * $content_per_page);
        $data['all_content'] = $this->blog_model->get_all_content($start, $content_per_page);
        $this->load->view('page/loadmore-home-2', $data, FALSE);
    }

    public function index() {
        $today = date('Y-m-d h:i:s');

        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting();

        $data_post = $this->blog_model->get_post("WHERE active = 'Y' order by id_post DESC limit 20")->result_array();        
        $id_category = $data_post[0]['category'];
        $idreg = $data_post[0]['id_reg'];
        $data['post'] = $data_post;
        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['all_tag'] = $this->blog_model->get_tags()->result_array();
        $data['category'] = $this->blog_model->get_post_category()->result_array();
        $data['nama_kategori'] = $this->blog_model->get_post_category("WHERE id='$id_category' ")->result_array();
        $data['foto_user'] = $this->user_model->get_user("WHERE id_reg='$idreg'")->result_array();

        $data['popular_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY hits DESC LIMIT 5")->result_array();
        $data['random_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY RAND() LIMIT 5")->result_array();
        $data['latest_new'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY date DESC LIMIT 6")->result_array();
        $data['scifi_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='10' ORDER BY date DESC LIMIT 3")->result_array();
        $data['tech_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='11' ORDER BY date DESC LIMIT 3")->result_array();
        $data['sport_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='12' ORDER BY date DESC LIMIT 3")->result_array();
        $data['otomotif_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='13' ORDER BY date DESC LIMIT 3")->result_array();
        $data['video_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='16' ORDER BY date DESC LIMIT 4")->result_array();
        $data['editorial_pick'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND editorial_pick='Y' ORDER BY date DESC LIMIT 4")->result_array();
        $data['tags'] = $this->blog_model->get_tags()->result_array();
        $data['top_latest_new'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND publish <= '$today' ORDER BY date DESC")->result_array();
        $data['top_story'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND publish <= '$today' ORDER BY hits DESC")->result_array();

        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();
        $data['users'] = $this->get_user_array($users);

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);
        $html['editorial'] = $this->load->view('page/editorial-pick', $data, TRUE);        
        $html['allcat'] = $this->load->view('page/cat-wp', $data, TRUE);
        $html['video'] = $this->load->view('page/video', $data, TRUE);
        $html['latest'] = $this->load->view('page/latest-popular', $data, TRUE);
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //Master VIEW
        $this->load->view('page/featuredhome' , $html);
    }

    public function read($code = 0) {
        $today = date('Y-m-d h:i:s');        
        $group = 'member';

        $data['datalogin'] = $this->getDataLogin();
            
        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();
        
        $data_content = $this->blog_model->get_post("WHERE id_post ='$code'")->result_array();
        if(empty($data_content)){
            redirect('page/error');
        }
        $code = $data_content[0]['id_post'];

        $this->cookiesetter($code);
        $data['setting'] = $this->web_setting($data_content[0]['title']);
        $data['setting']['keyword'] = $data_content[0]['keyword'];
        $data['setting']['description'] = $data_content[0]['description'];
        $data['setting']['image'] = $data_content[0]['image'];
        $data['setting']['video'] = $data_content[0]['video'];
        $cat = $data_content[0]['category'];

        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['tags'] = $this->blog_model->get_tags()->result_array();
        $data['content'] = $data_content;
        $data['video_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='16' ORDER BY date DESC LIMIT 4")->result_array();
        $data['popular_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY hits LIMIT 5")->result_array();
        $data['random_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY RAND() LIMIT 5")->result_array();
        $data['latest_new'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY date DESC LIMIT 6")->result_array();
        $data['editorial_pick'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='$cat' ORDER BY date DESC LIMIT 4")->result_array();
        $data['url_post'] = base_url('read/' . $data_content[0]['id_post'] . '/' . $data_content[0]['seotitle']);
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();
        $data['users'] = $this->get_user_array($users); 

        $data['comments'] = $this->show_tree($code);
        $data['total_comment'] = $this->comment_model->get_total_comment("WHERE id_post='$code'");

        if($this->ion_auth->logged_in()){
            $user = $this->ion_auth->user()->row();
            $this->activity_model->insert_act('2',$user->id);                    
        }

        //Cari Reaction
        $reaction = $this->blog_model->get_post_reaction("WHERE id_post='$code'")->result_array();
        $smile = isset($reaction[0]['smile']) ? $reaction[0]['smile'] : '';
        $rofl = isset($reaction[0]['rofl']) ? $reaction[0]['rofl'] : '';
        $love = isset($reaction[0]['love']) ? $reaction[0]['love'] : '';
        $sad = isset($reaction[0]['sad']) ? $reaction[0]['sad'] : '';
        $disappointed = isset($reaction[0]['disappointed']) ? $reaction[0]['disappointed'] : '';

        //smile
        $x_smile = $smile;
        $y_smile = $smile + $rofl + $love + $sad + $disappointed;
        if ($y_smile == 0) {
            $percent_smile = "0";
        } else {
            $percent_smile = $x_smile / $y_smile;
        }
        $data['smile'] = number_format($percent_smile * 100, 2) . '%';

        //rofl
        $x_rofl = $rofl;
        $y_rofl = $smile + $rofl + $love + $sad + $disappointed;
        if ($y_rofl == 0) {
            $percent_rofl = "0";
        } else {
            $percent_rofl = $x_rofl / $y_rofl;
        }
        $data['rofl'] = number_format($percent_rofl * 100, 2) . '%';

        //love
        $x_love = $love;
        $y_love = $smile + $rofl + $love + $sad + $disappointed;
        if ($y_love == 0) {
            $percent_loves = "0";
        } else {
            $percent_loves = $x_love / $y_love;
        }
        $data['love'] = number_format($percent_loves * 100, 2) . '%';

        //sad
        $x_sad = $sad;
        $y_sad = $smile + $rofl + $love + $sad + $disappointed;
        if ($y_sad == 0) {
            $percent_sad = "0";
        } else {
            $percent_sad = $x_sad / $y_sad;
        }
        $data['sad'] = number_format($percent_sad * 100, 2) . '%';

        //disappointed
        $x_disappointed = $disappointed;
        $y_disappointed = $smile + $rofl + $love + $sad + $disappointed;
        if ($y_disappointed == 0) {
            $percent_disappointed = "0";
        } else {
            $percent_disappointed = $x_disappointed / $y_disappointed;
        }
        $data['disappointed'] = number_format($percent_disappointed * 100, 2) . '%';

        //LOAD DATA VIEW
        $html['head']       = $this->load->view('page/head', $data, TRUE);
        $html['navbar']     = $this->load->view('page/navbar', $data, TRUE);        
        $html['editorial']  = $this->load->view('page/editorial-pick', $data, TRUE);        
        $html['footer']     = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/read', $html);
    }

    function add_comment($code) {
        $this->form_validation->set_rules('comment_name', 'Name', 'required|trim|htmlspecialchars');
        $this->form_validation->set_rules('comment_email', 'Email', 'required|valid_email|trim|htmlspecialchars');
        $this->form_validation->set_rules('comment_body', 'comment_body', 'required|trim|htmlspecialchars');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            if($this->ion_auth->logged_in()){
                //LOG ACT POIN 
                $user = $this->ion_auth->user()->row();            
                $this->activity_model->insert_act('5',$user->id);                 
            }
            $this->comment_model->add_new_comment();
            $this->session->set_flashdata('message', 'Your comment is awaiting moderation.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function show_tree($code) {
        $cari_semua_id = array();
        $id_result = $this->comment_model->tree_all($code);
        if (!empty($id_result)) {
            foreach ($id_result as $comment_id) {
                array_push($cari_semua_id, $comment_id['parent_id']);
            }
        }
        return $this->in_parent(0, $code, $cari_semua_id);
    }

    function in_parent($in_parent, $id_post, $cari_semua_id) {
        $html = "";
        if (in_array($in_parent, $cari_semua_id)) {
            $result = $this->comment_model->tree_by_parent($id_post, $in_parent);
            $html .= $in_parent == 0 ? "<ul class='tree'>" : "<ul class='tree2'>";
            foreach ($result as $val) {
                $html .= "<li class='comment_box'>
                        <div class='comment_reply'>
                        <div class='boxnya'>
                        <img class='circle' src='" . base_url('assets/images/no-foto.jpg') . "' width='40' style='float:left;margin-right:15px;'/>
                        <div class='aut'>" . $val['comment_name'] . ' ' . '<small>' . date('d-M-Y H:i:s', strtotime($val['comment_created'])) . '</small>' . "</div> 
                        <div class='comment-body'>" . $val['comment_body'] . "</div> 
                        <a  href='#comment_form' class='reply' id='" . $val['comment_id'] . "'>Tanggapan </a></div>";
                $html .= $this->in_parent($val['comment_id'], $id_post, $cari_semua_id);
                $html .= "</div></li>";
            }
            $html .= "</ul>";
        }
        return $html;
    }

    public function contact() {
        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting('Contact');

        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();
        $data['menu'] = $this->blog_model->get_menu()->result_array();

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/contact', $html);
    }

    public function thankyou() {
        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting('Thank you');
        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();
        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['message'] = '';

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] =  $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/thankyou',$html);
    }

    public function error() {
        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting('Error 404');
        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

         //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/404',$html);
    }

    public function profile($code = 0) {
        $today = date('Y-m-d h:i:s');
        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting('Profile');

        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['all_tag'] = $this->blog_model->get_tags()->result_array();
        $data['uri'] = base_url() . "profile/$code/";

        $following = $this->blog_model->get_member_following("where id_follow='$code'");
        $followers = $this->blog_model->get_member_followers("WHERE id_reg='$code'");
        $data['following'] = $following;
        $data['followers'] = $followers;

        $data_post = $this->blog_model->get_post("WHERE id_reg='$code'")->result_array();
        $id_reg = isset($data_post[0]['id_reg']) ? $data_post[0]['id_reg'] : '';
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $per_page = 8;
        $limit = 8;

        $link = $config["base_url"] = base_url() . "profile/$code/";
        $total = $this->blog_model->get_total_article_user($id_reg);
        $post_member = $this->blog_model->get_post_by_user($id_reg, $per_page, $page);
        $data['results'] = isset($post_member) ? $post_member : '';
        //$data['results'] = $this->blog_model->get_post_by_user($id_reg, $per_page, $page);
        $data['pagination'] = $this->pagination($total, $limit, $link);
        $data['info_user'] = $this->user_model->get_user("WHERE id_reg='$code'")->result_array();
        $data['top_profile'] = $this->user_model->get_user("ORDER BY total_poin DESC LIMIT 7")->result_array();
        $data['top_geeq'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY hits DESC LIMIT 5")->result_array();
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();
        $data['users'] = $this->get_user_array($users); 

         //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('member/profile',$html);
    }

    public function category($code = 0) {
        $today = date('Y-m-d h:i:s');

        $data['datalogin'] = $this->getDataLogin();

        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

        $data['uri'] = base_url() . "category/$code/";

        $data_cat = $this->blog_model->get_post_category("WHERE seotitle='$code'")->result_array();
        if(empty($data_cat)){
            redirect('page/error');
        }

        $id_cat = $data_cat[0]['id'];
        $data['name_cat'] = $data_cat[0]['name'];        
        $data['setting'] = $this->web_setting($data_cat[0]['name']);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $per_page = 12;
        $limit = 12;
        $link = $config["base_url"] = base_url() . "category/$code/";
        $total = $this->blog_model->get_total_category($id_cat);

        if ($code == 'editorial-pick') {
            $data['results'] = $this->blog_model->get_post_by_editorial_pick($id_cat, $per_page, $page);
        } elseif ($code == 'top-stories') {
            $data['results'] = $this->blog_model->get_post_by_top_stories($id_cat, $per_page, $page);
        } else {
            $data['results'] = $this->blog_model->get_post_by_category($id_cat, $per_page, $page);
        }

        $data['pagination'] = $this->pagination($total, $limit, $link);

        $data['video_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND category='16' ORDER BY date DESC LIMIT 4")->result_array();
        $data['popular_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY hits LIMIT 5")->result_array();
        $data['random_post'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY RAND() LIMIT 5")->result_array();
        $data['latest_new'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' ORDER BY date DESC LIMIT 6")->result_array();
        $data['editorial_pick'] = $this->blog_model->get_post("WHERE active='Y' AND publish <= '$today' AND editorial_pick='Y' ORDER BY date DESC LIMIT 4")->result_array();
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();        
        $data['users'] = $this->get_user_array($users); 

        $data['seo_category'] = $data_cat[0]['seotitle'];
        $data['image_category'] = $data_cat[0]['image'];

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/category', $html);
    }

    private function pagination($total, $per_page, $link) {
        $config['base_url'] = $link;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<a>';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }

    public function pages($code = 0) {
        $data['datalogin'] = $this->getDataLogin();
       
        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

        $data_content = $this->blog_model->get_page("WHERE seotitle='$code'")->result_array();
        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['setting'] = $this->web_setting($data_content[0]['title']);
        $data['keyword'] = $data_content[0]['keyword'];
        $data['description'] = $data_content[0]['description'];
        $data['content'] = $data_content[0]['content'];
        $data['title'] = $data_content[0]['title'];
        $data['images'] = $data_content[0]['images'];

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/pages',$html);
    }

    private function countervisitor() {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        $data_visitor = $this->blog_model->get_visitor("WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "'")->result_array();
        if ($data_visitor == NULL) {
            $data = array(
                'ip' => $_SERVER['REMOTE_ADDR'],
                'os' => $this->agent->platform(),
                'browser' => $agent,
                'tanggal' => date("Y-m-d H:i:s")
            );
            $this->blog_model->insert_data('visitor', $data);
            $this->session->set_userdata('GEEQ', "GEEQ");
            setcookie("GEEQ", 'GEEQ', time() + 3600 * 24);
        } else {
            if (!isset($_COOKIE['GEEQ'])) {
                $data_visitor = $this->blog_model->get_visitor("WHERE ip = '" . $_SERVER['REMOTE_ADDR'] . "' and tanggal = '" . date("Y-m-d H:i:s") . "'");
                if ($data_visitor != NULL) {
                    if (!$this->session->userdata('GEEQ')) {
                        $data = array(
                            'ip' => $_SERVER['REMOTE_ADDR'],
                            'os' => $this->agent->platform(),
                            'browser' => $agent,
                            'tanggal' => date("Y-m-d H:i:s")
                        );
                        $this->blog_model->insert_data('visitor', $data);
                        $this->session->set_userdata('GEEQ', "GEEQ website");
                        setcookie("GEEQ", 'GEEQ website', time() + 3600 * 24);
                    } else {
                        setcookie("GEEQ", 'GEEQ website', time() + 3600 * 24);
                    }
                } else {
                    $data = array(
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'os' => $this->agent->platform(),
                        'browser' => $agent,
                        'tanggal' => date("Y-m-d H:i:s")
                    );
                    $this->blog_model->insert_data('visitor', $data);
                    $this->session->set_userdata('GEEQ', "GEEQ website");
                    setcookie("GEEQ", 'GEEQ website', time() + 3600 * 24);
                }
            }
        }
    }

    public function searchresult() {
        $today = date('Y-m-d h:i:s');
        
        $keyword = $this->input->get('keyword');
        $articles = $this->blog_model->search($keyword);
        $search_result = array('articles' => $articles);

        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting($keyword);
        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['results'] = $search_result;
        $data['namakeyword'] = $keyword;
        $data['all_tag'] = $this->blog_model->get_tags()->result_array();
        
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();        
        $data['users'] = $this->get_user_array($users); 

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);

        //LOAD MASTER VIEW
        $this->load->view('page/searchresult',$html);        
    }

    public function tag($code = 0) {
        $today = date('Y-m-d h:i:s');
        $data['datalogin'] = $this->getDataLogin();
        $keyword = $this->input->get('keyword');
        
        $data['setting'] = $this->web_setting($keyword);
        $data_tags = $this->blog_model->get_tags("WHERE seotitle='$keyword'")->result_array();
        if(empty($data_tags)){
            redirect('page/error');
        }        
        $id_tag = $data_tags[0]['id'];
        $articles = $this->blog_model->find_tags($id_tag);
        $search_result = array('articles' => $articles);
        $nama_tags = $this->blog_model->get_tags("WHERE id='$id_tag'")->result_array();

        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['results'] = $search_result;
        $data['namakeyword'] = $data_tags[0]['name'];
        $data['namtag'] = $nama_tags[0]['name'];
        $data['all_tag'] = $this->blog_model->get_tags()->result_array();

        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();        
        $data['users'] = $this->get_user_array($users); 

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);
        
        //LOAD MASTER VIEW
        $this->load->view('page/tag', $html);
    }

    public function tags() {
        $today = date('Y-m-d h:i:s');
        $data['datalogin'] = $this->getDataLogin();
        $data['setting'] = $this->web_setting();
        $data['total_scifi'] = $this->blog_model->get_cat_scifi();
        $data['total_tech'] = $this->blog_model->get_cat_tech();
        $data['total_sport'] = $this->blog_model->get_cat_sport();
        $data['total_automotive'] = $this->blog_model->get_cat_automotive();
        $data['total_video'] = $this->blog_model->get_cat_video();

        $data['menu'] = $this->blog_model->get_menu()->result_array();
        $data['all_tag'] = $this->blog_model->get_tags()->result_array();
        $data['category'] = $this->blog_model->get_post_category()->result_array();
        
        $users = $this->user_model->get_user_col("id,id_reg,email,picture,first_name,last_name,cover,total_poin,username")->result_array();        
        $data['users'] = $this->get_user_array($users); 

        //LOAD DATA VIEW
        $html['head'] = $this->load->view('page/head', $data, TRUE);
        $html['navbar'] = $this->load->view('page/navbar', $data, TRUE);        
        $html['footer'] = $this->load->view('page/footer', $data, TRUE);
        
        //LOAD MASTER VIEW
        $this->load->view('page/tags', $html);       
    }

    private function cookiesetter($code = 0) {
        if (!isset($_COOKIE[$code])) {
            $baseurl = $_SERVER['REMOTE_ADDR'];
            $content = $this->blog_model->get_post("WHERE id_post = '$code'")->result_array();
            $result = $this->blog_model->update_data('post', array('hits' => ($content[0]['hits'] + 1)), array('id_post' => $code));
            if ($result == 1) {
                setcookie($code, $baseurl, time() + 3600);
            }
        }
    }

    function web_setting($cat_name =""){
        $web_setting = $this->blog_model->get_setting()->result_array();
        if($cat_name==''){
            $data['site_title'] = $web_setting[0]['title'];
        }else{
            $data['site_title'] = $web_setting[0]['title'].' - '.$cat_name;
        }
        $data['keyword'] = $web_setting[0]['keyword'];
        $data['description'] = $web_setting[0]['description'];
        $data['image'] ="";
        $data['video'] = "";                    
        return $data;
    }


    function getDatalogin(){
        if ($this->ion_auth->logged_in()) {
            $user = $this->ion_auth->user()->row();
            $data['id'] = $user->id;
            $data['id_reg'] = $user->id_reg;
            $data['username'] = $user->first_name . ' ' . $user->last_name;
            $data['email'] = $user->email;
            $data['profil_picture'] = $user->picture;
            $data['cover'] = $user->cover;
            $data['group_id'] = $this->ion_auth->get_users_groups()->row()->id;
        } else {
            $data['id_reg'] = '';
        }

        return $data;        
    }


    function get_user_array($users){
        foreach ($users as $key => $val) {
            $data[$val['id_reg']] = array( 'id' =>$val['id'],
                                                'email' =>$val['email'],
                                                'picture' =>$val['picture'],
                                                'first_name' =>$val['first_name'],
                                                'last_name' =>$val['last_name'],
                                                'cover' =>$val['cover'],
                                                'total_poin' =>$val['total_poin'],
                                                'username' =>$val['username'] );
        }

        return $data;         
    }
}
