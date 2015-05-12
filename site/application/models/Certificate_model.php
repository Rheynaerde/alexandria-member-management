<?php


class Certificate_model extends CI_Model {
    
    function get_certificates_for_member($member_id){
        $this->db->from('certificates');
        $this->db->select('start_date, end_date, comment');
        $this->db->select('certificate_type.name as type');
        $this->db->join('certificate_type', 'certificate_type.id=type_id', 'left');
        $this->db->where('member_id', $member_id);
        $this->db->order_by('start_date', 'DESC');
        $result = $this->db->get()->result();
        return $result;
    }
}

