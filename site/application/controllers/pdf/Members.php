<?php

class Members extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('is_logged_in') ) {
            redirect('/login/show_login');
        }
    }
    
    function index() {
        redirect('/pdf/members/overview');
    }
    
    function overview() {
        $this->load->helper('dompdf');
        $this->load->model('member_model');
        $this->lang->load('members');
        
        if($this->session->userdata('has_member_management_rights')) {
            $members = $this->member_model->get_active_members();
        } else {
            $members = $this->member_model->user_members($this->session->userdata('id'), false);
        }
        
        $html = $this->load->view('pdf/members/list', array(
            'members' => $members,
            'title' => sprintf($this->lang->line('members.overview.pdf.header.format'), date($this->lang->line('members.overview.pdf.header.dateformat')))
            ), true);
        
        pdf_create($html, $this->lang->line('members.overview.pdf.filename.prefix') . date($this->lang->line('members.overview.pdf.filename.dateformat')), true);
    }

}