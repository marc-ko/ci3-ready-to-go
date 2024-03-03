<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {


	function __construct()

	{

		parent::__construct();

	} 

	
    function getName(){
        echo "Hello World";
    }