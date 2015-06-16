<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Returns a pair of values: the first is the membership fee, and the second
 * is the minimum that should at least be payed (taking discounts into account).
 */
function get_membership_fee($member_id, $season) {
    $license = 4000; //40 euro
    $administrative_license = 1500; //15 euro
    
    $CI =& get_instance();
    
    //get the necessary information from the database
    $CI->db->from('members as m');
    $CI->db->select('m.id, p.birthdate, mfo.amount as fee_override, mfo.minimum_amount as minimum_fee_override');
    $CI->db->select('TIMESTAMPDIFF(YEAR,p.birthdate,CURDATE()) as age', false);
    $CI->db->select('TIMESTAMPDIFF(YEAR,p.birthdate,' . $season->start . ') as age_at_start_season', false);
    $CI->db->select('TIMESTAMPDIFF(YEAR,p.birthdate,' . $season->end . ') as age_at_end_season', false);
    $CI->db->join('persons as p', 'p.id=m.person_id', 'left');
    $CI->db->join('membership_fee_override as mfo', 'm.id=mfo.member_id', 'left');
    $CI->db->where('m.id', $member_id);
    $CI->db->group_by('m.id');
    
    $result = $CI->db->get()->result();
    if(is_array($result) && count($result) == 1){
        $member = $result[0];
    } else {
        return array(-1, -1);
    }
    
    //check whether an explicit value is set
    if(isset($member->fee_override)){
        return array($member->fee_override, $member->minimum_fee_override);
    }
    
    //compute the fee based on the age
    if($member->age_at_end_season < 18){
        return array(21000, 10000); //210 euro (minimum 100 euro)
    } else {
        return array(26000, 10000); //260 euro (minimum 100 euro)
    }
    
}
