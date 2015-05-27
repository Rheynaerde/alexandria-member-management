<?php

class Payments extends MY_Controller {
    
    function index() {
        redirect('/main/welcome');
    }
    
    function memo($memo_id, $name = 'memo') {
        $this->load->model('payment_model');
        $this->load->model('pdf_model');
        
        if(!$this->payment_model->can_current_user_access_memo($memo_id)){
            $this->lang->load('management');
            show_error($this->lang->line('management.unauthorized.message'), 403,
                    $this->lang->line('management.unauthorized.title'));
        } else {
        
            $this->pdf_model->generate_payment_memo($memo_id, $name);
        }
    }

}