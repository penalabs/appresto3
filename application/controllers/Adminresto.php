<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminresto extends CI_Controller {


    public function index() {
        //$this->load->view('table');
        $this->template->load('template', 'adminresto');
    }


}
