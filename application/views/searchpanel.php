<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?></title>
<style type="text/css">

body {
	background-color: #CCCCCC;
}

</style>
<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="30">
<table width="86%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="100%" class="textonly5"><?php $this->load->view('partial/header.php');?></td>
  </tr>
  <tr>
    <td class="textonly5"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td width="126" height="7" bgcolor="#FFFFFF"><br />
      <br /></td>
    <td width="524" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="4" bgcolor="#FFFFFF"><strong>YOU ARE WELCOME </strong></td>
    <td width="524" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="4" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="524" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="16" valign="top" bgcolor="#FFFFFF"><?php echo $menu;//$this->load->view('menu.php');?></td>
    <td width="524" valign="top" bgcolor="#FFFFFF"><?php echo "<form name='form1' method='post' action=".site_url('student/check_score').">";?>
							<table width="366" border="0">
							<tr>
							   <td width="360"><table width="360" border="0">
							<tr>
							    <td colspan="3"><?php echo $error;?> &nbsp;</td>
							</tr>
							<tr>
							    <td>&nbsp;</td>
							    <td></td>
							    <td> </td>
							</tr>
							<tr>
							   <td width="139">Course Code</td>
							   <td width="119"><label><p><b><?php echo form_input(array('name'=>'course_code','id'=>'unit1','size'=>'5'));?></b></p></label></td>
							</tr>
							<tr>
							    <td width="139"><p>Admission Number</p> </td>
							   <td width="88"><label><p><b><?php echo $stud_num;?></b></p></label></td>
							   
							</tr>
							<tr>
							    <td width="139"><p>Semester</p> </td>
							   <td width="88"><label><?php echo form_dropdown('semester',array('1'=>'1','2'=>'2'));?></label></td>
							   
							</tr>
							<tr>
							   <td width="139"><p>Session</p> </td>
							   <td width="88"><label><?php echo form_input(array('name'=>'sess1','id'=>'unit1','size'=>'3')).'/'.form_input(array('name'=>'sess2','id'=>'unit1','size'=>'3'));?></label></td>
							   
							</tr>
							<tr>
							<td>&nbsp;</td>
							<td colspan="2">&nbsp;</td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan="2"><label><?php echo form_submit('submit','submit');?></label></td>
						      </tr>
						      <tr>
							<td>&nbsp;</td>
							<td colspan="2">&nbsp;</td>
						      </tr>
						    </table></td>
						  </tr>
						</table>
					      </form></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC33" class="textonly5"><?php $this->load->view('partial/footer.php');?></td>
  </tr>
</table>
</body>
</html>
