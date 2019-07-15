<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Football extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Football_model');
    }
    

    public function index()
    {
        $data['models'] = $this->Football_model->index(); 
        
        $this->load->view('football/index', $data);
    }

    public function index_football()
    {
        $data['models'] = $this->Football_model->index_football();

        $this->load->view('football/index', $data);
    }


}

/* End of file Football.php */
