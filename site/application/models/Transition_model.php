<?php


class Transition_model extends CI_Model {

    function get_transitions($include_archived=FALSE){
        $this->db->from('transitions as t');
        $this->db->select('t.id, t.fee, t.minimum_fee, m.id, s.id, p.last_name, p.first_name, s.name as season, ts.name as state');
        $this->db->join('members as m', 'm.id=t.member_id', 'left');
        $this->db->join('persons as p', 'm.person_id=p.id', 'left');
        $this->db->join('seasons as s', 's.id=t.season_id', 'left');
        $this->db->join('transition_state as ts', 'ts.id=t.state_id', 'left');
        if(!$include_archived){
            $this->db->where('t.state_id != ', '5'); //not archived
        }
        return $this->db->get()->result();
    }

    function get_transitioning_members(){
        $this->db->from('members as m');
        $this->db->select('m.id');
        $this->db->join('memberships as ms', 'm.id=ms.member_id', 'left');
        $this->db->join('seasons as s', 's.id=ms.season_id', 'left');
        $this->db->where('s.is_current', '1');
        $this->db->where('m.is_active', '1');
        $this->db->group_by('m.id');
        return $this->db->get()->result();
    }
    
    function create_transitions($members, $new_season_id){
        $this->load->helper('membership_fee');
        $this->load->model('season_model');
        $season = $this->season_model->get_season($new_season_id);
        
        //first create data array
        $data = array();
        foreach ($members as $member){
            $fee = get_membership_fee($member->id, $season);
            $data[] = array(
                'member_id' => $member->id,
                'season_id' => $new_season_id,
                'fee' => $fee[0],
                'minimum_fee' => $fee[1],
                'state_id' => 1 //created
            );
        }
        
        //then insert them in the database
        $old_debug = $this->db->db_debug;
        $this->db->db_debug = FALSE;
        $succes = $this->db->insert_batch('transitions', $data);
        $this->db->db_debug = $old_debug;
        return $succes;
    }
    
    function create_transitions_for_current_season(){
        $this->load->model('season_model');
        $current_season = $this->season_model->get_current_season();
        return $this->create_transitions(
                $this->get_transitioning_members(),
                $current_season->next_id);
    }

}

