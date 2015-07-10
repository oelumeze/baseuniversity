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
			$this->load->model('general');
			//$this->output->enable_profiler(TRUE);
			
		}
                
                
                function index(){
			
			//echo "kkk";
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = 'header';
				
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
							<td class=\"textonly5\">Welcome to Base University, 
							<br />
								Have a splendid student result administartion time. </td>
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
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function faculty(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = 'header';
				
				
				
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
							  
							  
				$query = $this->members->get_all('*','faculties','faculty_id','asc');
				$data['display'] = "<a href = \"".site_url('moderator/addfaculty')."\">Add New Faculty</a><br/>";
				
				if(!$query){
					
					$data['display'] .= 'No Faculty available';
					//$this->load->view('home.php',$data);
				}
				else{
				
				$data['display'] .= "<table border = \"1\">
				<tr>
				<th>Faculty Name</th>
				<th>Faculty Short Name</th>
				<th>Faculty Head</th>
				</tr>";
				
				foreach($query as $row){
					
					$faculty_name = ucfirst($row['faculty_name']);
					$faculty_shortname = strtoupper($row['faculty_shortname']);
					$faculty_id = $row['faculty_id'];
					$faculty_head = ucfirst($row['faculty_head']);
					
					$data['display'] .= "<tr>
								<td>$faculty_name</td>
								<td>$faculty_shortname</td>
								<td>$faculty_head</td>
								<td><a href = \"".site_url('moderator/editfaculty/'.$faculty_id)."\">Edit</a></td>
								<td><a href = \"".site_url('moderator/deletefaculty/'.$faculty_id)."\">Delete</a></td>
							    </tr>";
					
					
				}
				}
				
				$data['display'] .= "</table>";
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function addfaculty(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = 'header';
				
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
							  
				
				$this->form_validation->set_rules('faculty_name','Faculty Name', 'required');
				$this->form_validation->set_rules('faculty_shortname', 'Short Name', 'required|max_lenght[3]');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
							  
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/addfaculty')."\">
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
							   <td width=\"139\">Faculty Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'faculty_name','id'=>'course1','size'=>'18'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\">Faculty ShortName </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'faculty_shortname','id'=>'unit1','size'=>'5'))."</label></td>
							</tr>
							<tr>
							   <td width=\"139\">Head Of Faculty</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'faculty_head','id'=>'course1','size'=>'15'))."</label></td>
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
					
					$faculty_name = $this->input->post('faculty_name');
					$faculty_shortname = strtoupper($this->input->post('faculty_shortname'));
					$faculty_head = strtoupper($this->input->post('faculty_head'));
					
					$param = array(
						'faculty_name'=>$faculty_name,
						'faculty_shortname'=>$faculty_shortname,
						'faculty_head'=> $faculty_head,
						'date_created'=>date('Y-m-d')
						
					);
					
					$this->members->insert_entry('faculties',$param);
					$this->members->insert_entry('login',array('username'=>$faculty_shortname,
										   'password'=>'123456',
										   'account_type'=>'faculty',
										   'date_ctreated'=>date('Y-m-d')));
					
					redirect('moderator');
					
					
					
					
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function editfaculty(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				
				
				$data['title'] = 'header';
				
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
				$faculty_name = $this->members->get('faculty_name',array('faculty_id'=>$id),'faculties');
				$faculty_shortname = $this->members->get('faculty_shortname', array('faculty_id'=>$id),'faculties');
				$faculty_head = $this->members->get('faculty_head',array('faculty_id'=>$id),'faculties');
				
				$this->form_validation->set_rules('fname', 'Faculty Name', 'required');
				//$this->form_validation->set_rules('shortname', 'Faculty ShortName', 'required|max_lenght[5]');
				$this->form_validation->set_rules('head', 'Faculty Head', 'required');
				
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/editfaculty/'.$this->uri->segment(3))."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\">$error</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							<tr>
							   <td width=\"139\">Faculty Name </td>
							   <td width=\"119\"><label><input type = \"text\" name = \"fname\" size = \"18\" value = \"".$faculty_name."\" /></label></td>
							</tr>
							
							<tr>
							   <td width=\"139\">Faculty Head </td>
							   <td width=\"88\"><label><input type = \"text\" name = \"head\" size = \"18\" value = \"".$faculty_head."\" /></label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','Confirm Changes')."</label></td>
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
					
					$name = $this->input->post('fname');
					//$shortname = $this->input->post('shortname');
					$head = $this->input->post('head');
					
					$param = array(
						'faculty_name'=>$name,
						//'faculty_shortname'=>$shortname,
						'faculty_head'=>$head
					);
					//$ids = $this->members->get('faculty_id',array('faculty_head'=>$head),'faculties');
					//echo $ids;

					
					$this->general->update_entry('faculties', array('faculty_id' => $this->uri->segment(3)), $param);
					redirect('moderator/faculty');
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		function deletefaculty(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$id = $this->uri->segment(3);
				$faculty_shortname = $this->members->get('faculty_shortname',array('faculty_id'=>$id),'faculties');
				$login_id = $this->members->get('login_id',array('username'=>$faculty_shortname),'login');
				
				$param = array('faculty_id'=>$id);
				
				$this->members->delete_entry('faculties',$param);
				$this->members->delete_entry('login',array('username'=>$faculty_shortname));
				
				redirect('moderator/faculty');
				
				
			
			
			
			
			
		}
		}
		
		function departments(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = 'Moderator: Departments';
				
				
				
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
							  
							  
				$query = $this->members->get_join('*','departments','faculties','departments.faculty_id = faculties.faculty_id');
				$data['display'] = "<a href = \"".site_url('moderator/adddepartment')."\">Add New Department</a><br/>";
				
				if(!$query){
					
					$data['display'] .= '<p>No Department available</p>';
					
				}
				else{
				$data['display'] .= "<table border = \"1\">
				<tr>
				<th>Department Name</th>
				<th>Department Short Name</th>
				<th>Faculty</th>
				<th>Head Of Department</th>
				</tr>";
				
				foreach($query as $row){
					
					$department_name = ucfirst($row['department_name']);
					$department_shortname = strtoupper($row['department_shortname']);
					$department_id = $row['department_id'];
					$department_head = ucfirst($row['HOD']);
					$faculty_name = ucfirst($row['faculty_name']);
					
					$data['display'] .= "<tr>
								<td>$department_name</td>
								<td>$department_shortname</td>
								<td>$faculty_name</td>
								<td>$department_head</td>
								<td><a href = \"".site_url('moderator/editdepartment/'.$department_id)."\">Edit</a></td>
								<td><a href = \"".site_url('moderator/deletedepartment/'.$department_id)."\">Delete</a></td>
							    </tr>";
					
					
				}
				}
				
				$data['display'] .= "</table>";
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				$get_faculties = $this->members->get_all('*','faculties','faculty_id','asc');
				$list_box = "<select name = \"faculties\">";
				foreach ($get_faculties as $row){
						
						$list_box .= "<option value =\"".$row['faculty_id']."\" >".$row['faculty_name']."</option>"; 	  
				}
					$list_box .= "</select>";
				
				$data['title'] = 'Faculty : Add Department';
				
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
				$this->form_validation->set_rules('department_shortname', 'Short Name', 'required|max_lenght[3]');
				$this->form_validation->set_rules('department_head', 'HOD', 'required|max_lenght[3]');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/adddepartment')."\">
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
							    <td>Faculty Name</td>
							    <td>".$list_box."</td>
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
					$faculty_id = $this->input->post('faculties');
					
					$param = array(
						'faculty_id'=>$faculty_id,
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
					
					redirect('moderator/departments');
					
					
					
					
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				
				
				$data['title'] = 'Moderator : Edit Department';
				
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
				$department_shortname = $this->members->get('department_shortname', array('department_id'=>$id),'departments');
				$department_head = $this->members->get('HOD',array('department_id'=>$id),'departments');
				
				$this->form_validation->set_rules('fname', 'Department Name', 'required');
				//$this->form_validation->set_rules('shortname', 'Department ShortName', 'required|max_lenght[5]');
				$this->form_validation->set_rules('head', 'HOD', 'required');
				
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/editdepartment/'.$this->uri->segment(3))."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\">$error</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							<tr>
							   <td width=\"139\">Department Name </td>
							   <td width=\"119\"><label><input type = \"text\" name = \"fname\" size = \"18\" value = \"".$department_name."\" /></label></td>
							</tr>
							
							<tr>
							   <td width=\"139\">Department Head </td>
							   <td width=\"88\"><label><input type = \"text\" name = \"head\" size = \"18\" value = \"".$department_head."\" /></label></td>
							</tr>
							
							<tr>
							<td>&nbsp;</td>
							<td colspan=\"2\">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan=\"2\"><label>".form_submit('submit','Confirm Changes')."</label></td>
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
					
					$name = $this->input->post('fname');
					$shortname = $this->input->post('shortname');
					$head = $this->input->post('head');
					
					$param = array(
						'department_name'=>$name,
						//'department_shortname'=>$shortname,
						'HOD'=>$head
					);
					//$ids = $this->members->get('faculty_id',array('faculty_head'=>$head),'faculties');
					//echo $ids;

					
					$this->general->update_entry('departments', array('department_id' => $this->uri->segment(3)), $param);
					redirect('moderator/departments');
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
				
				$id = $this->uri->segment(3);
				$department_shortname = $this->members->get('department_shortname',array('department_id'=>$id),'departments');
				$login_id = $this->members->get('login_id',array('username'=>$department_shortname),'login');
				
				$param = array('department_id'=>$id);
				
				$this->members->delete_entry('departments',$param);
				$this->members->delete_entry('login',array('username'=>$department_shortname));
				
				redirect('moderator/departments');
				
				
			
			
			
			
			
		}
			
			
			
			
		}
		
		
		function programs(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = 'Moderator: Programs';
				
				
				
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
							  
				
				$query = $this->members->get_multi_join();
				$data['display'] = "<a href = \"".site_url('moderator/addprogram')."\">Add New Program</a><br/>";
				
				if(!$query){
					
					$data['display'] .= '<p>No Program(s) available</p>';
					
				}
				else{
				$data['display'] .= "<table border = \"1\">
				<tr>
				<th>Program Name</th>
				
				<th>Duration</th>
				<th>Program Advisor</th>
				</tr>";
				
				foreach($query as $row){
					
					$program_name = ucfirst($row['program_name']);
					//$program_faculty = $row['faculty_name'];
					//$program_department = $row['department_name'];
					$program_duration = $row['program_duration'];
					$program_advisor = $row['program_advisor'];
					$program_id = $row['program_id'];
					//$department_head = ucfirst($row['HOD']);
					
					$data['display'] .= "<tr>
								<td>$program_name</td>
								
		
								<td>$program_duration</td>
								<td>$program_advisor</td>
								<td><a href = \"".site_url('moderator/editprogram/'.$program_id)."\">Edit</a></td>
								<td><a href = \"".site_url('moderator/deleteprogram/'.$program_id)."\">Delete</a></td>
							    </tr>";
					
					
				}
				}
				
				$data['display'] .= "</table>";
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function addprogram(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				$get_departments = $this->members->get_all('*','departments','department_id','asc');
				$list_box = "<select name = \"departments\">";
				foreach ($get_departments as $row){
						
						$list_box .= "<option value =\"".$row['department_id']."\" >".$row['department_name']."</option>"; 	  
				}
					$list_box .= "</select>";
				
				$data['title'] = 'Moderator : Add Program';
				
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
							  
				
				$this->form_validation->set_rules('program_name','Program Name', 'required');
				$this->form_validation->set_rules('program_duration', 'Program Duration', 'required');
				$this->form_validation->set_rules('program_shortname', 'Program Shortname', 'required');
				$this->form_validation->set_rules('program_advisor', 'Program Advisor', 'required');
				
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/addprogram')."\">
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
							    <td>Department Name</td>
							    <td>".$list_box."</td>
							</tr>
							<tr>
							   <td width=\"139\">Program Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'program_name','id'=>'course1','size'=>'18'))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Program Shortname</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'program_shortname','id'=>'unit1','size'=>'5'))."</label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Duration Of Program</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'program_duration','id'=>'unit1','size'=>'18'))."</label></td>
							</tr>
							<tr>
							   <td width=\"139\">Program Advisor</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'program_advisor','id'=>'course1','size'=>'18'))."</label></td>
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
					
					$program_name = $this->input->post('program_name');
					$program_duration = $this->input->post('program_duration');
					$program_advisor = $this->input->post('program_advisor');
					$program_shortname = strtoupper($this->input->post('program_shortname'));
					$department_id = $this->input->post('departments');
					$faculty_id = $this->members->get('faculty_id',array('department_id'=>$department_id),'departments');
					
					$param = array(
						'department_id'=>$department_id,
						'faculty_id'=>$faculty_id,
						'program_name'=>$program_name,
						'program_shortname'=>$program_shortname,
						'program_duration'=>$program_duration,
						'program_advisor'=>$program_advisor,
						'date_created'=>date('y-m-d : h:i:s',time())
						
					);
					
					$this->members->insert_entry('programs',$param);
					
					redirect('moderator/programs');
					
					
					
					
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function editprogram(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				
				
				$data['title'] = 'Moderator : Edit Program';
				
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
				$program_name = $this->members->get('program_name',array('program_id'=>$id),'programs');
				$program_duration = $this->members->get('program_duration', array('program_id'=>$id),'programs');
				$program_advisor = $this->members->get('program_advisor',array('program_id'=>$id),'programs');
				
				$this->form_validation->set_rules('program_name', 'Program Name', 'required');
				$this->form_validation->set_rules('program_duration', 'Program Duration', 'required');
				$this->form_validation->set_rules('program_advisor', 'Program Advisor', 'required');
				
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/editprogram/'.$id)."\">
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
							   <td width=\"139\">Program Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'program_name','id'=>'course1','size'=>'18','value'=>$program_name))."</p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Duration Of Program</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'program_duration','id'=>'unit1','size'=>'10','value'=>$program_duration))."</label></td>
							</tr>
							<tr>
							   <td width=\"139\">Program Advisor</td>
							   <td width=\"88\"><label>".form_input(array('name'=>'program_advisor','id'=>'course1','size'=>'18','value'=>$program_advisor))."</label></td>
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
					
					$name = $this->input->post('program_name');
					$shortname = $this->input->post('program_duration');
					$head = $this->input->post('program_advisor');
					
					$param = array(
						'program_name'=>$name,
						'program_duration'=>$shortname,
						'program_advisor'=>$head
					);
					//$ids = $this->members->get('faculty_id',array('faculty_head'=>$head),'faculties');
					//echo $ids;

					
					$this->general->update_entry('programs', array('program_id' => $this->uri->segment(3)), $param);
					redirect('moderator/programs');
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
		
		
		function deleteprogram(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$id = $this->uri->segment(3);
				$program_shortname = $this->members->get('program_shortname',array('program_id'=>$id),'programs');
				$login_id = $this->members->get('login_id',array('username'=>$program_shortname),'login');
				
				$param = array('program_id'=>$id);
				
				$this->members->delete_entry('programs',$param);
				//$this->members->delete_entry('login',array('login_id'=>$login_id));
				
				redirect('moderator/programs');
				
				
			
			
			
			
			
		}
			
			
			
			
			
			
		}
		
		
		
		function students(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$data['title'] = 'Moderator: Students';
				
				
				
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
							  
				
				$query = $this->members->get_students();
				$data['display'] = "<a href = \"".site_url('moderator/addstudent')."\">Add New Student</a><br/>";
				
				if(!$query){
					
					$data['display'] .= '<p>No Student(s) available</p>';
					
				}
				else{
				$data['display'] .= "<table border = \"1\" >
				<tr>
				<th width = \"298\">LastName</th>
				<th width = \"298\">FirstName</th>
				<th width = \"298\">Middle Name</th>
				<th width = \"298\">Gender</th>
				<th width = \"298\">Admission Number</th>
				<th width = \"298\">Year Of Entry</th>
				<th width = \"298\">Department</th>
				<th width = \"298\">Phone Number</th>
				<th width = \"298\">Email Address</th>
				<th>Program Of Study</th>
				<th>Action</th>
				</tr>";
				
				foreach($query as $row){
					
					$student_name = ucfirst($row['surname']);
					$first_name = ucfirst($row['first_name']);
					$last_name = ucfirst($row['other_name']);
 					$admission_number = $row['admission_number'];
					$entry_year = $row['entry_year'];
					$program_name = $row['program_name'];
					$phone = $row['phone'];
					$email = $row['email'];
					$student_id = $row['student_id'];
					$department_name = $row['department_name'];
					$sex = strtoupper(substr($row['sex'],0,1));
					//$department_head = ucfirst($row['HOD']);
					
					$data['display'] .= "<tr>
								<td width = \"198\">$student_name</td>
								<td = \"center\">$first_name</td>
								<td align = \"center\">$last_name</td>
								<td align = \"center\">$sex</td>
								<td align = \"center\">$admission_number</td>
								<td align = \"center\">$entry_year</td>
								<td align = \"center\">$department_name</td>
								<td align = \"center\">$phone</td>
								<td align = \"center\">$email</td>
								<td align = \"center\">$program_name</td>
								
								
								<td><a href = \"".site_url('moderator/editstudent/'.$student_id)."\">Edit</a></td>
								<td><a href = \"".site_url('moderator/deletestudent/'.$student_id)."\">Delete</a></td>
							    </tr>";
					
					
				}
				}
				
				$data['display'] .= "</table>";
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				$get_departments = $this->members->get_all('*','programs','program_id','asc');
				$list_box = "<select name = \"programs\">";
				foreach ($get_departments as $row){
						
						$list_box .= "<option value =\"".$row['program_id']."\" >".$row['program_name']."</option>"; 	  
				}
					$list_box .= "</select>";
				
				$data['title'] = 'Moderator : Add Student';
				
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
							  
				
				$this->form_validation->set_rules('admission_number','Admission Number', 'required');
				$this->form_validation->set_rules('surname','Student Last Name', 'required');
				$this->form_validation->set_rules('fname','Student First Name', 'required');
				//$this->form_validation->set_rules('student_name', 'Student Name', 'required');
				$this->form_validation->set_rules('sess1', 'Year Of Entry', 'required|max_length[4]');
				$this->form_validation->set_rules('sess2', 'Year Of Entry', 'required|max_length[4]');
				//$this->form_validation->set_rules('program_advisor', 'Program Advisor', 'required');
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
					
				
				if ($this->form_validation->run() == FALSE){			  
				
					$error = validation_errors();
					
					
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/addstudent')."\">
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
							    <td>Program Of Study</td>
							    <td>".$list_box."</td>
							</tr>
							<tr>
							   <td width=\"139\">Admission Number </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'admission_number','id'=>'course1','size'=>'12'))."</p></label></td>
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
					
					$surname = $this->input->post('surname');
					$fname = $this->input->post('fname');
					$oname = $this->input->post('oname');
					$gender = $this->input->post('gender');
					$phone = $this->input->post('phone');
					$email = $this->input->post('email');
					$admission_number = $this->input->post('admission_number');
					$program_id = $this->input->post('programs');
					$student_name = $this->input->post('student_name');
					$sess1 = $this->input->post('sess1');
					$sess2 = $this->input->post('sess2');
					$entry_year = $sess1.'/'.$sess2;
					$department_id = $this->members->get('department_id',array('program_id'=>$program_id),'programs');
					$faculty_id = $this->members->get('faculty_id',array('department_id'=>$department_id),'programs');
					
					$param = array(
						'program_id'=>$program_id,
						'department_id'=>$department_id,
						'faculty_id'=>$faculty_id,
						'admission_number'=>$admission_number,
						'surname'=>$surname,
						'first_name'=>$fname,
						'other_name'=>$oname,
						'sex'=>$gender,
						'date_of_birth'=>$this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day'),
						'entry_year'=>$entry_year,
						'phone'=>$phone,
						'email'=>$email,
						'date_created'=>date('y-m-d : h:i:s',time()));
						
					
					
					$this->members->insert_entry('students',$param);
					$this->members->insert_entry('login',array('username'=>$admission_number,
										   'password'=>'123456',
										   'account_type'=>'student',
										   'date_ctreated'=>date('Y-m-d')));
					
					redirect('moderator/students');
					
					
					
					
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				
				
				$data['title'] = 'Moderator : Edit Student Details';
				
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
				//$student_name = $this->members->get('name',array('student_id'=>$id),'students');
				$phone = $this->members->get('phone',array('student_id'=>$id),'students');
				$email = $this->members->get('email',array('student_id'=>$id),'students');
				$first_name = $this->members->get('first_name',array('student_id'=>$id),'students');
				$last_name = $this->members->get('surname',array('student_id'=>$id),'students');
				$other_names = $this->members->get('other_name',array('student_id'=>$id),'students');
				$get_departments = $this->members->get_all('*','programs','program_id','asc');
				$list_box = "<select name = \"programs\">";
				foreach ($get_departments as $row){
						
						$list_box .= "<option value =\"".$row['program_id']."\" >".$row['program_name']."</option>"; 	  
				}
					$list_box .= "</select>";
				
				
				
				//$program_advisor = $this->members->get('program_advisor',array('program_id'=>$id),'programs');
				
				
				$this->form_validation->set_rules('last_name', 'Last Name', 'required');
				$this->form_validation->set_rules('first_name', 'First Name', 'required');
				
				//$this->form_validation->set_rules('program_duration', 'Program Duration', 'required|max_length[2]|is_natural_no_zero');
				//$this->form_validation->set_rules('program_advisor', 'Program Advisor', 'required');
				
				
				if($this->form_validation->run() == FALSE){
					
					$error = validation_errors();
					$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/editstudent/'.$id)."\">
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
							    <td width=\"139\"><p>Program</p> </td>
							   <td width=\"88\"><label>".$list_box."</label></td>
							</tr>
			
							<tr>
							   <td width=\"139\">First Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'first_name','id'=>'course1','size'=>'18','value'=>$first_name))."</p></label></td>
							</tr>
							
							<tr>
							   <td width=\"139\">Last Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'last_name','id'=>'course1','size'=>'18','value'=>$last_name))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">Middle Name </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'middle_name','id'=>'course1','size'=>'18','value'=>$other_names))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">Phone </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'phone','id'=>'course1','size'=>'18','value'=>$phone))."</p></label></td>
							</tr>
							<tr>
							   <td width=\"139\">Email </td>
							   <td width=\"119\"><label><p>".form_input(array('name'=> 'email','id'=>'course1','size'=>'18','value'=>$email))."</p></label></td>
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
					
					$fname = $this->input->post('first_name');
					$lname = $this->input->post('last_name');
					$oname = $this->input->post('middle_name');
					$phone = $this->input->post('phone');
					$email = $this->input->post('email');
					$programs = $this->input->post('programs');
					$departments = $this->members->get('department_id',array('program_id'=>$programs),'programs');
					$faculty = $this->members->get('faculty_id',array('program_id'=>$programs),'programs');
					//$shortname = $this->input->post('program_duration');
					//$head = $this->input->post('program_advisor');
					
					$param = array(
						
						'program_id'=>$programs,
						'department_id'=>$departments,
						'faculty_id'=>$faculty,
						'surname'=>$lname,
						'first_name'=>$fname,
						'other_name'=>$oname,
						'phone'=>$phone,
						'email'=>$email
						
					);
					//$ids = $this->members->get('faculty_id',array('faculty_head'=>$head),'faculties');
					//echo $ids;

					
					$this->general->update_entry('students', array('student_id' => $this->uri->segment(3)), $param);
					redirect('moderator/students');
					
					
					
					
					
				}
				
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
				
				$id = $this->uri->segment(3);
				$admission_number = $this->members->get('admission_number',array('student_id'=>$id),'students');
				$login_id = $this->members->get('login_id',array('username'=>$admission_number),'login');
				
				$param = array('student_id'=>$id);
				
				$this->members->delete_entry('students',$param);
				$this->members->delete_entry('login',array('login_id'=>$login_id));
				
				redirect('moderator/students');	
			
		}
						
		}
		
		
		function results(){
			
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			else{
			$data['title'] = 'Moderator : Results';
				
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
							<td class=\"textonly5\">Welcome to Base University, 
							<br />
								Have a splendid student result administartion time. </td>
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
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
							
							
				$matric = $this->input->post('matric');
				$this->session->set_userdata(array('matric_no'=>$matric));
					
				$this->load->view('transcript.php',$data);
				
				
		}	
			
		}
		
		
		function acadaReport(){
			
		$admission_number = $this->uri->segment(3);
		$student_id = $this->members->get('student_id',array('admission_number'=>$admission_number),'students');
		$faculty_id = $this->members->get('faculty_id',array('student_id'=>$student_id),'students');
		$program_id = $this->members->get('program_id',array('student_id'=>$student_id),'students');
		$department_id = $this->members->get('program_id',array('student_id'=>$student_id),'students');
		
		$data['firstname'] = $this->members->get('first_name',array('student_id'=>$student_id),'students');
		$data['othername'] = $this->members->get('other_name',array('student_id'=>$student_id),'students');

		//$data['department'] = $this->members->get('department_name',array('department_id'=>$department_id),'departments');
		$data['surname'] = $this->members->get('surname',array('student_id'=>$student_id),'students');
		$data['ad_number'] = $admission_number;
		$data['year_admission'] = $this->members->get('entry_year',array('student_id'=>$student_id),'students');
		$data['faculty'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$faculty_id),'faculties'));
		$data['program'] = ucfirst($this->members->get('program_name',array('program_id'=>$program_id),'programs'));
		
		$data['image'] = base_url()."/assets/images/header.jpg";
		     
		$data['year1'] = $this->members->get_level_session($student_id,'1').$this->members->firstyear($student_id);
		
		$data['year2'] = $this->members->get_level_session($student_id,'2').$this->members->secondyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'2');
		
		$data['year3'] = $this->members->get_level_session($student_id,'3').$this->members->thirdyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'3');
		
		$data['year4'] = $this->members->get_level_session($student_id,'4').$this->members->fourthyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'4');
		$data['id'] = $this->uri->segment(3);
		$data['year5'] = $this->members->get_level_session($student_id,'5').'<br/>'.$this->members->fifthyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'5');
		//echo $this->members->display_second_semester($student_id,'2');
		$this->load->view('acadaReport.php',$data);
		
		$this->session->set_userdata(array('student_id'=>$student_id));
		}
		
		
		function pdf_export(){
		
		$this->load->helper('pdfcreator');
		
		$student_id = $data['id'] = $this->session->userdata('student_id');
		$faculty_id = $this->members->get('faculty_id',array('student_id'=>$student_id),'students');
		$program_id = $this->members->get('program_id',array('student_id'=>$student_id),'students');
		$department_id = $this->members->get('program_id',array('student_id'=>$student_id),'students');
		$admission_number = $this->members->get('admission_number',array('student_id'=>$student_id),'students');
		
		
		$data['firstname'] = $this->members->get('first_name',array('student_id'=>$student_id),'students');
		$data['othername'] = $this->members->get('other_name',array('student_id'=>$student_id),'students');

		//$data['department'] = $this->members->get('department_name',array('department_id'=>$department_id),'departments');
		$data['surname'] = $this->members->get('surname',array('student_id'=>$student_id),'students');
		$data['ad_number'] = $admission_number;
		$data['year_admission'] = $this->members->get('entry_year',array('student_id'=>$student_id),'students');
		$data['faculty'] = ucfirst($this->members->get('faculty_name',array('faculty_id'=>$faculty_id),'faculties'));
		$data['program'] = ucfirst($this->members->get('program_name',array('program_id'=>$program_id),'programs'));
		
		$data['image'] = base_url()."/assets/images/header.jpg";
		     
		$data['year1'] = $this->members->get_level_session($student_id,'1').$this->members->firstyear($student_id);
		
		$data['year2'] = $this->members->get_level_session($student_id,'2').$this->members->secondyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'2');
		
		$data['year3'] = $this->members->get_level_session($student_id,'3').$this->members->thirdyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'3');
		
		$data['year4'] = $this->members->get_level_session($student_id,'4').$this->members->fourthyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'4');
		
		$data['year5'] = $this->members->get_level_session($student_id,'5').$this->members->fifthyear($student_id);
		//echo 'Academic Session :' .$this->members->get_level_session($student_id,'5');
		//echo $this->members->display_second_semester($student_id,'2');
		//$query = $this->load->view('acadaReport', $data);
		
		//$query = $this->load->view('acadaReport', $data, true);
		
		$query = $this->load->view('acadaExport', $data, true);
		
		//echo $query;
		create_pdf_html2pdf($query, "", 'P', 'A4', 'studentexport.pdf');
			
			
			
		}
		
		
		function change_password(){
			
			$account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL){
				
				$this->session->sess_destroy();
				
				redirect('signup');
				
			}
			
			else{
                    
                        $data['title'] = "Moderator : Change Password";
				
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
				$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('moderator/change_password')."\">
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
					
					$data['display'] =   "<form name=\"form1\" method=\"post\" action=\"".site_url('student/change_password')."\">
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
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/faculty\" class=\"textonly5\"><strong>Faculties</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/departments\" class=\"textonly5\"><strong>Departments</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/programs\" class=\"textonly5\"><strong>Programs</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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