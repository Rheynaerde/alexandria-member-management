<?php

class Mail extends Management_Controller {
    
    function index() {
        $this->load->model('member_model');
        $this->lang->load('management/mail');
        $this->_show_mailing_list($this->member_model->get_members_mail_list(true),
                $this->lang->line('management/mail.lists.active'));
    }
    
    function former() {
        $this->load->model('member_model');
        $this->lang->load('management/mail');
        $this->_show_mailing_list($this->member_model->get_members_mail_list(false),
                $this->lang->line('management/mail.lists.former'));
    }
    
    private function _show_mailing_list($mails, $name){
        $data['title'] = sprintf($this->lang->line('management/mail.title'), $name);

        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('management/submenu',$data);
        $this->load->view('management/mail', array('mails' => $mails));
        $this->load->view('footer',$data);
    }


}

