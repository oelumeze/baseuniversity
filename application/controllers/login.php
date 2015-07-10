<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller
    {		
            public function __construct()
            {
                parent::__construct();
                
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->model('members');
            }
            
            function index()
            {
                
                $data['title'] = 'Admin Login';
                
                $thi->load->view('admin.php',$data);
                
                
                
                
                
                
                
                
            }
               
            

    } // End Home