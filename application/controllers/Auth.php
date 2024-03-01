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
	public function index()
	{
		$this->load->view('login',$data);
	}
	
	public function check_login(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
 
	   $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required');
	   
	   if($this->form_validation->run() == FALSE)
	   {
		 //Field validation failed.  User redirected to login page
		 $this->load->view('login');
	   }
	   else
	   {
		   
		 if($this->aauth->login($this->input->post('username'), $this->input->post('password'))){
		 	redirect('dashboard', 'refresh');
		 }else{
			 $data['error'] = $this->aauth->get_errors_array();
			 $this->load->view('login',$data);
		 }
	   }
		
	}
	
	
}
