<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();

		if(!$this->aauth->is_loggedin()){
			redirect('auth', 'refresh');
			exit;
		}	
    }

	public function index()
	{
		$this->load->view('admin/dashboard');
	}

}
