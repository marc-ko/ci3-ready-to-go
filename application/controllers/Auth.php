<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() {
        parent::__construct();

    }

	public function index()
	{
		if($this->aauth->is_loggedin()) redirect('admin', 'refresh');
		
		$data = isset($data) ? $data : array();
		$this->load->view('admin/login',$data);
	}
	
	public function check_login(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
 

		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			$this->load->view('admin/login');
		}
		else
		{

			if($this->aauth->login($this->input->post('username'), $this->input->post('password'),true)){
				redirect('admin', 'refresh');
			}else{
				$data['error'] = $this->aauth->get_errors_array();
				$this->load->view('admin/login',$data);
		 }
	   }
		
	}


	// ! Dangerous Security Hack ! Remove after use
	public function example_register(){
		// $this->aauth->create_user('admin@example.com','admin','admin');
		// $this->aauth->create_user('user@example.com', 'example_pass', 'OptionalUserName');
		// $this->aauth->add_member(1,1);
		// $this->load->view('auth_demo/example_register');
		// $this->aauth->allow_group('public','admin');
		echo "User admin admin added <br> Please Remove this function after used ";
	}
	
}
