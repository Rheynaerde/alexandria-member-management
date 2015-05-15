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
    
}

