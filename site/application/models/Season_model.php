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
    
    function get_season($season_id){
        $this->db->from('seasons as s');
        $this->db->select('s.id, s.name, s.begin, s.end, s.is_archived, s.is_current');
        $this->db->select('prev.name as previous');
        $this->db->select('next.name as next');
        $this->db->join('seasons as prev', 'prev.id=s.previous_id', 'left');
        $this->db->join('seasons as next', 'next.id=s.next_id', 'left');
        $this->db->where('s.id', $season_id);
        $result = $this->db->get()->result();
        if(is_array($result) && count($result) == 1){
            return $result[0];
        } else {
            return NULL;
        }
    }
    
    /**
     * Checks whether there is a season with the given name
     */
    function name_exists($name){
        //select all seasons that have this name
        $this->db->from('seasons');
        $this->db->where('name', $name);
        $result = $this->db->get()->result();

        // if any records got selected, then the season name exists
        return (is_array($result) && count($result) > 0);
    }
    
    /*
     * Create a new season and return its id (or false if unsuccessful)
     */
    function create_season($name, $begin, $end, $previous, $next, $current = false){
        //prepare data for creation of season
        $data['name'] = $name;
        $data['begin'] = $begin;
        $data['end'] = $end;
        $data['is_current'] = $current ? 1 : 0;
        $data['previous_id'] = ($previous=='-1') ? NULL : $previous;
        $data['next_id'] = ($next=='-1') ? NULL : $next;
        
        //create season in database
        $this->db->trans_start();
        if($this->db->insert('seasons',$data)){
            $season_id = $this->db->insert_id();
            if($previous!='-1'){
                $this->db->where('id', $previous)->update('seasons', array('next_id' => $season_id));
            }
            if($next!='-1'){
                $this->db->where('id', $next)->update('seasons', array('previous_id' => $season_id));
            }
        }
        $this->db->trans_complete();
        if(isset($season_id)){
            return $season_id;
        } else {
            return false;
        }
    }
}

