<td height="16" valign="top" bgcolor="#FFFFFF">
<?php

    
    switch($this->session->userdata('account_type')){
        
        case 'admin':
            echo "<tr>
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
							<td><a href=\"".site_url()."/moderator/students\" class=\"textonly5\"><strong>Studentskk</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/moderator/results\" class=\"textonly5\"><strong>Results</strong></a>&nbsp;</td>
						</tr>
						";
                                                break;
                                            
    
     case 'faculty':
                                                echo "<tr>
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
						";
                                                break;
                                            
                                            
                                            case 'department':
                                                "<tr>
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
						";
                                                break;
                                                
                                                case 'student':
                                                   "<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/result\" class=\"textonly5\"><strong>Students</strong></a>&nbsp;</td>
						</tr>
						<tr>
							<td colspan=\"2\" height=\"8\"></td>
						</tr>
						<tr>
							<td><div align=\"center\"><img src= \"".base_url()."assets/images/plusbullet(1).jpg\" width=\"9\" height=\"9\" /></div></td>
							<td><a href=\"".site_url()."/student/settings\" class=\"textonly5\"><strong>Courses</strong></a>&nbsp;</td>
						</tr>
						";
                                                break;
                                                    
                                            
        
        
        
    }
 





?>
</td>