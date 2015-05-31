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
    
    function view($memo_id) {
        $this->load->model('payment_model');
        $this->lang->load('management/payments');
        
        $data['title'] = sprintf(
                $this->lang->line('management/payments.view.title.format'),
                $memo_id);

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('management/submenu',$data);
        $this->load->view('management/payments/view', 
                array(
                    'memo' => $this->payment_model->get_memo($memo_id),
                    'items' => $this->payment_model->get_memo_items($memo_id),
                    'history' => $this->payment_model->get_memo_history($memo_id)));
        $this->load->view('footer',$data);
    }
}

