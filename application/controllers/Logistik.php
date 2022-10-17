<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logistik extends CI_Controller {


    public function index() {
        //$this->load->view('table');
        $this->template->load('template', 'logistik');
    }


}
