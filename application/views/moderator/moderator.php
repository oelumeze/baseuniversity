<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Moderator extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->helper(array('form', 'file'));
			$this->load->library(array('pagination', 'upload', 'form_validation'));
			#$this->load->helper('captcha');
			
			$this->load->model('members');
			#$this->output->enable_profiler(TRUE);
			
		}
                
                
                function index(){
			
			echo "kkk";
			
			
			
			
		}
                
                
                
            
        }