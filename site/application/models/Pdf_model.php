<?php


class Pdf_model extends CI_Model {

    function generate_member_list($members, $filename, $title = '', $stream = false) {
        $this->load->helper('dompdf');
        $html = $this->load->view('pdf/members/list',
                array('members' => $members, 'title' => $title), true);
        
        pdf_create($html, $filename, $stream);
    }

    function generate_payment_memo($memo_id, $filename, $stream = false){
        $this->load->helper('dompdf');
        $this->load->model('payment_model');
        
        $html = $this->load->view('pdf/payments/memo', array(
                'memo' => $this->payment_model->get_memo($memo_id),
                'items' => $this->payment_model->get_memo_items($memo_id)
                ), true);
        
        pdf_create($html, $filename, $stream);
    }
}

