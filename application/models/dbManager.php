<?php

class DbManager extends CI_Model {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->database();
    }
    
    public function getLast3Posts() {
        
        $query = $this->db->query("SELECT * from pages order by dateAdded desc limit 3;");
        return $query->result();
    }
    
    public function getPost($pageId){
        
        $query = $this->db->get_where("pages", "id = $pageId");
        return $query->row();
    }
    
    public function getPageIds(){

        $this->db->select('id');  
        $query = $this->db->get('pages');

//        $this->load->database();
//        $query = $this->db->query("SELECT id from pages order by id asc;");
        return $query->result_array();
    }
}

