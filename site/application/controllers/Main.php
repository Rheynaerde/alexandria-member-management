<?php

class Main extends MY_Controller {
    
    function welcome() {
        $this->lang->load('main');
        $data['title'] = $this->lang->line('main.welcome.title');

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('welcome',$data);
        $this->load->view('footer',$data);
    }


}

