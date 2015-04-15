<?php

class Members extends MY_Controller {
    
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

