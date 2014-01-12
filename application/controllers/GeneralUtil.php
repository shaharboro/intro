<?php

class GeneralUtil extends CI_Controller{
    
    public function PopulatePageIds() {
        $this->load->model('DbManager');
        $data['Ids'] = $this->DbManager->getPageIds();
        foreach ($data['Ids'] as $value) {
            $arr[] = $value['id'];
        }
        $str = implode(",", $arr);
        $data['json'] =   '{"PageIds":"'.$str.'"}';
        $this->load->view('json_view', $data);
    }

}

