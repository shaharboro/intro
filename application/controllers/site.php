<?php

class Site extends CI_Controller{
    
     const PREVIEW = 250;

//    function __construct() {
//        $this->load->database();
//    }
    private function setPreview($data) {
        
        return substr($data, 0, self::PREVIEW);
    }
    
    public function index(){
        //echo phpinfo();
        $this->load->model('DbManager');
        $data['results'] = $this->DbManager->getLast3Posts();
        foreach ($data['results'] as $value) {
            $value->content = $this->setPreview($value->content)."<br>".'<a href="'.base_url('site/page/'."$value->id"). '">read more here..</a>';
            //$value->content += 'xxx';//'<a href="'.base_url('site/page/'."$value->id"). '">read more..</a>'  ;
        }
        $this->load->view('header');
        $this->load->view('index_content', $data);
        $this->load->view('footer');
    }
    
    public function page($pageId=0){
        
        $this->load->model('DbManager');
        $data['results'] = $this->DbManager->getPost($pageId);
        $this->load->view('header');
        $this->load->view('content', $data);
        $this->load->view('footer');
    }
    
    public function archives($pageIds=0){
        
        $data['results']=null;
        $this->load->model('DbManager');
        $this->load->helper('form');
        if($this->input->post('pageIds')){
            $data['results'] = $this->DbManager->getPost($this->input->post('pageIds'));
            $this->load->view('header');
            $this->load->view('archives');
            $this->load->view('content', $data);
            $this->load->view('footer');
        }
        else{
            $this->load->view('header');
            $this->load->view('archives');
            $this->load->view('content');
            $this->load->view('footer');
        }
    }
    
    public function Post(){
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('txtTitle', 'Title', 'trim|required');
        $this->form_validation->set_rules('txtContent', 'Content', 'required');
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('header');
            $this->load->view('post');
            $this->load->view('footer'); 
        }
        else{//success
            echo $this->input->post('txtTitle');
            $this->load->view('header');
            $this->load->view('post_success');
            $this->load->view('footer'); 
        }

    }
}

