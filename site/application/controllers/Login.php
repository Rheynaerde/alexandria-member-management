<?php

class Login extends CI_Controller {

    function index() {
        if( $this->session->userdata('isLoggedIn') ) {
            // If the user is already logged in
            redirect('/main/welcome');
        } else {
            // Otherwise show the login screen without an error message.
            $this->show_login(false);
        }
    }

    function do_login() {
        // Create an instance of the user model
        $this->load->model('user_model');

        // Grab the email and password from the form POST
        $name = $this->input->post('name');
        $pass  = $this->input->post('password');

        //Ensure values exist for name and pass, and validate the user's credentials
        if( $name && $pass && $this->user_model->validate_user($name,$pass)) {
            // If the user is valid, redirect to the main view
            redirect('/main/welcome');
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }

    function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        $this->load->helper('form');
        $this->load->view('header', $data);
        $this->load->view('login', $data);
        $this->load->view('footer', $data);
    }
}

