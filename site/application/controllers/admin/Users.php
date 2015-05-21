<?php

class Users extends Admin_controller {
    
    function index() {
        $this->load->model('user_model');
        $this->lang->load('admin/users');
        $data['title'] = $this->lang->line('admin/users.overview.title');
        $data['sortable_tables'] = true;

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('admin/submenu',$data);
        $this->load->view('admin/users/list', 
                array('query' => $this->user_model->all_users(false)));
        $this->load->view('footer',$data);
    }

    function remove_management($user_id){
        $this->load->model('user_model');
        $this->user_model->set_management_rights($user_id, 0);
        $user = $this->user_model->get_user($user_id);
        $this->load->view('admin/users/management_rights',
                array('rights' => $user->has_member_management_rights, 'id' => $user_id));
    }

    function add_management($user_id){
        $this->load->model('user_model');
        $this->user_model->set_management_rights($user_id, 1);
        $user = $this->user_model->get_user($user_id);
        $this->load->view('admin/users/management_rights',
                array('rights' => $user->has_member_management_rights, 'id' => $user_id));
    }

    function remove_admin($user_id){
        $this->load->model('user_model');
        $this->user_model->set_admin($user_id, 0);
        $user = $this->user_model->get_user($user_id);
        $this->load->view('admin/users/admin_rights',
                array('rights' => $user->is_admin, 'id' => $user_id));
    }

    function add_admin($user_id){
        $this->load->model('user_model');
        $this->user_model->set_admin($user_id, 1);
        $user = $this->user_model->get_user($user_id);
        $this->load->view('admin/users/admin_rights',
                array('rights' => $user->is_admin, 'id' => $user_id));
    }

    function deactivate($user_id){
        $this->load->model('user_model');
        $this->user_model->set_active($user_id, 0);
        $user = $this->user_model->get_user($user_id);
        $this->load->view('admin/users/activate',
                array('state' => $user->is_active, 'id' => $user_id));
    }

    function activate($user_id){
        $this->load->model('user_model');
        $this->user_model->set_active($user_id, 1);
        $user = $this->user_model->get_user($user_id);
        $this->load->view('admin/users/activate',
                array('state' => $user->is_active, 'id' => $user_id));
    }
}

