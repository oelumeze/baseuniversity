<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Department extends CI_Controller
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
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Home";
				
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
							<td class=\"textonly5\">Welcome to ".ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments'))."<br />
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
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function students(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				//echo $acc_id;
			
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Home";
				
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
							  
							  
				
				$data['display'] = "<p><a href = \"".site_url('department/addstudent')."\">Add New Student(s)</a></p>";
				
				$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
				$query = $this->members->get_department_students($acc_id,$faculty_id);
				
				if(!$query){
					
					$data['display'] .= 'No Student(s) Available';
				}
				
				else{
					
					$data['display'] .= "<table border = \"1\">
							<tr>
								<th width = \"196\">SurName</th>
								<th width = \"196\">First Name</th>
								<th width = \"196\">Middle Name</th>
								<th width = \"196\">Gender</th>
								<th width = \"196\">Date Of Birth</th>
								<th width = \"136\">Entry Year</th>
								<th width = \"136\">Admission Number</th>
								<th width = \"136\">Program Of Study</th>
								<th width = \"136\">Phone Number</th>
								<th width = \"136\">Email</th>
								<th width = \"136\" colspan = \"2\">Action</th>
							</tr>";
					
					foreach($query as $students){
						
						//$course_title = ucfirst($students['course_title']);
						$course_code = strtoupper($students['surname']);
						$first_name = ucfirst($students['first_name']);
						$other_name = ucfirst($students['other_name']);
						$gender = strtoupper(substr($students['sex'],0,1));
						$date_of_birth = $students['date_of_birth'];
						$course_unit = ucfirst($students['entry_year']);
						$facilitator = ucfirst($students['admission_number']);
						$program_name = ucfirst($students['program_name']);
						$phone_number = ucfirst($students['phone']);
						$email_address = ucfirst($students['email']);
						
						$data['display'] .= "<tr>
									
									<td align = \"center\">$course_code</td>
									<td align = \"center\">$first_name</td>
									<td align = \"center\">$other_name</td>
									<td align = \"center\">$gender</td>
									<td align = \"center\">$date_of_birth</td>
									<td align = \"center\">$course_unit</td>
									<td align = \"center\">$facilitator</td>
									<td align = \"center\">$program_name</td>
									<td align = \"center\">$phone_number</td>
									<td align = \"center\">$email_address</td>
									<td align = \"center\"><a href = \"".site_url('department/editstudent/'.$students['student_id'])."\">Edit</td>
									
									<td align = \"center\"><a href = \"".site_url('department/deletestudent/'.$students['student_id'])."\">Delete</td>
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
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Add Student";
				
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
							  	
				
				$programs = $this->members->get_all_where('*','programs',array('department_id'=>$acc_id));
				
				$dropdown = '<select name = "program">';
				foreach($programs as $row){
					
					$dropdown .= '<option value ="'.$row['program_id'].'">'.$row['program_name'].'</option>';
					
				}
				$dropdown .= '</select>';
				
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
					
				
				$this->form_validation->set_rules('admission_number', 'Admission Number', 'required|xss_clean|trim|callback_check_number');
				$this->form_validation->set_rules('surname', 'Student Last Name', 'required|xss_clean|trim');
				$this->form_validation->set_rules('fname', 'Student Last Name', 'required|xss_clean|trim');
				$this->form_validation->set_rules('sess1', 'Entry Year','required|max_length[4]|xss_clean');
				$this->form_validation->set_rules('sess2', 'Entry Year','required|max_length[4]|xss_clean');
				
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('department/addstudent')."\">
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
							   <td width=\"139\">Program </td>
							   <td width=\"119\"><label><p>".$dropdown."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\">Admission Number </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'admission_number','id'=>'course1','size'=>'11'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>SurName</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'surname','id'=>'course1','size'=>'18'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>First Name</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'fname','id'=>'course1','size'=>'18'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Middle Name</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'oname','id'=>'course1','size'=>'18'))."</label></td>
							<tr>
							    <td width=\"139\"><p>Gender</p> </td>
							   <td width=\"88\">Male<input type = \"radio\" name = \"gender\" value = \"male\"/>
									    Female<input type = \"radio\" name = \"gender\" value = \"female\"/></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Date Of Birth</p></td>
							   <td width=\"88\">$month.$result</td>
							</tr>   
							</tr>
							<tr>
							    <td width=\"139\"><p>Entry Year</p> </td>
							    <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'5')).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'5'))."</label></td>
							   
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
					
					$program_id = $this->input->post('program');
					$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
					$admission_number = $this->input->post('admission_number');
					$sname = $this->input->post('surname');
					$fname = $this->input->post('fname');
					$oname = $this->input->post('oname');
					
					$gender = $this->input->post('gender');
					$phone = $this->input->post('phone');
					$email = $this->input->post('email');
					
					
					$param = array(
						       'program_id'=>$program_id,
						       'department_id'=>$acc_id,
						       'faculty_id'=>$faculty_id,
						       'admission_number'=>$admission_number,
						       'surname'=>$sname,
						       'first_name'=>$fname,
						       'other_name'=>$oname,
						       'sex'=>$gender,
						       'date_of_birth'=>$this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day'),
						       'entry_year'=>$this->input->post('sess1').'/'.$this->input->post('sess2'),
						       'phone'=>$phone,
						       'email'=>$email,
						       'date_created'=>date('Y-m-d'));
					
					$this->members->insert_entry('students',$param);
					$this->members->insert_entry('login',array('username'=>$admission_number,'password'=>'123456','account_type'=>'student'));
					redirect('department/students');
					
					
				}
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
				
				redirect('department/students');
				
				
				
				
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Edit Student";
				
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
				
				$programs = $this->members->get_all_where('*','programs',array('department_id'=>$acc_id));
				
				$student_id = $this->uri->segment(3);
				$dropdown = '<select name = "program">';
				foreach($programs as $row){
					
					$dropdown .= '<option value ="'.$row['program_id'].'">'.$row['program_name'].'</option>';
					
				}
				$dropdown .= '</select>';
				
				$name = $this->members->get('surname',array('department_id'=>$acc_id),'students');
				$first_name = $this->members->get('first_name',array('department_id'=>$acc_id),'students');
				$other_name = $this->members->get('other_name',array('department_id'=>$acc_id),'students');
				$phone = $this->members->get('phone',array('department_id'=>$acc_id),'students');
				$email = $this->members->get('email',array('department_id'=>$acc_id),'students');
				
				$this->form_validation->set_rules('sname', 'Student Name', 'required|xss_clean|trim');
				$this->form_validation->set_rules('fname', 'First Name', 'required|xss_clean|trim');
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/editstudent/'.$student_id)."\">
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
							   <td width=\"139\">Program </td>
							   <td width=\"119\"><label><p>".$dropdown."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>SurName</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sname','id'=>'course1','size'=>'18'),$name)."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>First Name</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'fname','id'=>'course1','size'=>'18'),$first_name)."</label></td>  
							</tr>
							<tr>
							    <td width=\"139\"><p>Middle Name</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'oname','id'=>'course1','size'=>'18'),$other_name)."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Phone</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'phone','id'=>'course1','size'=>'18'),$phone)."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Email</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'email','id'=>'course1','size'=>'18'),$email)."</label></td>
							   
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
					$student_name = $this->input->post('sname');
					$program = $this->input->post('program');
					$sname = $this->input->post('sname');
					$fname = $this->input->post('fname');
					$oname = $this->input->post('oname');
					$fone = $this->input->post('phone');
					$mail = $this->input->post('email');
					
					$param = array('surname'=>$student_name,
						       'first_name'=>$fname,
						       'other_name'=>$oname,
						       'phone'=>$fone,
						       'email'=>$mail,
						       'program_id'=>$this->input->post('program'));
					
					$this->general->update_entry('students',array('student_id'=>$student_id),$param);
					redirect('department/students');
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Courses";
				
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
			
			
				$data['display'] = "<a href = \"".site_url('department/addcourse')."\">Add New Course(s)</a>";
				$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
				
				$query = $this->members->get_departmental_courses($acc_id,$faculty_id);
				
				if(!$query){
					
					$data['display'] .= '<p>No Course(s) Available</p>';
					
				}
				
				else{
					$data['display'] .= '<table border = \"1\">
								<tr>
									<th width = \"136\">Course Code</th>
									<th width = \"189\">Course Title</th>
									<th width = \"126\">Unit</th>
									<th width = \"189\">Facilitator</th>
									<th width = \"189\" colspan = \"2\">Action</th>
								</tr>';
					foreach($query as $courses){
						
						$data['display'] .= '<tr>
										<td align = \"center\">'.$courses['course_code'].'</td>
										<td align = \"center\">'.$courses['course_title'].'</td>
										<td align = \"center\">'.$courses['unit'].'</td>
										<td align = \"center\">'.$courses['facilitator'].'</td>
										<td align = \"center\"><a href ='.site_url('department/editcourse/'.$courses['course_id']).'>Edit</a></td>
										
										<td align = \"center\"><a href ='.site_url('department/deletecourse/'.$courses['course_id']).'>Delete</a></td>';
					}
					
					$data['display'] .= '</table>';
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Add Courses";
				
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

				
				$this->form_validation->set_rules('course_code','Course Code','required|callback_check_course');
				$this->form_validation->set_rules('course_title','Course Title','required');
				$this->form_validation->set_rules('unit','Unit','required|max_length[2]|is_numeric');
				$this->form_validation->set_rules('facilitator','Facilitator','required|xss_clean|trim');
				
				
				if($this->form_validation->run() == FALSE){
					
				$error = validation_errors();	
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/addcourse')."\">
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
							   <td width=\"139\">Course Code</td>
							   <td width=\"119\"><label><p>".form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Course Title</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'course_title','id'=>'course1','size'=>'18'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Unit</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'unit','id'=>'unit1','size'=>'5'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Facilitator</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'facilitator','id'=>'course1','size'=>'18'))."</label></td>
							   
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
					$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
					$course_code = $this->input->post('course_code');
					$course_title = $this->input->post('course_title');
					$unit = $this->input->post('unit');
					$facilitator = $this->input->post('facilitator');
					
					$param = array(
						       'department_id'=>$acc_id,
						       'faculty_id'=>$faculty_id,
						       'course_code'=>strtoupper($course_code),
						       'course_title'=>$course_title,
						       'unit'=>$unit,
						       'facilitator'=>$facilitator);
					
					$this->members->insert_entry('courses',$param);
					redirect('department/courses');
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
				
				//$student_id = $this->uri->segment(3);
				//$admission_number = $this->members->get('admission_number',array('student_id'=>$this->uri->segment(3)),'students');
				$this->members->delete_entry('courses',array('course_id'=>$this->uri->segment(3)));
				//$this->members->delete_entry('login',array('username'=>$admission_number));
				
				redirect('department/courses');
				
				
				
				
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Add Courses";
				
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

				
				$this->form_validation->set_rules('course_code','Course Code','required|max_length[6]');
				$this->form_validation->set_rules('course_title','Course Title','required');
				$this->form_validation->set_rules('unit','Unit','required|max_length[2]|is_numeric');
				$this->form_validation->set_rules('facilitator','Facilitator','required|xss_clean|trim');
				
				//$dept_course_code = $this->members->get
				
				if($this->form_validation->run() == FALSE){
					
				$error = validation_errors();	
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/editcourse/'.$this->uri->segment(3))."\">
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
							   <td width=\"139\">Course Code</td>
							   <td width=\"119\"><label><p>".form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'),$this->members->get('course_code',array('course_id'=>$this->uri->segment(3)),'courses'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Course Title</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'course_title','id'=>'course1','size'=>'18'),$this->members->get('course_title',array('course_id'=>$this->uri->segment(3)),'courses'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Unit</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'unit','id'=>'unit1','size'=>'5'),$this->members->get('unit',array('course_id'=>$this->uri->segment(3)),'courses'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Facilitator</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'facilitator','id'=>'course1','size'=>'18'),$this->members->get('facilitator',array('course_id'=>$this->uri->segment(3)),'courses'))."</label></td>
							   
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
					$course_code = $this->input->post('course_code');
					$course_title = $this->input->post('course_title');
					$unit = $this->input->post('unit');
					$facilitator = $this->input->post('facilitator');
					
					$param = array(
						       //'department_id'=>$acc_id,
						       //'faculty_id'=>$faculty_id,
						       'course_code'=>strtoupper($course_code),
						       'course_title'=>$course_title,
						       'unit'=>$unit,
						       'facilitator'=>$facilitator);
					
					$this->general->update_entry('courses',array('course_id'=>$this->uri->segment(3)),$param);
					redirect('department/courses');
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function scores(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				//echo $acc_id;
			
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Scores";
				
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
							  
							  
				
				$data['display'] = "<p><a href = \"".site_url('department/addscore')."\">Add New Score(s)</a></p>";
				
				$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
				$query = $this->members->get_departmental_scores($acc_id,$faculty_id);
				
				if(!$query){
					
					$data['display'] .= 'No Student Score(s) Available';
				}
				
				else{
					
					$data['display'] .= "<table border = \"1\">
							<tr>
								<th width = \"196\">Course Code</th>
								<th width = \"136\">Admission Number</th>
								<th width = \"136\">Semester</th>
								<th width = \"136\">Session</th>
								<th width = \"136\">Score</th>
								<th width = \"136\" colspan = \"2\">Action</th>
							</tr>";
					
					foreach($query as $score){
						
						//$course_title = ucfirst($students['course_title']);
						$course_code = strtoupper($score['course_code']);
						$admission_number = ucfirst($score['admission_number']);
						$semester = ucfirst($score['semester']);
						$session = ucfirst($score['session']);
						$scores = ucfirst($score['score']);
						
						$data['display'] .= "<tr>
									
									<td align = \"center\">$course_code</td>
									<td align = \"center\">$admission_number</td>
									<td align = \"center\">$semester</td>
									<td align = \"center\">$session</td>
									<td align = \"center\">$scores</td>
									<td align = \"center\"><a href = \"".site_url('department/editscore/'.$score['score_id'])."\">Edit</td>
									
									<td align = \"center\"><a href = \"".site_url('department/deletescore/'.$score['score_id'])."\">Delete</td>
									
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
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function addscore(){
			
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Add Score";
				
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

				
				$this->form_validation->set_rules('course_code','Course Code','required|callback_check_course_exist');
				$this->form_validation->set_rules('admission_number','Admission Number','required|callback_check_student_number');
				$this->form_validation->set_rules('sess1','Session','required|max_length[4]');
				$this->form_validation->set_rules('sess2','Session','required|max_length[4]');
				//$this->form_validation->set_rules('score','Score','required|xss_clean|trim');
				
				$semester_array = array('1'=>'1',
							'2'=>'2');
				
				$level_array = array('1'=>'1',
							'2'=>'2',
							'3'=>'3',
							'4'=>'4',
							'5'=>'5',
							'6'=>'6',
							'7'=>'7');
				
				if($this->form_validation->run() == FALSE){
					
				$error = validation_errors();	
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/addscore')."\">
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
							   <td width=\"139\">Course Code</td>
							   <td width=\"119\"><label><p>".form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Admission Number</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'admission_number','id'=>'course1','size'=>'18'))."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Semester</p> </td>
							   <td width=\"88\"><label>".form_dropdown('semester',$semester_array)."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Session</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'8')).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'8'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Current Level</p> </td>
							   <td width=\"88\"><label>".form_dropdown('level',$level_array)."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Continuous Asessment</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'ca_test','id'=>'course1','size'=>'5'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Examination Score</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'exam','id'=>'course1','size'=>'5'))."</label></td>
							   
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
					$course_id = $this->members->get('course_id',array('course_code'=>$this->input->post('course_code')),'courses');
					$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
					$student_id = $this->members->get('student_id',array('admission_number'=>$this->input->post('admission_number')),'students');
					$semester = $this->input->post('semester');
					$session = $this->input->post('sess1').'/'.$this->input->post('sess2');
					//$ca_test = $this->input->post('ca_test');
					//$exam = $this->input->post('exam');
					//$score = $this->input->post('score');
					$level = $this->input->post('level');
					$score = $this->input->post('ca_test') + $this->input->post('exam');
					
					$param = array(
						       'course_id'=>$course_id,
						       'department_id'=>$acc_id,
						       'faculty_id'=>$faculty_id,
						       'student_id'=>$student_id,
						       'stud_dept_id'=>$this->members->get('department_id',array('student_id'=>$student_id),'students'),
						       'semester'=>$semester,
						       'session'=>$session,
						       'level'=>$level,
						       'continuous_asessment'=>$this->input->post('ca_test'),
						       'exam_score'=>$this->input->post('exam'),
						       'score'=>$score,
							   'grade'=>$this->members->getGrade($score),
						       'date_added'=>date('y-m-d : h:i:s',time()));
					
					$score = $param['score'];
					//$dept = $param['department_id'];
					if ($score > 100){
						$error = 'Total exam score cannot exceed 100';
						$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/addscore')."\">
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
							   <td width=\"139\">Course Code</td>
							   <td width=\"119\"><label><p>".form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Admission Number</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'admission_number','id'=>'course1','size'=>'18'))."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Semester</p> </td>
							   <td width=\"88\"><label>".form_dropdown('semester',$semester_array)."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Session</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'8')).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'8'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Current Level</p> </td>
							   <td width=\"88\"><label>".form_dropdown('level',$level_array)."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Continuous Asessment</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'ca_test','id'=>'course1','size'=>'5'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Examination Score</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'exam','id'=>'course1','size'=>'5'))."</label></td>
							   
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
					//if($courses(in_array()))
					else{
					
					$this->members->insert_entry('scores',$param);
					redirect('department/scores');
					
				}
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		function deletescore(){
			
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
				//$admission_number = $this->members->get('admission_number',array('student_id'=>$this->uri->segment(3)),'students');
				$this->members->delete_entry('scores',array('score_id'=>$this->uri->segment(3)));
				//$this->members->delete_entry('login',array('username'=>$admission_number));
				
				redirect('department/scores');
				
				
				
				
			}
			
			
		}
		
		function editscore(){
			
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Edit Score";
				
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

				
				$this->form_validation->set_rules('score','Score','required');
				$this->form_validation->set_rules('sess1','Session','required|max_length[2]|is_numeric');
				$this->form_validation->set_rules('sess2','Session','required|max_length[2]|is_numeric');
				//$this->form_validation->set_rules('facilitator','Facilitator','required|xss_clean|trim');
				
				$course_code = $this->members->get('course_id',array('score_id'=>$this->uri->segment(3)),'scores');
				$admission_number = $this->members->get('student_id',array('score_id'=>$this->uri->segment(3)),'scores');
				$score = $this->members->get('score',array('score_id'=>$this->uri->segment(3)),'scores');
				$semester_array = array('1'=>'1',
							'2'=>'2');
				$sess1 = substr($this->members->get('session',array('score_id'=>$this->uri->segment(3)),'scores'),0,4);
				$sess2 = substr($this->members->get('session',array('score_id'=>$this->uri->segment(3)),'scores'),5,9);
				
				//$dept_course_code = $this->members->get
				
				if($this->form_validation->run() == FALSE){
					
				$error = validation_errors();	
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/editscore/'.$this->uri->segment(3))."\">
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
							   <td width=\"139\">Course Code</td>
							   <td width=\"119\"><label><p><b>".$this->members->get('course_code',array('course_id'=>$course_code),'courses')."</b></p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Admission Number</p> </td>
							   <td width=\"88\"><label><p><b>".$this->members->get('admission_number',array('student_id'=>$admission_number),'students')."</b></p></label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Semester</p> </td>
							   <td width=\"88\"><label>".form_dropdown('semester',$semester_array)."</label></td>
							   
							</tr>
							<tr>
							   <td width=\"139\"><p>Session</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'3'),$sess1).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'3'),$sess2)."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Score</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'score','id'=>'course1','size'=>'3'),$score)."</label></td>
							   
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
						       'semester'=>$this->input->post('semester'),
						       'session'=>$this->input->post('sess1').'/'.$this->input->post('sess2'),
						       'score'=>$this->input->post('score'),
						       'date_added'=>date('y-m-d : h:i:s',time())
						       );
					
					$this->general->update_entry('scores',array('score_id'=>$this->uri->segment(3)),$param);
					redirect('department/scores');
					
				}
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		
		function results(){
			
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
				
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Add Score";
				
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

				
				//$this->form_validation->set_rules('course_code','Course Code','required|callback_check_course_exist');
				$this->form_validation->set_rules('admission_number','Admission Number','required|callback_check_student_number');
				$this->form_validation->set_rules('sess1','Session','required|max_length[4]');
				$this->form_validation->set_rules('sess2','Session','required|max_length[4]');
				//$this->form_validation->set_rules('score','Score','required|xss_clean|trim');
				
				$semester_array = array('1'=>'1',
							'2'=>'2');
				
				$level_array = array('1'=>'1',
							'2'=>'2',
							'3'=>'3',
							'4'=>'4',
							'5'=>'5',
							'6'=>'6',
							'7'=>'7');
				
				if($this->form_validation->run() == FALSE){
					
				$error = validation_errors();	
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/results')."\">
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
							    <td width=\"139\"><p>Admission Number</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'admission_number','id'=>'course1','size'=>'14'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Semester</p> </td>
							   <td width=\"88\"><label>".form_dropdown('semester',$semester_array)."</label></td>
							   
							</tr>
							
							<tr>
							    <td width=\"139\"><p>Session</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'8')).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'8'))."</label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Current Level</p> </td>
							   <td width=\"88\"><label>".form_dropdown('level',$level_array)."</label></td>
							   
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
					
					$student_id = $this->members->get('student_id',array('admission_number'=>$this->input->post('admission_number')),'students');
					$semester = $this->input->post('semester');
					$session = $this->input->post('sess1').'/'.$this->input->post('sess2');
					$level = $this->input->post('level');
					
					$this->session->set_userdata(array('student_id'=>$student_id,'semester'=>$semester,'session'=>$session,'level'=>$level));
					redirect('department/print_result');
					
					//$data['display'] = $this->members->get_departmental_student_scores($student_id,$acc_id,$semester,$session,$level);
					//$this->load->view('home.php',$data);
				}
				
				
				
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function print_result(){
			
			$student_id = $this->session->userdata('student_id');
			$acc_id = $this->session->userdata('acc_id');
			$semester = $this->session->userdata('semester');
			$session = $this->session->userdata('session');
			$level = $this->session->userdata('level');
			$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
			
			
			$data['image'] = base_url()."/assets/images/header.jpg";
			$data['faculty'] = $this->members->get('faculty_name',array('faculty_id'=>$faculty_id),'faculties');
			$data['name'] = $this->members->get('surname',array('student_id'=>$student_id),'students').' '.$this->members->get('first_name',array('student_id'=>$student_id),'students').' '.$this->members->get('other_name',array('student_id'=>$student_id),'students');
			$data['department'] = $this->members->get('department_name',array('department_id'=>$acc_id),'departments');
			$data['matric'] = $this->members->get('admission_number',array('student_id'=>$student_id),'students');
			$data['level'] = $level;
			$data['semester'] = $semester;
			$data['session'] = $session;
			$data['query'] = $this->members->get_departmental_student_scores($student_id,$acc_id,$semester,$session,$level);
			$data['title'] = 'Semester/Session Result :'.$data['name'];
			$data['session'] = $session;
			
			
			//$this->load->helper('pdfcreator');
			
		
		
			
			$this->load->view('search.php',$data);
		}
		
		
		
		
		
		function department_result(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
				//echo $acc_id;
			
				$data['title'] = ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).' : '."Scores";
				
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
							  
							  
				
				$data['display'] = "<p><a href = \"".site_url('department/addscore')."\">Add New Result(s)</a></p>";
				
				$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
				$query = $this->members->get_departmental_student_scores($acc_id,'1','03/04','1');
				
				if(!$query){
					
					$data['display'] .= 'No Student Score(s) Available';
				}
				
				else{
					
					$data['display'] .= "<table border = \"1\">
							<tr>
								<th width = \"196\">Course Code</th>
								<th width = \"136\">Admission Number</th>
								<th width = \"136\">Semester</th>
								<th width = \"136\">Session</th>
								<th width = \"136\">Score</th>
								<th width = \"136\" colspan = \"2\">Action</th>
							</tr>";
					
					foreach($query as $score){
						
						//$course_title = ucfirst($students['course_title']);
						$course_code = strtoupper($score['course_code']);
						$admission_number = ucfirst($score['admission_number']);
						$semester = ucfirst($score['semester']);
						$session = ucfirst($score['session']);
						$scores = ucfirst($score['score']);
						
						$data['display'] .= "<tr>
									
									<td align = \"center\">$course_code</td>
									<td align = \"center\">$admission_number</td>
									<td align = \"center\">$semester</td>
									<td align = \"center\">$session</td>
									<td align = \"center\">$scores</td>
									<td align = \"center\"><a href = \"".site_url('department/editscore/'.$score['score_id'])."\">Edit</td>
									
									<td align = \"center\"><a href = \"".site_url('department/deletescore/'.$score['score_id'])."\">Delete</td>
									
								    </tr>";
						
					}
					
					
					$data['display'] .= "</table>";
					//$data['display'] .= "<input type = \"submit\" name = \"submit\" value = \"Print Result\">";
					
					}
					
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
			
			
		function pdf(){
			
			$student_id = $this->session->userdata('student_id');
			$acc_id = $this->session->userdata['acc_id'];
			$semester = $this->session->userdata['semester'];
			$session = $this->session->userdata['session'];
			$level = $this->session->userdata['level'];
			$faculty_id = $this->members->get('faculty_id',array('department_id'=>$acc_id),'departments');
			
			$data['faculty'] = $this->members->get('faculty_name',array('faculty_id'=>$faculty_id),'faculties');
			$data['name'] = $this->members->get('surname',array('student_id'=>$student_id),'students').' '.$this->members->get('first_name',array('student_id'=>$student_id),'students');
			$data['department'] = $this->members->get('department_name',array('department_id'=>$acc_id),'departments');
			$data['matric'] = $this->members->get('admission_number',array('student_id'=>$student_id),'students');
			$data['level'] = $level;
			$data['semester'] = $semester;
			$data['session'] = $session;
			$data['query'] = $this->members->get_departmental_student_scores($student_id,$acc_id,$semester,$session,$level);
			$data['title'] = 'Semester/Session Result :'.$data['name'];
			$data['session'] = $session;
			
			
			$this->load->helper('pdfcreator');
			
			$query = $this->load->view('search.php',$data);
			//echo $query;
			create_pdf_html2pdf($query, "", 'P', 'A4', 'studentexport.pdf');
			
			
			
		}
			
			
			
		
		
		
		
		function check_course_exist($course_code){
			
			if(!$this->members->is_exist('courses',array('course_code'=>$course_code))){
				
				$this->form_validation->set_message('check_course_exist', $course_code.'  '.'Is An invalid Course Code');
				return false;
			}
			return true;
			
		}
		
		function check_student_number($admission_number){
			
			if(!$this->members->is_exist('students',array('admission_number'=>$admission_number))){
				
				$this->form_validation->set_message('check_student_number', $admission_number.'  '.'Is An invalid Student Number');
				return false;
			}
			return true;
			
			
		}
		
		
		
		function check_number($admission_number){
			
			if($this->members->is_exist('students',array('admission_number'=>$admission_number))){
				
				$this->form_validation->set_message('check_number', $admission_number.' '.'Already Belongs To Another Student');
				return false;
			}
			
			return true;
		}
		
		function check_course($course_code){
			
			if($this->members->is_exist('courses',array('course_code'=>$course_code))){
				
				$this->form_validation->set_message('check_course', $course_code.' '.'Already Exist!');
				return  false;
			}
			
			return true;
			
		}
		
		
		
		function change_password(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL){
				
				redirect('signup');
				
			}
			
			else{
                    
                        $data['title'] =   ucfirst($this->members->get('department_name',array('department_id'=>$acc_id),'departments')).": Change Password";
				
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
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/change_password')."\">
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
					
					$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('department/change_password')."\">
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
							<td><a href=\"".site_url()."/department/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/courses\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/scores\" class=\"textonly5\"><strong>Scores</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/department/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		
                
                
               function logout(){
		
			$this->session->sess_destroy();
			
			redirect('signup');
		
		
		} 
                
                
                
                
                
                
                
                
                
                
                
                
        }