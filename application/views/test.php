<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?></title>
<style type="text/css"> 
<!--
body {
	background-color: #CCCCCC;
}
-->
</style>
<link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
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
    <td height="16" valign="top" bgcolor="#FFFFFF"><?php echo $content;//$this->load->view('menu.php');?></td>
    <td width="524" valign="top" bgcolor="#FFFFFF"><?php echo form_open('signup/addCourse') ?>
  <table width="366" border="0">
    <tr>
      <td width="360"><table width="360" border="0">
        <tr>
          <td colspan="3"></td>
          </tr>
        <tr>
          <td><?php echo $error;?></td>
          <td>Course Code </td>
          <td>Course Unit </td>
        </tr>
	    <?php for($i = 1; $i <=5; $i++):?>
        <tr>
          <td width="139">Course  </td>
          <td width="119"><label>
            <input name="course" type="text" id="course1" size="6" value="<?php echo '';?>" maxlength="6">
          </label></td>
          <td width="88"><label>
            <input name="unit" type="text" id="unit1" size="5" value="<?php echo '';?>" maxlength="2">
          </label></td>
        </tr>
	 <?php endfor;?>
        
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><label>
            <input name="Submit" type="submit" onClick="MM_validateForm('unit1','','NinRange1:10','unit2','','NinRange1:10','unit3','','NinRange1:10','unit4','','NinRange1:10','unit5','','NinRange1:10');return document.MM_returnValue" value="Submit">
            
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</td>
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
