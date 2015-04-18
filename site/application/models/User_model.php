<?php


class User_model extends CI_Model {

    var $details;

    function validate_user($username, $password) {
        // Retrieve the users which match the given username and password combination
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('isActive', 1);
        $this->db->where( 'password', sha1($password) );
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
                'uiname'=> $this->details->firstName . ' ' . $this->details->lastName,
                'email'=>$this->details->email,
                'username'=>$this->details->username,
                'isAdmin'=>$this->details->isAdmin,
                'hasMemberManagementRights'=>$this->details->hasMemberManagementRights,
                'isLoggedIn'=>true
            )
        );
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
}

