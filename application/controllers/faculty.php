<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Faculty extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
			$this->load->helper(array('form', 'file'));
			$this->load->library(array('pagination', 'upload', 'form_validation'));
			#$this->load->helper('captcha');
			
			$this->load->model('members');
			$this->load->model('general');
			//$this->output->enable_profiler(TRUE);
			
		}
		
		
		 function index(){
			
			//echo "kkk";
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Home";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
							  
							  
				$data['display'] = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
						     <html xmlns=\"http://www.w3.org/1999/xhtml\">
						     <head>
						     <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						     <title>Untitled Document</title>
					             <link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						     </head>

						     <body>
						     <table width=\"95%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  
						    <tr>
							<td height=\"31\" bgcolor=\"#FFFFFF\"><br />
							<table width=\"70%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
							<tr>
								<td class=\"textonly5\"><div align=\"center\"><img src=\"".base_url()."assets/images/app.gif\" width=\"169\" height=\"13\" /></div></td>
							</tr>
							<tr>
								<td class=\"textonly5\" height=\"10\"></td>
							</tr>
							<tr>
							<td class=\"textonly5\">Welcome to ".ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties'))."<br />
							<br />
								Have a splendid  administartion time. </td>
							</tr>
							</table>
							<br /></td>
							</tr>
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
				
				
				
			}
			
			
			
			
		}
		
		
		function departments(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Departments";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
							  
							  
				$data['display'] = "<a href =\"".site_url('faculty/adddepartment')."\" >Add New Department</a>";
				
				$query = $this->members->get_all_where('*','departments',array('faculty_id'=>$acc_id));
				
				if(!$query){
					
					$data['display'] .= "<p>No Department(s) Available</p>";
				}
				
				
				else{
					
					$data['display'] .= "<table border = \"1\">
							<tr>
								<th width = \"196\">Department Name</th>
								<th width = \"136\">Shortname</th>
								<th width = \"136\">HOD</th>
							</tr>";
					
					foreach($query as $faculty){
						
						$department_name = ucfirst($faculty['department_name']);
						$department_shortname = strtoupper($faculty['department_shortname']);
						$department_head = ucfirst($faculty['HOD']);
						
						$data['display'] .= "<tr>
									<td  align = \"center\">$department_name</td>
									<td align = \"center\">$department_shortname</td>
									<td align = \"center\">$department_head</td>
									<td align = \"center\"><a href = \"".site_url('faculty/editdepartment/'.$faculty['department_id'])."\">Edit</td>
									
									<td align = \"center\"><a href = \"".site_url('faculty/deletedepartment/'.$faculty['department_id'])."\">Delete</td>
								    </tr>";
						
					}
					
					
					$data['display'] .= "</table>";
					
					
					
					
					
				}
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
				
				
				
			}	
			
		}
		
		
		
		function adddepartment(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Add Departments";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
							  
			
				
				$this->form_validation->set_rules('department_name','Department Name', 'required');
				$this->form_validation->set_rules('department_shortname', 'Short Name', 'required|callback_check_shortname');
				$this->form_validation->set_rules('department_head', 'HOD', 'required');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/adddepartment')."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
							<tr>
							   <td width=\"139\">Department Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'department_name','id'=>'course1','size'=>'18'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\">Department ShortName </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'department_shortname','id'=>'unit1','size'=>'5'))."</label></td>
							</tr>
							<tr>
							   <td width=\"139\">Head Of Department</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'department_head','id'=>'course1','size'=>'18'))."</label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				
				
				}
				else{
					
					$department_name = $this->input->post('department_name');
					$department_shortname = strtoupper($this->input->post('department_shortname'));
					$department_head = strtoupper($this->input->post('department_head'));
					$faculty_id = $acc_id;
					
					$param = array(
						'faculty_id'=>$acc_id,
						'department_name'=>$department_name,
						'department_shortname'=>$department_shortname,
						'HOD'=>$department_head,
						'date_created'=>date('Y-m-d')
						
					);
					
					$this->members->insert_entry('departments',$param);
					$this->members->insert_entry('login',array('username'=>$department_shortname,
										   'password'=>'123456',
										   'account_type'=>'department',
										   'date_ctreated'=>date('Y-m-d')));
					
					redirect('faculty/departments');	
					
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
				
				
			}		
			
		}
		
		
		function editdepartment(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Add Departments";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
				
				$id = $this->uri->segment(3);			  
				$department_name = $this->members->get('department_name',array('department_id'=>$id),'departments');
				$department_head = $this->members->get('HOD',array('department_id'=>$id),'departments');
								
				$this->form_validation->set_rules('department_name','Department Name', 'required');
				//$this->form_validation->set_rules('department_shortname', 'Short Name', 'required|max_lenght[3]|callback_check_shortname');
				$this->form_validation->set_rules('department_head', 'HOD', 'required');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/editdepartment/'.$id)."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
							<tr>
							   <td width=\"139\">Department Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'department_name','id'=>'course1','size'=>'18'),$department_name)."</p></label></td>
							</tr>
							
							<tr>
							   <td width=\"139\">Head Of Department</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'department_head','id'=>'course1','size'=>'18'),$department_head)."</label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				
				
				}
				else{
					
					$department_name = $this->input->post('department_name');
					//$department_shortname = strtoupper($this->input->post('department_shortname'));
					$department_head = strtoupper($this->input->post('department_head'));
					$faculty_id = $acc_id;
					
					$param = array(
						
						'department_name'=>$department_name,
						'HOD'=>$department_head						
					);
					
					$this->general->update_entry('departments',array('department_id'=>$this->uri->segment(3)),$param);
					
					redirect('faculty/departments');	
					
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
				
				
			}			
			
			
		}
		
		
		function deletedepartment(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				//$id = $this->uri->segment(3);
				$department_shortname = $this->members->get('department_shortname',array('department_id'=>$this->uri->segment(3)),'departments');
				$login_id = $this->members->get('login_id',array('username'=>$faculty_shortname),'login');
				
				$param = array('department_id'=>$this->uri->segment(3));
				
				$this->members->delete_entry('departments',$param);
				$this->members->delete_entry('login',array('username'=>$department_shortname));
				
				redirect('faculty/departments');
				
				
			
			
			
			
			
		}
			
			
			
		}
		
		function students(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Students";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
							  
							  
				$data['display'] = "<a href =\"".site_url('faculty/addstudent')."\" >Add New Student</a>";
				
				$query = $this->members->get_students_in_faculty($acc_id);
				
				if(!$query){
					
					$data['display'] .= "<p>No Student(s) Available</p>";
				}
				
				
				else{
					
					$data['display'] .= "<table border = \"1\">
							<tr>
								<th width = \"196\">Last Name</th>
								<th width = \"196\">First Name</th>
								<th width = \"196\">Middle Name</th>
								<th width = \"196\">Gender</th>
								<th width = \"136\">Admission Number</th>
								<th width = \"136\">Department</th>
								<th width = \"136\">Entry Year</th>
								<th width = \"136\">Department Name</th>
								<th width = \"136\">Program Of Study</th>
								<th width = \"136\">Phone</th>
								<th width = \"136\">Email</th>
								<th width = \"136\" colspan = \"2\">Action</th>
								
							</tr>";
					
					foreach($query as $student){
						
						$student_name = ucfirst($student['surname']);
						$first_name = ucfirst($student['first_name']);
						$middle_name = ucfirst($student['other_name']);
						$gender = strtoupper(substr($student['sex'],0,1));
						$admission_number = $student['admission_number'];
						$department_name = ucfirst($student['department_name']);
						$entry_year = $student['entry_year'];
						$department_name = ucfirst($student['department_name']);
						$program_name = $student['program_name'];
						$phone = $student['phone'];
						$email = $student['email'];
						
						$data['display'] .= "<tr>
									<td  align = \"center\">$student_name</td>
									<td  align = \"center\">$first_name</td>
									<td  align = \"center\">$middle_name</td>
									<td  align = \"center\">$gender</td>
									<td align = \"center\">$admission_number</td>
									<td align = \"center\">$department_name</td>
									<td align = \"center\">$entry_year</td>
									<td align = \"center\">$department_name</td>
									<td align = \"center\">$program_name</td>
									<td align = \"center\">$phone</td>
									<td align = \"center\">$email</td>
									<td align = \"center\"><a href = \"".site_url('faculty/editstudent/'.$student['student_id'])."\">Edit</td>
									
									<td align = \"center\"><a href = \"".site_url('faculty/deletestudent/'.$student['student_id'])."\">Delete</td>
								    </tr>";
						
					}
					
					
					$data['display'] .= "</table>";
					
					
					
					
					
				}
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
				
				
				
			}
			
			
			
			
			
			
		}
		
		
		function addstudent(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Students";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";

			$program_of_study = $this->members->get_programs_in_faculty($acc_id);
			
			$drop_down = '<select name ="program_study" >';
			foreach($program_of_study as $row){
				
				$drop_down .= '<option value = "'.$row['program_id'].'">'.$row['program_name'].'</option>';
				
				
			}
			
			$drop_down .= '</select>';
			
			$gender_type = array(
						     'male'=>'male',
						     'female'=>'female');
				
				$year = range(1900,2011);
				$year_array = array($year);
				$day = range(1,31);
				$day_array = array($day);
				
				$month = "<select name = \"month\">
						<option value = \"01\">January</option>
						<option value = \"02\">February</option>
						<option value = \"03\">March</option>
						<option value = \"04\">April</option>
						<option value = \"05\">May</option>
						<option value = \"06\">June</option>
						<option value = \"07\">July</option>
						<option value = \"08\">August</option>
						<option value = \"09\">September</option>
						<option value = \"10\">October</option>
						<option value = \"11\">November</option>
						<option value = \"12\">December</option>
					</select>";
				
				$result = '<select name = "day">';
				foreach($day as $key){
					$result .= '<option value = "'.$key.'">'.$key.'</option>';
					 }
					$result .= '</select>';
					
					$result .= '<select name = "year">';
					foreach($year as $key){
						$result .= '<option value = "'.$key.'">'.$key.'</option>';
						}
						$result .= '</select>';
					
			
			$this->form_validation->set_rules('surname','Last Name', 'required');
			$this->form_validation->set_rules('fname','First Name', 'required');
			$this->form_validation->set_rules('admission_number', 'Admission Number', 'required|callback_check_anumber');
			//$this->form_validation->set_rules('program_study', 'Program Of Study', 'required');
			$this->form_validation->set_rules('sess1', 'Year Of Entry', 'required|max_length[4]');
			$this->form_validation->set_rules('sess2', 'Year Of Entry', 'required|max_length[4]');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/addstudent')."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
						
							<tr>
							    <td width=\"139\">Admission Number </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'admission_number','id'=>'unit1','size'=>'15'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>LastName</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'surname','id'=>'unit1','size'=>'20'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>FirstName</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'fname','id'=>'unit1','size'=>'20'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>MiddleName</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'oname','id'=>'unit1','size'=>'20'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Gender</p> </td>
							   <td width=\"88\">Male<input type = \"radio\" name = \"gender\" value = \"male\"/>
									    Female<input type = \"radio\" name = \"gender\" value = \"female\"/></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Date Of Birth</p></td>
							   <td width=\"88\">$month.$result</td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Year Of Entry</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'5'))."</label>/
							   ".form_input(array('name'=>'sess2','id'=>'unit1','size'=>'5'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Phone</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'phone','id'=>'unit1','size'=>'20'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Email</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'email','id'=>'unit1','size'=>'20'))."</label></td>
							</tr>
							
							<tr>
							   <td width=\"139\">Program Of Study</td>
							   <td width=\"88\"><label>".$drop_down."</label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				
				
				}
				else{
					
					$student_name = $this->input->post('surname');
					$admission_number = $this->input->post('admission_number');
					//$entry_year = $this->input->post('sess1').'/'.$this->input->post('sess2');
					$program_id = $this->input->post('program_study');
					$department_id = $this->members->get('department_id',array('program_id'=>$program_id,
												   'faculty_id'=>$acc_id),'programs');
					$first_name = $this->input->post('fname');
					$other_name = $this->input->post('oname');
					$gender = $this->input->post('gender');
					$phone = $this->input->post('phone');
					$email = $this->input->post('email');
					
					
					$param = array(
						'program_id'=> $program_id,
						'department_id'=>$department_id,
						'faculty_id'=>$acc_id,
						'admission_number'=>$admission_number,
						'surname'=>$student_name,
						'first_name'=>$first_name,
						'other_name'=>$other_name,
						'sex'=>$gender,
						'date_of_birth'=>$this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day'),
						'entry_year'=>$this->input->post('sess1').'/'.$this->input->post('sess2'),
						'phone'=>$phone,
						'email'=>$email,
						'date_created'=>date('y-m-d : h:i:s',time()));
					
					$this->members->insert_entry('students',$param);
					$this->members->insert_entry('login',array('username'=>$admission_number,
										   'password'=>'123456',
										   'account_type'=>'student',
										   'date_ctreated'=>date('Y-m-d')));
					
					redirect('faculty/students');	
					
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
			
			
		}
		
		}
		
		
		function editstudent(){
			
		
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Edit Student";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
							  
				
				$id = $this->uri->segment(3);
				$student_name = $this->members->get('surname',array('student_id'=>$id),'students');
				$first_name = $this->members->get('first_name',array('student_id'=>$id),'students');
				$other_name = $this->members->get('other_name',array('student_id'=>$id),'students');
				$phone =$this->members->get('phone',array('student_id'=>$id),'students');
				$email = $this->members->get('email',array('student_id'=>$id),'students');
				
				$programs = $this->members->get_programs_in_faculty($acc_id);
				
				$drop_down = '<select name = "program_study">';
				
				foreach($programs as $row){
					
					$drop_down .= "<option value =\"".$row['program_id']."\" >".$row['program_name']."</option>";
					
				}
				
				$drop_down .= '</select>';
				
				
				
				
				$this->form_validation->set_rules('student_name', 'Student Name', 'required');
				$this->form_validation->set_rules('first_name', 'First Name', 'required');
				//$this->form_validation->set_rules('program_duration', 'Program Duration', 'required|max_length[2]|is_natural_no_zero');
				//$this->form_validation->set_rules('program_advisor', 'Program Advisor', 'required');
				
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/editstudent/'.$id)."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
			
							<tr>
							   <td width=\"139\">SurName </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'student_name','id'=>'course1','size'=>'18','value'=>$student_name))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">FirstName</td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'first_name','id'=>'course1','size'=>'18','value'=>$first_name))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">Middle Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'other_name','id'=>'course1','size'=>'18','value'=>$other_name))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">Phone </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'phone','id'=>'course1','size'=>'18','value'=>$phone))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">Email Address </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'email','id'=>'course1','size'=>'18','value'=>$email))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Program Of Study</p> </td>
							   <td width=\"88\"><label>".$drop_down."</label></td>
							</tr>
							
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				
				
				}
				else{
					
					$name = $this->input->post('student_name');
					$fname = $this->input->post('first_name');
					$oname = $this->input->post('other_name');
					$phones = $this->input->post('phone');
					$mail = $this->input->post('email');
					$program_study = $this->input->post('program_study');
					//$shortname = $this->input->post('program_duration');
					//$head = $this->input->post('program_advisor');
					
					$param = array(
						'surname'=>$name,
						'first_name'=>$fname,
						'other_name'=>$oname,
						'phone'=>$phones,
						'email'=>$mail,
						'program_id'=>$program_study,
						'department_id'=>$this->members->get('department_id',array('program_id'=>$program_study),'programs'),
						'faculty_id'=>$acc_id
						
					);
					//$ids = $this->members->get('faculty_id',array('faculty_head'=>$head),'faculties');
					//echo $ids;

					
					$this->general->update_entry('students', array('student_id' => $this->uri->segment(3)), $param);
					redirect('faculty/students');
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
				
				
				
			}
				
			
			
			
		}
		
		function deletestudent(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				//$student_id = $this->uri->segment(3);
				$admission_number = $this->members->get('admission_number',array('student_id'=>$this->uri->segment(3)),'students');
				$this->members->delete_entry('students',array('student_id'=>$this->uri->segment(3)));
				$this->members->delete_entry('login',array('username'=>$admission_number));
				
				redirect('faculty/students');
				
				
				
				
			}
			
			
			
		}
		
		function courses(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Courses";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";
							  
							  
				$data['display'] = "<a href =\"".site_url('faculty/addcourse')."\" >Add New Course</a>";
				
				$query = $this->members->get_courses($acc_id);
			
				
				
				if(!$query){
					
					$data['display'] .= "<p>No Course(s) Available</p>";
				}
				
					else{
					
					$data['display'] .= "<table border = \"1\">
							<tr>
								<th width = \"196\">Course Name</th>
								<th width = \"136\">Course code</th>
								<th width = \"136\">Unit</th>
								<th width = \"136\">Facilitator</th>
							</tr>";
					
					foreach($query as $courses){
						
						$course_title = ucfirst($courses['course_title']);
						$course_code = strtoupper($courses['course_code']);
						$course_unit = ucfirst($courses['unit']);
						$facilitator = ucfirst($courses['facilitator']);
						
						$data['display'] .= "<tr>
									<td  align = \"center\">$course_title</td>
									<td align = \"center\">$course_code</td>
									<td align = \"center\">$course_unit</td>
									<td align = \"center\">$facilitator</td>
									<td align = \"center\"><a href = \"".site_url('faculty/editcourse/'.$courses['course_id'])."\">Edit</td>
									
									<td align = \"center\"><a href = \"".site_url('faculty/deletecourse/'.$courses['course_id'])."\">Delete</td>
								    </tr>";
						
					}
					
					
					$data['display'] .= "</table>";
					}
					
					$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
					
							
			}
			
		}
		
		
		
		function addcourse(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Students";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";

			$departments = $this->members->get_all_where('*','departments',array('faculty_id'=>$acc_id));
			
			$drop_down = '<select name ="departments" >';
			foreach($departments as $row){
				
				$drop_down .= '<option value = "'.$row['department_id'].'">'.$row['department_name'].'</option>';
				
				
			}
			
			$drop_down .= '</select>';
			
			//$this->form_validation->set_rules('department_name','Department Name', 'required');
			$this->form_validation->set_rules('course_code', 'Course code', 'required|exact_length[6]|callback_check_code');
			//$this->form_validation->set_rules('program_study', 'Program Of Study', 'required');
			$this->form_validation->set_rules('course_title', 'Course Title', 'required');
			$this->form_validation->set_rules('unit', 'Unit', 'required|max_length[2]|is_numeric');
			$this->form_validation->set_rules('facilitator', 'Facilitator', 'required');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/addcourse')."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
							<tr>
							   <td width=\"139\">Department Name </td>
							   <td width=\"119\"><label><p>".$drop_down."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\">Course Code </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Course Title</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'course_title','id'=>'course1','size'=>'18'))."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Units</p> </td>
							    <td width=\"88\"><label>".form_input(array('name'=>'unit','id'=>'unit1','size'=>'3'))."</label></td>
							   
							</tr>
							
							<tr>
							   <td width=\"139\">Facilitator</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'facilitator','id'=>'course1'))."</label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				
				
				}
				
				else{
					
					$department_name = $this->input->post('departments');
					$course_code = $this->input->post('course_code');
					$course_title = $this->input->post('course_title');
					$unit = $this->input->post('unit');
					$facilitator = $this->input->post('facilitator');
					
					
					$param = array(
						'department_id'=>$department_name,
						'faculty_id'=>$acc_id,
						'course_code'=>$course_code,
						'course_title'=>$course_title,
						'unit'=>$unit,
						'facilitator'=>$facilitator,
						'date_added'=>date('y-m-d : h:i:s',time())
					);
					
					$this->members->insert_entry('courses',$param);
					//echo "here";
					
					redirect('faculty/courses');	
					
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
			
			
		}
					
			
		}
		
		
		function deletecourse(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$this->members->delete_entry('courses',array('course_id'=>$this->uri->segment(3)));
				redirect('faculty/courses');
				
				
			}
			
			
		}
		
		
		function editcourse(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '."Students";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						   <head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";

			
			$get_course_code = $this->members->get('course_code',array('course_id'=>$this->uri->segment(3)),'courses');
			$get_course_title = $this->members->get('course_title',array('course_id'=>$this->uri->segment(3)),'courses');
			$get_course_unit = $this->members->get('unit',array('course_id'=>$this->uri->segment(3)),'courses');
			$get_course_facilitator = $this->members->get('facilitator',array('course_id'=>$this->uri->segment(3)),'courses');
			//$this->form_validation->set_rules('department_name','Department Name', 'required');
			//$this->form_validation->set_rules('course_code', 'Course code', 'required|exact_length[6]|callback_check_code');
			//$this->form_validation->set_rules('program_study', 'Program Of Study', 'required');
			$this->form_validation->set_rules('course_title', 'Course Title', 'required');
			$this->form_validation->set_rules('unit', 'Unit', 'required|max_length[2]|is_numeric');
			$this->form_validation->set_rules('facilitator', 'Facilitator', 'required');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/editcourse/'.$this->uri->segment(3))."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
							
							<tr>
							    <td width=\"139\"><p>Course Title</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'course_title','id'=>'course1','size'=>'18'),$get_course_title)."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Units</p> </td>
							    <td width=\"88\"><label>".form_input(array('name'=>'unit','id'=>'unit1','size'=>'3'),$get_course_unit)."</label></td>
							   
							</tr>
							
							<tr>
							   <td width=\"139\">Facilitator</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'facilitator','id'=>'course1'),$get_course_facilitator)."</label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				
				
				}
				
				else{
					
					//$department_name = $this->input->post('departments');
					//$course_code = $this->input->post('course_code');
					$course_title = $this->input->post('course_title');
					$unit = $this->input->post('unit');
					$facilitator = $this->input->post('facilitator');
					
					
					$param = array(
						'course_title'=>$course_title,
						'unit'=>$unit,
						'facilitator'=>$facilitator	
					);
					
					$this->general->update_entry('courses', array('course_id' => $this->uri->segment(3)), $param);
					//echo "here";
					
					redirect('faculty/courses');	
					
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
			
			
		}
					
			
		}
		
		
		
		
		function change_password(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
                    
                        $data['title'] =   ucfirst($this->members->get('faculty_name',array('faculty_id'=>$acc_id),'faculties')).' : '.": Change Password";
				
				//$style = 'style.css';
				
				$data['menu'] = "<html xmlns=\"http://www.w3.org/1999/xhtml\">
						<head>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
						<title>Untitled Document</title>
						<link href=\"".base_url()."assets/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
						<style type=\"text/css\">
						<!--
						a:link {
						color: #353535;
						}
						a:hover {
						color: #FF6600;
						}
						a:active {
						color: #993333;
						}
						-->
						</style></head>
	
						<body topmargin=\"0\" leftmargin=\"0\">
						<table width=\"194\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
						<tr>
							<td width=\"194\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td width=\"14%\" bgcolor=\"#EEBB65\"><div align=\"center\"><img src=\"".base_url()."assets/images/newdot(1).jpg\" width=\"12\" height=\"9\" /></div></td>
							<td width=\"86%\" height=\"30\" bgcolor=\"#EEBB65\"><span class=\"menu\">Main Menu</span> </td>
						</tr> 
						<tr>
							  <td colspan=\"2\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"border\">";

				
				$this->form_validation->set_rules('o_password','Old Password','required|callback_check_pass');
				$this->form_validation->set_rules('n_password','New Password','required|xss_clean|trim');
				$this->form_validation->set_rules('c_password','Confirm Password','required|xss_clean|trim|matches[n_password]');
				
				
				if($this->form_validation->run() == FALSE){
					
				$error = validation_errors();	
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/change_password')."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\"> ".$error." &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
							<tr>
							   <td width=\"139\">Old Password</td>
							   <td width=\"119\"><label><p><b>".form_password(array('name'=>'o_password','id'=>'course1','size'=>'15'))."</b></p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>New Password</p> </td>
							   <td width=\"88\"><label><p><b>".form_password(array('name'=>'n_password','id'=>'course1','size'=>'15'))."</b></p></label></td>
							   
							</tr>
                                                        <tr>
							    <td width=\"139\"><p>Comfirm Password</p> </td>
							   <td width=\"88\"><label><p><b>".form_password(array('name'=>'c_password','id'=>'course1','size'=>'15'))."</b></p></label></td>
							   
							</tr>
							
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form>";
				}
				
				
				
				else{
					//$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
					//$course_code = $this->input->post('course_code');
					
					$param = array(
						       'password'=>$this->input->post('n_password'),
						       
						       'date_ctreated'=>date('y-m-d')
						       );
					
					$this->general->update_entry('login',array('login_id'=>$id),$param);
					//redirect('department/scores');
                                        $error = 'Password Updated!!';
					
					$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('faculty/change_password')."\">
								<table width=\"366\" border=\"0\">
								<tr>
								   <td width=\"360\"><table width=\"360\" border=\"0\">
								<tr>
								    <td colspan=\"3\"> ".$error." &nbsp;</td>
								</tr>
								<tr>
								    <td>&nbsp;</td>
								    <td></td>
								    <td> </td>
								</tr>
								
								<tr>
								   <td width=\"139\">Old Password</td>
								   <td width=\"119\"><label><p><b>".form_password(array('name'=>'o_password','id'=>'course1','size'=>'15'))."</b></p></label></td>
								</tr>
								<tr>
								    <td width=\"139\"><p>New Password</p> </td>
								   <td width=\"88\"><label><p><b>".form_password(array('name'=>'n_password','id'=>'course1','size'=>'15'))."</b></p></label></td>
								   
								</tr>
								<tr>
								    <td width=\"139\"><p>Comfirm Password</p> </td>
								   <td width=\"88\"><label><p><b>".form_password(array('name'=>'c_password','id'=>'course1','size'=>'15'))."</b></p></label></td>
								   
								</tr>
								
								
								<tr>
									<td>&nbsp;</td>
									<td colspan=\"2\">&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td colspan=\"2\"><label>".form_submit('submit','submit')."</label></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td colspan=\"2\">&nbsp;</td>
								</tr>
								</table></td>
								</tr>
								</table>
								</form>";
					
				}
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/faculty/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
						</tr>
						";
                                                
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						     </tr>
							</table></td>
							</tr>
							</table></td>
						      </tr>
  
  
							<tr>
							<td>&nbsp;</td>
							</tr>
							</table>
							</body>
							</html>";
					
				$this->load->view('home.php',$data);
						
		}
		}
		
		
		function check_pass($password){
            
			$id = $this->session->userdata('login_id');
            
			if(!$this->members->is_exist('login',array('login_id'=>$id,'password'=>$password))){
                
				$this->form_validation->set_message('check_pass','Old Password is Incorrect!');
                
				return false;
			}
			return true;
            
        }
		
		
		
		
		
		
		function check_shortname($department_shortname){
			
			if($this->members->is_exist('departments',array('department_shortname'=>$department_shortname))){
			
			$this->form_validation->set_message('check_shortname', $department_shortname.' '.'Already exist in database');
			return false;
			}
			
			return true;
			
		}
		
		function check_code($course_code){
			
			if($this->members->is_exist('courses',array('course_code'=>$course_code))){
				
				$this->form_validation->set_message('check_code',$course_code.' '.'Has already been added');
				return false;
			}
			return true;
			
			
			
		}
		
		function check_anumber($admission_number){
			
			if($this->members->is_exist('students',array('admission_number'=>$admission_number))){
				
				$this->form_validation->set_message('check_anumber', $admission_number.' '.'Has been taken by another student');
				return false;
			}
			
			return true;
			
		}
		
		
		function logout(){
			
			$this->session->sess_destroy();
			
			redirect('signup');
		}
		
		
		
		
	}