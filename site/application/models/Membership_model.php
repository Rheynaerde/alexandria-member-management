<?php


class Membership_model extends CI_Model {
    
    function get_memberships_for_member($member_id){
        $this->db->from('memberships');
        $this->db->select('start_date, end_date, comment, isArchived, isCurrent');
        $this->db->select('membership_type.name as type');
        $this->db->select('seasons.name as season');
        $this->db->join('seasons', 'seasons.id=season_id', 'left');
        $this->db->join('membership_type', 'membership_type.id=type_id', 'left');
        $this->db->where('member_id', $member_id);
        $this->db->order_by('start_date', 'DESC');
        $result = $this->db->get()->result();
        return $result;
    }
}

