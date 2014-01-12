<?php

class Login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        
        $this->load->view('login/index');
    }
    
    public function loginuser() {
        
        $this->load->library('form_validation');
        $this->Validate();
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('login/index');
        }
        else {//insert user to database with an author privilige
            $this->load->model('DbUser');
            if($this->DbUser->IsValidLogin($this->input->post('username'), $this->input->post('password'))) {
                $this->session->set_userdata(array('uId'=>'2', 'uName'=>$this->input->post('username')));
                redirect('site/index');
            }
            else{
                redirect('error/generalerror');
            }
        }
    }
      
    public function logoutuser() {
        
        $this->session->unset_userdata('uId');
        $this->session->unset_userdata('uName');
        redirect('/site/index');   
    }
    
    private function Validate(){

    $this->form_validation->set_rules('username', 'Username', 'required|callback_username_exists');
    $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check'); 
    }
    
    public function username_exists($str) {
        
        $this->load->model('DbUser');
        
        if (!$this->DbUser->IsUserExists($str)) {
            $this->form_validation->set_message('username_exists', 'the name does not exist in the database');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function password_check($pass) {
        
         $this->load->model('DbUser');
         
         if (!$this->DbUser->IsPasswordCorrect($this->input->post('username'), $pass)) {
            $this->form_validation->set_message('password_check', 'wrong password');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}

