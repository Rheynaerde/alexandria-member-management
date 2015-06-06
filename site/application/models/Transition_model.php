<?php


class Transition_model extends CI_Model {

    function get_transitions($include_archived=FALSE){
        $this->db->from('transitions as t');
        $this->db->select('t.id, t.fee, m.id, s.id, p.last_name, p.first_name, s.name as season, ts.name as state');
        $this->db->join('members as m', 'm.id=t.member_id', 'left');
        $this->db->join('persons as p', 'm.person_id=p.id', 'left');
        $this->db->join('seasons as s', 's.id=t.season_id', 'left');
        $this->db->join('transition_state as ts', 'ts.id=t.state_id', 'left');
        if(!$include_archived){
            $this->db->where('t.state_id != ', '5'); //not archived
        }
        return $this->db->get()->result();
    }

}

