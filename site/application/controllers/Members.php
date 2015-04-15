<?php

class Members extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }
    
    function index() {
        redirect('/members/overview');
    }
    
    function overview() {
        $this->load->model('member_model');
        $this->lang->load('members');
        
        $data['title'] = $this->lang->line('members.overview.title');
        $data['sortable_tables'] = true;
        if($this->session->userdata('hasMemberManagementRights')) {
            $query = $this->member_model->all_members(false);
        } else {
            $query = $this->member_model->user_members($this->session->userdata('id'), false);
        }

        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('members/list', array('query' => $query));
        $this->load->view('footer', $data);
    }


}

