<?php


class Pdf_model extends CI_Model {

    function generate_member_list($members, $filename, $title = '', $stream = false) {
        $this->load->helper('dompdf');
        $html = $this->load->view('pdf/members/list',
                array('members' => $members, 'title' => $title), true);
        
        pdf_create($html, $filename, $stream);
    }
    
    function generate_member_infosheet($member_id, $season_id, $medical_needed, $filename, $stream = false) {
        $this->load->helper('dompdf');
        $this->load->model('member_model');
        $this->load->model('person_model');
        $this->load->model('season_model');
        
        $person_id = $this->member_model->get_person_id($member_id);
        $member = $this->member_model->get_member($member_id);
        $addresses = $this->person_model->get_addresses($person_id);
        $mailaddresses = $this->person_model->get_mail_addresses($person_id);
        $telephonenumbers = $this->person_model->get_telephone_numbers($person_id);
        $season = $this->season_model->get_season($season_id);

        $html = $this->load->view('pdf/members/infosheet', 
                array(
                    'member' => $member,
                    'addresses' => $addresses,
                    'mailaddresses' => $mailaddresses,
                    'telephonenumbers' => $telephonenumbers,
                    'season' => $season,
                    'medical' => $medical_needed), true);

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

