<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Signup extends CI_Controller
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
			
			$data['title'] = 'Base University Portal System';
			
			$this->form_validation->set_rules('username','Username', 'required');
			$this->form_validation->set_rules('password','Passwrod', 'required');
			
			if($this->form_validation->run() == FALSE){
				
				$data['error'] = validation_errors();
				$this->load->view('login.php',$data);
			}
			
			else{
				
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				
				
				
				if($this->members->is_exist('login',array('username'=>$username, 'password'=>$password))){
					
					$account_type = $this->members->get('account_type',array('username'=>$username),'login');
					$id = $this->members->get('login_id',array('username'=>$username),'login');
					
					$this->session->set_userdata(array('username'=>$username,
									   'password'=>$password,
									   'account_type'=>$account_type,
									   'login_id'=>$id));
					
					switch($this->session->userdata('account_type')){
						
						case 'admin':
							//echo $account_type;
							//echo $username;
							//echo $password;
							//echo $id;
							redirect('moderator');
							break;
						case 'student':
							$student_id = $this->members->get('student_id',array('admission_number'=>$username),'students');
							$this->session->set_userdata(array('acc_id'=>$student_id));
							$this->session->set_userdata(array('stud_num'=>$username));
							//echo $this->session->userdata('acc_id');
							redirect('student');
							break;
						case 'faculty':
							$faculty_id = $this->members->get('faculty_id',array('faculty_shortname'=>$username),'faculties');
							$this->session->set_userdata(array('acc_id'=>$faculty_id));
							redirect('faculty');
							break;
						case 'department':
							$department_id = $this->members->get('department_id',array('department_shortname'=>$username),'departments');
							$this->session->set_userdata(array('acc_id'=>$department_id));
							redirect('department');
							break;
						
						
					}
					
					
					
				}
				else{
					
					$data['error'] = 'Login Details Incorrect';
					$this->load->view('login.php',$data);
				}
			}
			
			//$this->load->view('index.php',$data);
			
			
		}
		
		
		
		
                
                
                
                
                
                
                
                
        }