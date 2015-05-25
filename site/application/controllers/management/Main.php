<?php

class Main extends Management_Controller {
    
    function index() {
        $this->lang->load('management/main');
        $data['title'] = $this->lang->line('management/main.title');

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('management/submenu',$data);
        $this->load->view('management/main',$data);
        $this->load->view('footer',$data);
    }


}

