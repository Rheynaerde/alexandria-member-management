<?php

class Seasons extends Admin_controller {
    
    function index() {
        $this->load->model('season_model');
        $this->lang->load('admin/seasons');
        $data['title'] = $this->lang->line('admin/seasons.overview.title');
        $data['sortable_tables'] = true;

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('admin/submenu',$data);
        $this->load->view('admin/seasons/list', 
                array('seasons' => $this->season_model->get_seasons()));
        $this->load->view('footer',$data);
    }
    
    function view($season_id) {
        $this->load->model('season_model');
        $this->lang->load('admin/seasons');
        $season = $this->season_model->get_season($season_id);
        if($season){
            $data['title'] = sprintf(
                    $this->lang->line('admin/seasons.view.title'),
                    $season->name);

            $this->load->view('header',$data);
            $this->load->view('menu',$data);
            $this->load->view('admin/submenu',$data);
            $this->load->view('admin/seasons/view', array('season' => $season));
            $this->load->view('footer',$data);
        } else {
            show_404();
        }
    }
    
    function create() {
        $this->_create();
    }
    
    private function _create($show_error = false, $message = NULL) {
        $this->load->model('season_model');
        $this->lang->load('admin/seasons');
        $data['title'] = $this->lang->line('admin/seasons.create.title');
        $data['error'] = $show_error;
        $data['message'] = $message;
        $data['jquery'] = true; //we need jQuery for the datepicker
        
        //create list of seasons for the selection of the previous and next season
        $seasons = array('-1' => '');
        foreach ($this->season_model->get_seasons() as $season){
            $seasons[$season->id] = $season->name;
        }
        $data['seasons'] = $seasons;

        $this->load->helper('form');
        $this->load->view('header', $data);
        $this->load->view('menu',$data);
        $this->load->view('admin/submenu',$data);
        $this->load->view('admin/seasons/create', $data);
        $this->load->view('footer', $data);
    }

    function do_create() {
        $this->lang->load('admin/seasons');
        $this->load->library('form_validation');
        
        //validation rules
        $this->form_validation->set_rules('name', 
                $this->lang->line('admin/seasons.create.field.name'),
                'required|trim|min_length[2]|max_length[45]|callback__season_name_does_not_exist');
        $this->form_validation->set_rules('begin', 
                $this->lang->line('admin/seasons.create.field.begin'),
                'required|trim|callback__valid_date_format');
        $this->form_validation->set_rules('end', 
                $this->lang->line('admin/seasons.create.field.end'),
                'required|trim|callback__valid_date_format');
        
        //set error message if season name already exists
        $this->form_validation->set_message('_season_name_does_not_exist',
                $this->lang->line('admin/seasons.create.name.duplicate'));
        //set error message if date is incorrect format
        $this->form_validation->set_message('_valid_date_format',
                $this->lang->line('admin/seasons.create.date.invalid'));

        if($this->form_validation->run()!= true) {
            $this->_create(true, $this->lang->line('admin/seasons.create.message.error'));
        } else {
            // Create an instance of the season model
            $this->load->model('season_model');

            // Grab the data from the form POST
            $name = $this->input->post('name');
            $begin = $this->input->post('begin');
            $end = $this->input->post('end');
            $previous = $this->input->post('previous');
            $next = $this->input->post('next');

            //create new season
            $season_id = $this->season_model->create_season($name, $begin, $end, $previous, $next);

            //if succesful redirect, otherwise return
            if($season_id){
                redirect('/admin/seasons');
            } else {
                $this->_create(true, $this->lang->line('admin/seasons.create.message.internalerror'));
            }
        }
    }
    
    function _season_name_does_not_exist($name){
        // Create an instance of the season model
        $this->load->model('season_model');
        
        //verify that $name is set and check whether season exists
        if($name && $this->season_model->name_exists($name)){
            return false;
        } else {
            return true;
        }
    }
    
    function _valid_date_format($date){
        //todo: this still matches some wrong dates, e.g., 2015-02-31
        if (preg_match('/^(19|20|21)\d\d[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])+$/', $date)) {
            return true;
        } else {
            return false;
        }
    }
}

