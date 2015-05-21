<?php


class User_model extends CI_Model {

    var $details;

    function validate_user($username, $password) {
        // Retrieve the users which match the given username and password combination
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('is_active', 1);
        $this->db->where('password', sha1($password));
        $result = $this->db->get()->result();

        // If a value exists, then the user account exists and is validated
        if (is_array($result) && count($result) == 1) {
            // Store the user details in the $details property of this class
            $this->details = $result[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }

        return false;
    }

    function set_session() {
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'uiname'=> $this->details->first_name . ' ' . $this->details->last_name,
                'email'=>$this->details->email,
                'username'=>$this->details->username,
                'is_admin'=>$this->details->is_admin,
                'has_member_management_rights'=>$this->details->has_member_management_rights,
                'is_logged_in'=>true
            )
        );
    }

    /*
     * Create a new user and return its id (or false if unsuccessful)
     */
    function create_new_user($username, $password, $first_name = NULL,
            $last_name = NULL, $email = NULL, $has_management_rights = false,
            $is_admin = false, $member_id = NULL) {
        //prepare data for creation of season
        $data['username'] = $username;
        $data['password'] = sha1($password);
        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $data['email'] = $email;
        $data['is_admin'] = $is_admin ? 1 : 0;
        $data['has_member_management_rights'] = $has_management_rights ? 1 : 0;

        //create user in database
        $this->db->trans_start();
        if($this->db->insert('users',$data)){
            $user_id = $this->db->insert_id();
            //connect user to member
            if(isset($member_id)){
                $this->db->insert('user_member', array(
                    'user_id' => $user_id,
                    'member_id' => $member_id,
                    'type_id' => 1 //set as primary
                ));
            }
        }
        $this->db->trans_complete();
        if(isset($user_id)){
            return $user_id;
        } else {
            return false;
        }
    }
    
    function change_password($newpassword, $username = NULL) {
        if(!isset($username)){
            //if the username is not supplied,
            //we assume that the change is for the current user
            $username = $this->session->username;
            if(!isset($username)){
                return;
            }
        }
        $this->db->where('username', $username)
                ->update('users', array('password' => sha1($newpassword)));
    }
    
    function all_users($only_active=true) {
        $this->db->from('users');
        $this->db->select('id, username, first_name, last_name, email, is_admin, has_member_management_rights, is_active');
        if($only_active){
            $this->db->where('is_active', 1);
        }
        $this->db->order_by('username', 'ASC');
        $result = $this->db->get();

        return $result;
    }
    
    function get_user($user_id) {
        $this->db->from('users');
        $this->db->select('id, username, first_name, last_name, email, is_admin, has_member_management_rights, is_active');
        $this->db->where('id', $user_id);
        $result = $this->db->get()->result();
        if(is_array($result) && count($result) == 1){
            return $result[0];
        } else {
            return NULL;
        }
    }
    
    function set_management_rights($user_id, $rights){
        $this->db->where('id', $user_id);
        $this->db->update('users', array('has_member_management_rights' => (int)$rights));
    }
    
    function set_admin($user_id, $is_admin){
        $this->db->where('id', $user_id);
        $this->db->update('users', array('is_admin' => (int)$is_admin));
    }

    function set_active($user_id, $is_active){
        $this->db->where('id', $user_id);
        $this->db->update('users', array('is_active' => (int)$is_active));
    }
}

