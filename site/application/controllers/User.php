<?php

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if( !$this->session->userdata('isLoggedIn') ) {
            redirect('/login/show_login');
        }
    }

    function settings() {
        $this->_settings();
    }

    private function _settings($message = NULL, $is_error = false) {
        $this->lang->load('settings');
        $data['message'] = $message;
        $data['is_error'] = $is_error;
        $data['title'] = $this->lang->line('settings.title');

        $this->load->helper('form');
        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('settings',$data);
        $this->load->view('footer',$data);
    }
    
    function change_password(){
        $this->lang->load('settings');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('oldpass', 
                $this->lang->line('settings.password.old'),
                'required|trim|callback__verify_password');
        $this->form_validation->set_rules('newpass', 
                $this->lang->line('settings.password.new'),
                'required|trim|differs[oldpass]|min_length[6]');
        $this->form_validation->set_rules('confirmpass', 
                $this->lang->line('settings.password.confirm'),
                'required|trim|matches[newpass]');
        $this->form_validation->set_message('_verify_password',
                $this->lang->line('settings.password.validation.error'));

        if($this->form_validation->run()!= true) {
            $this->_settings($this->lang->line('settings.password.message.error'), true);
        } else {
            $this->load->model('user_model');
            $this->user_model->change_password($this->input->post('newpass'));
            $this->_settings($this->lang->line('settings.password.message.success'), false);
        }
    }
    
    function _verify_password($password){
        // Create an instance of the user model
        $this->load->model('user_model');

        // Grab the username from the session
        $name = $this->session->userdata('username');

        //Ensure values exist for name and pass, and validate the user's credentials
        if( $name && $password && $this->user_model->validate_user($name, $password)) {
            return true;
        } else {
            return false;
        }
    }
}

