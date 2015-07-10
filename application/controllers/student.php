<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Student extends CI_Controller
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
                    
                    
                        $account_type = $this->session->userdata('account_type');
			$password = $this->session->userdata('password');
			$username = $this->session->userdata('username');
			$id = $this->session->userdata('login_id');
			$acc_id = $this->session->userdata('acc_id');
                        $stud_num = $this->session->userdata('stud_num');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL || $stud_num == NULL){
				
				redirect('signup');
				
			}
                        
                        
                        else{
				
                                
				$data['title'] = ucfirst($this->members->get('surname',array('student_id'=>$acc_id),'students')).' '.ucfirst($this->members->get('first_name',array('student_id'=>$acc_id),'students')).' : '."Home";
				
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
							<td class=\"textonly5\">Welcome  ".ucfirst($this->members->get('surname',array('student_id'=>$acc_id),'students')).' '.ucfirst($this->members->get('first_name',array('student_id'=>$acc_id),'students'))."<br />
							<br />
								Have a splendid time with the System. </td>
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
							<td><a href=\"".site_url()."/student/check_score\" class=\"textonly5\"><strong>Check Score</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
        
        
        
       /*function check_score(){
            
            
            $account_type = $this->session->userdata('account_type');
	    $password = $this->session->userdata('password');
	    $username = $this->session->userdata('username');
	    $id = $this->session->userdata('login_id');
	    $acc_id = $this->session->userdata('acc_id');
            $stud_num = $this->session->userdata('stud_num');
			
			if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL || $stud_num == NULL){
				
				redirect('signup');
				
			}
                        
                        
                        else{
				
                                
				$data['title'] = ucfirst($this->members->get('name',array('student_id'=>$acc_id),'students')).' : '."Check Score";
				
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
							  
				$semester_array = array('1'=>'1',
							'2'=>'2');
                                
                                $error = validation_errors();
				$data['display'] = "<form name=\"form1\" method=\"post\" action=\"".site_url('student/get_score')."\">
							<table width=\"366\" border=\"0\">
							<tr>
							   <td width=\"360\"><table width=\"360\" border=\"0\">
							<tr>
							    <td colspan=\"3\">".$error."  &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							
							<tr>
							   <td width=\"139\">Course Code</td>
							   <td width=\"119\"><label><p><b>".form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'))."</b></p></label></td>
							</tr>
							<tr>
							    <td width=\"139\"><p>Admission Number</p> </td>
							   <td width=\"88\"><label><p><b>".$stud_num."</b></p></label></td>
							   
							</tr>
							<tr>
							    <td width=\"139\"><p>Semester</p> </td>
							   <td width=\"88\"><label>".form_dropdown('semester',$semester_array)."</label></td>
							   
							</tr>
							<tr>
							   <td width=\"139\"><p>Session</p> </td>
							   <td width=\"88\"><label>".form_input(array('name'=>'sess1','id'=>'unit1','size'=>'3')).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'3'))."</label></td>
							   
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
				
				
			
				//$this->load->model('Members');
						       
				$data['menu'] .= "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/check_score\" class=\"textonly5\"><strong>Check Score</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
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
        }*/
        
        
        
        function check_score(){
            
            
            $account_type = $this->session->userdata('account_type');
	    $password = $this->session->userdata('password');
	    $username = $this->session->userdata('username');
	    $id = $this->session->userdata('login_id');
	    $acc_id = $this->session->userdata('acc_id');
            $stud_num = $this->session->userdata('stud_num');
			
	    if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL || $stud_num == NULL){
				
				redirect('signup');
				
		}
            
            else{
                
                $data['title'] = ucfirst($this->members->get('surname',array('student_id'=>$acc_id),'students')).' '.ucfirst($this->members->get('first_name',array('student_id'=>$acc_id),'students')).' : '."Check Score";
				
		$data['stud_num'] = $stud_num;		//$style = 'style.css';
				
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
                		  
                
                $data['menu'] .= "<tr>
					<td colspan=\"2\" height=\"8\"></td>
				</tr>
						
						
				<tr>
					<td colspan=\"2\" height=\"8\"></td>
				</tr>
				<tr>
					<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
					<td><a href=\"".site_url()."/student/check_score\" class=\"textonly5\"><strong>Check Score</strong></a>&nbsp;</td>
				</tr>
				<tr>
					<td colspan=\"2\" height=\"8\"></td>
				</tr>
				<tr>
					<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
					<td><a href=\"".site_url()."/student/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
				</tr>
						
				<tr>
					<td colspan=\"2\" height=\"8\"></td>
				</tr>
				<tr>
					<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
					<td><a href=\"".site_url()."/student/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
				</tr>";
                                                
				
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
					
                
                
                $this->form_validation->set_rules('course_code','Course code','required');
                $this->form_validation->set_rules('sess1','Session','required|max_length[4]');
                $this->form_validation->set_rules('sess2','Session','required|max_length[4]');
                
                if($this->form_validation->run() == FALSE){
                                
                        $data['error'] = validation_errors();
                        $this->load->view('searchpanel.php',$data);
                                
				
                }
                
                else{
                    
                    $course_code = $this->input->post('course_code');
                    $session = $this->input->post('sess1').'/'.$this->input->post('sess2');
                    $semester = $this->input->post('semester');
                    
                    $course_id = $this->members->get('course_id',array('course_code'=>$course_code),'courses');
                    
                    $data['error'] = $this->members->find_student_score($course_id,$semester,$session,$acc_id,$stud_num);
                    $this->load->view('searchpanel.php',$data);
                    
                    
                }
       			//$this->load->view('searchpanel.php',$data);
            }
                 
        }
        
        
        function logout(){
            
            
            $this->session->sess_destroy();
            
            redirect('signup');
            
        }
        
        
        function change_password(){
            
            $account_type = $this->session->userdata('account_type');
	    $password = $this->session->userdata('password');
	    $username = $this->session->userdata('username');
	    $id = $this->session->userdata('login_id');
	    $acc_id = $this->session->userdata('acc_id');
            $stud_num = $this->session->userdata('stud_num');
            //echo $id;
			
	    if ($account_type == NULL || $password == NULL || $username == NULL || $id == NULL || $acc_id == NULL || $stud_num == NULL){
				
				redirect('signup');
				
		}
                
                else{
                    
                        $data['title'] = ucfirst($this->members->get('surname',array('student_id'=>$acc_id),'students')).' '.ucfirst($this->members->get('first_name',array('student_id'=>$acc_id),'students')).' : '."Change Password";
				
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
				<td colspan=\"2\" height=\"8\"></td>
			</tr>
			<tr>
				<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
				<td><a href=\"".site_url()."/student/check_score\" class=\"textonly5\"><strong>Check Score</strong></a>&nbsp;</td>
			</tr>
			<tr>
				<td colspan=\"2\" height=\"8\"></td>
			</tr>
			<tr>
				<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
				<td><a href=\"".site_url()."/student/change_password\" class=\"textonly5\"><strong>Change Password</strong></a>&nbsp;</td>
			</tr>
					
			<tr>
				<td colspan=\"2\" height=\"8\"></td>
			</tr>
			<tr>
				<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
				<td><a href=\"".site_url()."/student/logout\" class=\"textonly5\"><strong>Logout</strong></a>&nbsp;</td>
			</tr>";
				       
					
			
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
        
        
        
        
        
                
        }
        
    