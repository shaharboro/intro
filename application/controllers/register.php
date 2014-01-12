<?php

class Register extends CI_Controller{
    
    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index(){

        $this->load->view('register/index');
    }
    
    public function registeruser() {
        
        $this->load->database();
        $this->load->library('form_validation');
        $this->Validate();
        if ($this->form_validation->run() === FALSE) {
                $this->load->view('register/index');
        }
        else {//insert user to database with an author privilige
            $this->load->model('DbUser');
            $this->DbUser->InsertUser($this->input->post('username'), $this->input->post('email'), $this->input->post('password'));
            $this->load->view('register/register_success');
            $this->session->set_userdata(array('uId'=>'2', 'uName'=>$this->input->post('username')));
            redirect('/site/index');   
        }
    }
    
    private function Validate(){
        
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]'); 
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    }
}

