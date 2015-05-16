<?php

class Seasons extends Admin_controller {
    
    function members($season_id) {
        $this->load->helper('dompdf');
        $this->load->model('member_model');
        $this->load->model('season_model');
        $this->lang->load('members');
        $this->lang->load('admin/seasons');
        
        $members = $this->member_model->get_members_for_season($season_id);
        $season = $this->season_model->get_season($season_id);
        
        $html = $this->load->view('pdf/members/list', array(
            'members' => $members,
            'title' => sprintf($this->lang->line('admin/seasons.overview.pdf.header.format'), $season->name)), true);
        
        pdf_create($html, $this->lang->line('admin/seasons.overview.pdf.filename.prefix') . $season->name, true);
    }
}

