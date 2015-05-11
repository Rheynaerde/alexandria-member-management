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

    function view($member_id){
        $this->load->model('member_model');
        $this->load->model('person_model');
        $this->load->model('membership_model');
        $this->lang->load('members');
        if($this->member_model->current_user_can_manage_member($member_id)){
            if($this->member_model->does_member_exist($member_id)){
                $member = $this->member_model->get_member($member_id);
                $addresses = $this->person_model->get_addresses($this->member_model->get_person_id($member_id));
                $mailaddresses = $this->person_model->get_mail_addresses($this->member_model->get_person_id($member_id));
                $memberships = $this->membership_model->get_memberships_for_member($member_id);
                $data['title'] = sprintf(
                        $this->lang->line('members.view.title'),
                        $member->firstName, $member->lastName);
                $this->load->view('header', $data);
                $this->load->view('menu', $data);
                $this->load->view('members/view', array(
                    'member' => $member,
                    'addresses' => $addresses,
                    'mailaddresses' => $mailaddresses,
                    'memberships' => $memberships));
                $this->load->view('footer', $data);
            } else {
                show_404();
            }
        } else {
            show_error($this->lang->line('members.view.403.message'), 403, $this->lang->line('members.view.403.title'));
        }
    }
}

