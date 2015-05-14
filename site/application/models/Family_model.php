<?php


class Family_model extends CI_Model {

    function get_all_families_for_member($member_id) {
        $this->db->from('families');
        $this->db->select('`families`.`id`, `name`, IF(`user_family`.`id` IS NULL, 0, 1) AS can_manage', false);
        $this->db->join('family_member', 'families.id=family_member.family_id', 'left');
        $this->db->join('user_family', 'families.id=user_family.family_id and user_id=' . $this->session->userdata('id'), 'left');
        $this->db->where('member_id', $member_id);
        $result = $this->db->get()->result();

        return $result;
    }

    function get_all_families() {
        $this->db->from('families');
        $this->db->select('id, name, description');
        return $this->db->get()->result();
    }

    function get_all_families_manageable_by_user($user_id) {
        $this->db->from('families');
        $this->db->select('families.id, name, description');
        $this->db->join('user_family', 'families.id=user_family.family_id', 'left');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result();
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

    function get_family($family_id) {
        $this->db->from('families');
        $this->db->select('name, description');
        $this->db->where('id', $family_id);
        $result = $this->db->get()->result();
        if(is_array($result) && count($result) == 1){
            return $result[0];
        } else {
            return NULL;
        }
    }
}

