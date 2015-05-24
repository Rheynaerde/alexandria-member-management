<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('is_logged_in') ) {
            redirect('/login/show_login');
        }
    }
    
}

class Management_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(!($this->session->userdata('is_admin') ||
                $this->session->userdata('has_member_management_rights'))) {
            $this->lang->load('management');
            show_error($this->lang->line('management.unauthorized.message'), 403,
                    $this->lang->line('management.unauthorized.title'));
        }
    }
    
}

class Admin_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_admin')) {
            $this->lang->load('admin');
            show_error($this->lang->line('admin.unauthorized.message'), 403, $this->lang->line('admin.unauthorized.title'));
        }
    }
    
}