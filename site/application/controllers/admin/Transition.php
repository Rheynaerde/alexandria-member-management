<?php

class Transition extends Admin_controller {
    
    function index() {
        $this->load->model('transition_model');
        $this->lang->load('admin/transition');
        $data['title'] = $this->lang->line('admin/transition.overview.title');
        $data['sortable_tables'] = TRUE;
        $data['transitions'] = $this->transition_model->get_transitions();

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('admin/submenu',$data);
        $this->load->view('admin/transition/list',$data);
        $this->load->view('footer',$data);
    }

    function do_create() {
        // Make sure that this page was visited through the form
        if($this->input->post('confirmation')){
            $this->load->model('transition_model');
            $this->lang->load('admin/transition');
            $data['title'] = $this->lang->line('admin/transition.created.title');
            
            $created_transitions = $this->transition_model->create_transitions_for_current_season();
            if(!$created_transitions){
                $created_transitions = 0;
            }
            $data['creation_count'] = $created_transitions;
            
            $this->load->view('header',$data);
            $this->load->view('menu',$data);
            $this->load->view('admin/submenu',$data);
            $this->load->view('admin/transition/created',$data);
            $this->load->view('footer',$data);
        } else {
            //otherwise we just redirect to the index page of this controller
            redirect('/admin/transition');
        }
    }
}

