<?php

class Payments extends Management_Controller {
    
    function index() {
        $this->overview();
    }
    
    function overview() {
        $this->load->model('payment_model');
        $this->lang->load('management/payments');
        $data['title'] = $this->lang->line('management/payments.overview.title');
        $data['sortable_tables'] = true;

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('management/submenu',$data);
        $this->load->view('management/payments/list', 
                array('memos' => $this->payment_model->get_memos()));
        $this->load->view('footer',$data);
    }
}

