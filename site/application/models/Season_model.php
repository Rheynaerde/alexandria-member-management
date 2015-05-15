<?php


class Season_model extends CI_Model {
    
    function get_seasons(){
        $this->db->from('seasons as s');
        $this->db->select('s.id, s.name, s.begin, s.end, s.is_archived, s.is_current');
        $this->db->select('prev.name as previous');
        $this->db->select('next.name as next');
        $this->db->join('seasons as prev', 'prev.id=s.previous_id', 'left');
        $this->db->join('seasons as next', 'next.id=s.next_id', 'left');
        $this->db->order_by('s.begin', 'DESC');
        return $this->db->get()->result();
    }
}

