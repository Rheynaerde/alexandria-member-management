<?php

class Families extends MY_Controller {
    
    function index() {
        redirect('/families/overview');
    }
    
    function overview() {
        $this->load->model('family_model');
        $this->lang->load('families');
        
        $data['title'] = $this->lang->line('families.overview.title');
        $data['sortable_tables'] = true;
        if($this->session->userdata('hasMemberManagementRights')) {
            $families = $this->family_model->get_all_families();
        } else {
            $families = $this->family_model->get_all_families_manageable_by_user($this->session->userdata('id'));
        }

        $this->load->view('header', $data);
        $this->load->view('menu', $data);
        $this->load->view('families/list', array('families' => $families));
        $this->load->view('footer', $data);
    }

    function view($family_id){
        $this->load->model('family_model');
        $this->load->model('member_model');
        $this->lang->load('families');
        if($this->family_model->current_user_can_manage_family($family_id)){
            if($this->family_model->does_family_exist($family_id)){
                $family = $this->family_model->get_family($family_id);
                $members = $this->member_model->get_members_for_family($family_id);
                $data['title'] = sprintf(
                        $this->lang->line('families.view.title'),
                        $family->name);
                $this->load->view('header', $data);
                $this->load->view('menu', $data);
                $this->load->view('families/view', array(
                    'family' => $family,
                    'members' => $members));
                $this->load->view('footer', $data);
            } else {
                show_404();
            }
        } else {
            show_error($this->lang->line('families.view.403.message'), 403, $this->lang->line('families.view.403.title'));
        }
    }
}

