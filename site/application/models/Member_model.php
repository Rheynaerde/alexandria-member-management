<?php


class Member_model extends CI_Model {

    function all_members($only_names=true) {
        $this->db->from('members');
        if($only_names){
            $this->db->select('members.id, persons.firstName, persons.lastName');
            $this->db->join('persons', 'persons.id=members.person_id', 'left');
        } else {
            $this->db->select('members.id, persons.firstName, persons.lastName, persons.birthdate, members.federation_id');
            $this->db->select('gender.name as gender');
            $this->db->select('hand.name as hand');
            $this->db->join('persons', 'persons.id=members.person_id', 'left');
            $this->db->join('gender', 'gender.id=persons.gender_id', 'left');
            $this->db->join('hand', 'hand.id=members.hand_id', 'left');
        }
        $this->db->order_by('persons.lastName', 'ASC');
        $result = $this->db->get();

        return $result;
    }
}

