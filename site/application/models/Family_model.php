<?php


class Family_model extends CI_Model {

    function get_all_families_for_member($member_id) {
        $this->db->from('families');
        $this->db->select('families.id, name');
        $this->db->join('family_member', 'families.id=family_id', 'left');
        $this->db->where('member_id', $member_id);
        $result = $this->db->get()->result();

        return $result;
    }
    
    function current_user_can_manage_family($family_id){
        if($this->session->userdata('hasMemberManagementRights')){
            return true;
        } else {
            $this->db->from('user_family');
            $this->db->where('user_id', $this->session->userdata('id'));
            $this->db->where('family_id', $family_id);
            $result = $this->db->get()->result();
            return is_array($result) && count($result) > 0;
        }
    }
    
    function does_family_exist($family_id){
        $this->db->from('families')->select('id')->where('id', $family_id);
        $result = $this->db->get()->result();
        return is_array($result) && count($result) == 1;
    }
}

