<?php
require 'iuser.php';
class DbUser extends CI_Model implements IUser {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->database();
    }

    public function InsertUser($username, $email, $password) {
        
        $data = array(
            'userType' => 'author' ,
            'username' => $username ,
            'email'     => $email,
            'pass' => $password
         );
        
        $this->db->insert('users', $data); 
    } 
    
    public function IsValidLogin($username, $password) {
        
        $where = array("username"=> $username, "pass"=>$password);
        $query = $this->db->get_where("users", $where);
        return $query->num_rows() ? true : false;
    }
    
    public function IsUserExists($username) {
        
        $where = array("username"=> $username);
        $query = $this->db->get_where("users", $where);
        return $query->num_rows() ? true : false;
    }
    
    function IsPasswordCorrect($username, $password) {
        
        $where = array("username"=> $username, "pass"=>$password);
        $query = $this->db->get_where("users", $where);
        return $query->num_rows() ? true : false;
    }
}

