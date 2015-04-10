<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }
    
    function welcome() {
        $this->lang->load('main');
        $data['title'] = $this->lang->line('main.welcome.title');

        $this->load->view('header',$data);
        $this->load->view('welcome',$data);
        $this->load->view('footer',$data);
    }


}

