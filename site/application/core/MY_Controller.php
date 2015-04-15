<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }
    
}

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('isAdmin')) {
            $this->lang->load('admin');
            show_error($this->lang->line('admin.unauthorized.message'), 403, $this->lang->line('admin.unauthorized.title'));
        }
    }
    
}