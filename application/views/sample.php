<?php 
	
	//include("myConnect.php");
	//include("myFunctions.php");
	
	/*if($_GET[matric_number] != "")
	{*/
	/*		if(substr(trim($_GET[matric_number]),0,6) != "020806")//just for student 
	
	of the department
				$msg="Sorry the matric does not belong to this department";
			else
			{*/
			/*$myCounter=0;
			$semesterChecker=0;
			$sessionChecker="";
					
			$session="select session,semester from student_academic_info where matric_number ='". trim($_GET[matric_number]) ."' order by session";
			$session_res=mysql_query($session,$conn) or die(mysql_error());
		
			$msg="<table width=\"810\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\" bordercolor=\"#000000\">
					<tr>
					<td width=\"43\">Year</td>
					<td width=\"80\">Semester</td>
					<td width=\"66\">Session</td>
					<td colspan=\"5\">Courses Taken with Status, Units and Grades </td>
					<td width=\"22\">TUT</td>
					<td width=\"13\">TUP</td>
					<td width=\"23\">TGP</td>
					<td width=\"22\">GPA</td>
					<td width=\"11\">CUT</td>
					<td width=\"23\">CUP</td>
					<td width=\"31\">CGP</td>
					<td width=\"47\">CGPA</td>
				  </tr>";
			while($row= mysql_fetch_array($session_res))
			{
				$session=$row['session'];
				$semester=$row['semester'];
				
				if($sessionChecker == $session)
				{					
					if($year > 4)
						$year = 4;
										
					if($myCounter == 0 || $semesterChecker <= 1)
					{
						$sut=$sut2=$tsua=$scredit=0;
																
						$sql="select course,score from student_academic_info where matric_number ='".trim($_GET[matric_number])."' and session='".$sessionChecker."' and semester='".($semesterChecker + 1)."'";
						$sql_res=mysql_query($sql,$conn) or die(mysql_error());
						
						$getName="select name,moe from student_info where matric_number='".trim($_GET[matric_number])."'";
						$getName_res=mysql_query($getName, $conn) or die(mysql_error());
						$studName=trim($_GET[matric_number])." | ".mysql_result($getName_res,0,'name')." [".@mysql_result($getName_res,0,'moe')."]";
						$departmentName="DEPARTMENT OF MATHEMATICS, UNIVERSITY OF LAGOS. ";//department name
						
						while($myNewRow= mysql_fetch_array($sql_res))
						{
							$myCourse= $myNewRow['course'];
							$myScore= $myNewRow['score'];
													
							$unit=getUnit($myCourse);
							
							$sut += $unit;
							
							if($myScore < 40)
							{
								$unit=getUnit($myCourse);
													
								$sut2 += $unit;
							}
							
							if(substr($myCourse,0,3) != "GST" || substr($myCourse,0,3) != "GAS")
							{
								$tsUnit=getUnit($myCourse);
								$tsua += $tsUnit;
	
								$scredit += getPoint($myScore) * $tsUnit;
							}											
							
						}				
											
						$sup= $sut - $sut2;
						$sgpa = sprintf("%.2f",@($scredit/$tsua));//format output
						$ccredit += $scredit ;
						$cup += $sup ;
						$cut += $sut;
						$tcut += $tsua;//temporary cummulative unit toatal i.e unit total without GST
						$cgpa= sprintf("%.3f",@($ccredit/$tcut)) ;
						
						$msg.="<tr>
								<td><b>".$year."</b>&nbsp;</td>
								<td>".($semesterChecker + 1)."&nbsp;</td>
								<td>".$session."&nbsp;</td>
								<td colspan=\"5\">".coursesDisplay(trim($_GET[matric_number]),$session,($semesterChecker + 1))."</td>
						<td>".$sut."&nbsp;</td>
						<td>".$sup."&nbsp;</td>
						<td>".$scredit."&nbsp;</td>
						<td><b>".$sgpa."</b>&nbsp;</td>
						<td>".$cut."&nbsp;</td>
						<td>".$cup."&nbsp;</td>
						<td>".$ccredit."&nbsp;</td>
						<td><b>".$cgpa."</b>&nbsp;</td>
					</tr>";												
							
						$myCounter++;
						$semesterChecker++;
											
					}
										
				}else
				{
					$sessionChecker=$session;
					$myCounter=0;
					$semesterChecker=0;
					$year++;
				}
								  
			}
			$msg.="</table>";
							
	}else
		$msg = "<font color=red>Close this page and click on sbumit button again</font>";
			*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Academic Report for <?php echo $matric_number;//$_GET[matric_number] ; ?></title>
<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="841" border="0" >
    <tr>
      <td colspan="4" class="department"><?php echo $departmentName."<br><span class=\"department2\">STUDENT ACADEMIC REPORT</span>" ; ?></td>
    </tr>
    <tr>
      <td colspan="4" >&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="textField"><?php echo $studName; ?></td>
    </tr>
    <tr>
      <td colspan="4" class="textonly5"><table width="828" border="0">
        <tr>
          <td width="822"><?php echo $msg;?></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td colspan="4" class="footer">Note: GST and GAS courses are excluded from computation of the total grade point or cummulative grade point <br />
      <span class="textonly">This Software is for the Dept. of Computer Science, Base University<br />
      </span><span class="textonly5">For internal use only <br />
      </span>
      <hr /></td></tr>
    <tr>
      <td width="137">&nbsp;</td>
      <td width="144">&nbsp;</td>
      <td><label>
        <input name="Submit" type="submit" onClick="window.print()" value="Print Transcript" />
      </label></td>
      <td width="254"><form id="form1" name="form1" method="post" action="">
        <label>
        <input type="submit" name="Submit2" value="Convert To PDF" />
        </label>
            <input name="send" type="hidden" id="send" value="go" />
      </form>
      </td>
    </tr>
  </table>
</body>
</html>