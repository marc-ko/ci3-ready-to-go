<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

    public function logout()
    {
        if($this->aauth->logout()){
            // $this->aauth->info('Logged out successfully');
            $this->session->set_flashdata('logout_success','Logged out successfully');
        }
        redirect('auth', 'refresh');
    }

}