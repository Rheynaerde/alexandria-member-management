<?php

class Payment_model extends CI_Model {
    
    function can_current_user_access_memo($memo_id) {
        return $this->session->userdata('is_admin') ||
                $this->session->userdata('has_member_management_rights');
    }
    
    function get_memos($paid=false, $cancelled=false) {
        $this->db->from('payment_memos as pm');
        $this->db->select('pm.id, date, due_date, is_paid, pm.is_cancelled, name, pm.description, giro_description');
        $this->db->select('SUM(pi.amount) as amount', false);
        $this->db->join('payment_items as pi', 'pm.id=memo_id', 'left');
        $this->db->where('pi.is_cancelled', '0');
        $this->db->where('pm.is_cancelled', $cancelled ? '1' : '0');
        $this->db->where('pm.is_paid', $paid ? '1' : '0');
        $this->db->group_by('pm.id');
        $this->db->order_by('date', 'ASC');
        return $this->db->get()->result();
    }
    
    function get_memo($memo_id) {
        $this->db->from('payment_memos as pm');
        $this->db->select('date, due_date, is_paid, pm.is_cancelled, name, pm.description, giro_description');
        $this->db->select('SUM(pi.amount) as amount', false);
        $this->db->join('payment_items as pi', 'pm.id=memo_id', 'left');
        $this->db->where('pm.id', $memo_id);
        $this->db->where('pi.is_cancelled', '0');
        $this->db->group_by('pm.id');
        $result = $this->db->get()->result();
        if(is_array($result) && count($result) == 1){
            return $result[0];
        } else {
            return NULL;
        }
    }
    
    function get_memo_items($memo_id) {
        $this->db->from('payment_items');
        $this->db->select('description, amount, is_cancelled');
        $this->db->where('memo_id', $memo_id);
        $this->db->order_by('position', 'ASC');
        return $this->db->get()->result();
    }
    
    private function _copy_memo_update_entry($memo){
        $fields = array('date', 'due_date', 'is_paid', 'is_cancelled', 'name', 'description', 'giro_description');
        $data = array();
        foreach ($fields as $field){
            $data['old_' . $field] = $memo->{$field};
            $data['new_' . $field] = $memo->{$field};
        }
        return $data;
    }
    
    function set_payment_status($memo_id, $state){
        if(null!==$this->session->userdata('id')){
            //only allow a payment to be set if a user is logged in
            $user_id = $this->session->userdata('id');
            $memo = $this->get_memo($memo_id);
            
            //check whether there is actually a change
            if(!($state && $memo->is_paid) && ($state || $memo->is_paid)){
                $this->db->trans_start();
                
                //update the memo
                $this->db->where('id', $memo_id);
                $this->db->update('payment_memos', array('is_paid' => $state));
                
                //create an entry for this update
                $data = $this->_copy_memo_update_entry($memo);
                $data['new_is_paid'] = $state;
                $data['memo_id'] = $memo_id;
                $data['user_id'] = $user_id;
                
                $this->db->insert('payment_memo_updates', $data);
                
                $this->db->trans_complete();
                
                return $this->db->trans_status();
            } else {
                //nothing needs to be changed so the setting was succesful
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }

}
