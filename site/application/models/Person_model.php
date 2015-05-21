<?php

class Person_model extends CI_Model {

    function get_addresses($person_id) {
        $this->db->from('person_address');
        $this->db->select('comment, street, number, box, zip');
        $this->db->select('cities.name as city');
        $this->db->select('countries.name as country');
        $this->db->join('addresses', 'addresses.id=address_id', 'left');
        $this->db->join('cities', 'addresses.city_id=cities.id', 'left');
        $this->db->join('countries', 'cities.country_id=countries.id', 'left');
        $this->db->where('person_id', $person_id);
        $result = $this->db->get()->result();

        return $result;
    }
    
    function get_mail_addresses($person_id) {
        $this->db->from('person_mailaddress');
        $this->db->select('mailaddress, comment, is_active');
        $this->db->join('mailaddresses', 'mailaddresses.id=mailaddress_id', 'left');
        $this->db->where('person_id', $person_id);
        $result = $this->db->get()->result();

        return $result;
    }
    
    function get_telephone_numbers($person_id) {
        $this->db->from('person_telephone_number');
        $this->db->select('telephone_number, comment, is_active');
        $this->db->join('telephone_numbers', 'telephone_numbers.id=telephone_number_id', 'left');
        $this->db->where('person_id', $person_id);
        $result = $this->db->get()->result();

        return $result;
    }

}
