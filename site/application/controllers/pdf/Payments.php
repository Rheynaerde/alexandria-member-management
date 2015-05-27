<?php

class Payments extends MY_Controller {
    
    function index() {
        redirect('/main/welcome');
    }
    
    function memo($memo_id, $name = 'memo') {
        $this->load->helper('dompdf');
        $this->load->model('payment_model');
        
        if(!$this->payment_model->can_current_user_access_memo($memo_id)){
            $this->lang->load('management');
            show_error($this->lang->line('management.unauthorized.message'), 403,
                    $this->lang->line('management.unauthorized.title'));
        } else {
        
            $html = $this->load->view('pdf/payments/memo', array(
                'memo' => $this->payment_model->get_memo($memo_id),
                'items' => $this->payment_model->get_memo_items($memo_id)
                ), true);

            pdf_create($html, $name, true);
        }
    }

}