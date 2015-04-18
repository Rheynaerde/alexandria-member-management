<?php

class Main extends Admin_controller {
    
    function index() {
        $this->lang->load('admin/main');
        $data['title'] = $this->lang->line('admin/main.title');

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('admin/submenu',$data);
        $this->load->view('admin/main',$data);
        $this->load->view('footer',$data);
    }


}

