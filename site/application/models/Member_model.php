<?php


class Member_model extends CI_Model {

    function get_active_members() {
        $this->db->from('members');
        $this->db->select('members.id, persons.firstName, persons.lastName, persons.familiar_name, persons.birthdate, members.federation_id');
        $this->db->select('TIMESTAMPDIFF(YEAR,persons.birthdate,CURDATE()) as age', false);
        $this->db->select('gender.name as gender');
        $this->db->select('hand.name as hand');
        $this->db->join('persons', 'persons.id=members.person_id', 'left');
        $this->db->join('gender', 'gender.id=persons.gender_id', 'left');
        $this->db->join('hand', 'hand.id=members.hand_id', 'left');
        $this->db->where('is_active', 1);
        $this->db->order_by('persons.lastName', 'ASC');
        return $this->db->get()->result();
    }

    function all_members($only_names=true) {
        $this->db->from('members');
        if($only_names){
            $this->db->select('members.id, persons.firstName, persons.lastName, persons.familiar_name');
            $this->db->join('persons', 'persons.id=members.person_id', 'left');
        } else {
            $this->db->select('members.id, persons.firstName, persons.lastName, persons.familiar_name, persons.birthdate, members.federation_id');
            $this->db->select('TIMESTAMPDIFF(YEAR,persons.birthdate,CURDATE()) as age', false);
            $this->db->select('gender.name as gender');
            $this->db->select('hand.name as hand');
            $this->db->join('persons', 'persons.id=members.person_id', 'left');
            $this->db->join('gender', 'gender.id=persons.gender_id', 'left');
            $this->db->join('hand', 'hand.id=members.hand_id', 'left');
        }
        $this->db->order_by('persons.lastName', 'ASC');
        return $this->db->get()->result();
    }
    
    function user_members($user_id, $only_names=true) {
        $this->db->from('members');
        if($only_names){
            $this->db->select('members.id, persons.firstName, persons.lastName, persons.familiar_name');
            $this->db->join('persons', 'persons.id=members.person_id', 'left');
            $this->db->join('user_member', 'user_member.member_id=members.id', 'left');
            $this->db->where('user_member.user_id', $user_id);
        } else {
            $this->db->select('members.id, persons.firstName, persons.lastName, persons.familiar_name, persons.birthdate, members.federation_id');
            $this->db->select('TIMESTAMPDIFF(YEAR,persons.birthdate,CURDATE()) as age', false);
            $this->db->select('gender.name as gender');
            $this->db->select('hand.name as hand');
            $this->db->join('persons', 'persons.id=members.person_id', 'left');
            $this->db->join('gender', 'gender.id=persons.gender_id', 'left');
            $this->db->join('hand', 'hand.id=members.hand_id', 'left');
            $this->db->join('user_member', 'user_member.member_id=members.id', 'left');
            $this->db->where('user_member.user_id', $user_id);
        }
        $this->db->order_by('persons.lastName', 'ASC');
        return $this->db->get()->result();
    }
    
    function current_user_can_manage_member($member_id){
        if($this->session->userdata('hasMemberManagementRights')){
            return true;
        } else {
            $this->db->from('user_member');
            $this->db->where('user_id', $this->session->userdata('id'));
            $this->db->where('member_id', $member_id);
            $result = $this->db->get()->result();
            return is_array($result) && count($result) > 0;
        }
    }
    
    function does_member_exist($member_id){
        $this->db->from('members')->select('id')->where('id', $member_id);
        $result = $this->db->get()->result();
        return is_array($result) && count($result) == 1;
    }
    
    function get_member($member_id){
        $this->db->from('members');
        $this->db->select('members.id, persons.firstName, persons.lastName, persons.familiar_name, persons.birthdate, members.federation_id');
        $this->db->select('TIMESTAMPDIFF(YEAR,persons.birthdate,CURDATE()) as age', false);
        $this->db->select('gender.name as gender');
        $this->db->select('hand.name as hand');
        $this->db->join('persons', 'persons.id=members.person_id', 'left');
        $this->db->join('gender', 'gender.id=persons.gender_id', 'left');
        $this->db->join('hand', 'hand.id=members.hand_id', 'left');
        $this->db->where('members.id', $member_id);
        $result = $this->db->get()->result();
        if(is_array($result) && count($result) == 1){
            return $result[0];
        } else {
            return NULL;
        }
    }
    
    function get_person_id($member_id){
        $this->db->from('members');
        $this->db->select('person_id');
        $this->db->where('id', $member_id);
        $result = $this->db->get()->result();
        if(is_array($result) && count($result) == 1){
            return $result[0]->person_id;
        } else {
            return NULL;
        }
    }
    
    function get_members_for_family($family_id) {
        $this->db->from('members');
        $this->db->select('`members`.`id`, `firstName`, `lastName`, `familiar_name`, IF(`user_member`.`id` IS NULL, 0, 1) AS can_manage', false);
        $this->db->join('persons', 'persons.id=members.person_id', 'left');
        $this->db->join('family_member', 'family_member.member_id=members.id', 'left');
        $this->db->join('user_member', 'members.id=user_member.member_id and user_id=' . $this->session->userdata('id'), 'left');
        $this->db->where('family_member.family_id', $family_id);
        return $this->db->get()->result();
    }
    
    function get_members_for_season($season_id) {
        $this->db->from('members as m');
        $this->db->select('m.id, p.firstName, p.lastName, p.familiar_name, p.birthdate, m.federation_id');
        $this->db->select('TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) as age', false);
        $this->db->select('g.name as gender');
        $this->db->select('h.name as hand');
        $this->db->join('persons as p', 'p.id=m.person_id', 'left');
        $this->db->join('memberships as ms', 'ms.member_id=m.id', 'left');
        $this->db->join('gender as g', 'g.id=p.gender_id', 'left');
        $this->db->join('hand as h', 'h.id=m.hand_id', 'left');
        $this->db->where('ms.season_id', $season_id);
        $this->db->group_by('m.id');
        return $this->db->get()->result();
    }
}

