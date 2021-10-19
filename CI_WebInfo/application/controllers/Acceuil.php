<?php 

class Acceuil extends CI_Controller {
    
    public function index()
    {
        $data['pageName'] = 'index';

        $this->load->view('body/header_default', $data);
        $this->load->view('body/body_default');
        $this->load->view('body/footer');
    }

    


}