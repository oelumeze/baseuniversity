<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title;?></title>
<style type="text/css"> 
<!--
body {
	background-color: #CCCCCC;
}
-->
</style>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="30">
<table width="86%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="100%" class="textonly5"><?php $this->load->view('partial/header.php')?></td>
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
    <td height="16" valign="top" bgcolor="#FFFFFF"><?php echo $content;?></td>
    <td width="524" valign="top" bgcolor="#FFFFFF"><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<?php echo form_open('signup/editPanel'); ?>
  <table width="75%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><fieldset>
        <legend>Edit Panel</legend>
        <label></label>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
              <td bgcolor="#FFFFCC"><label>Edit Search Parameter</label>
                <label></label>
                <label>
                <?php echo form_input(array('name'=>'parameter','id'=>'parameter'),set_value('parameter'));  ?>
                (Course:<span class="style1">*</span>)                </label>
                <label>
                <?php echo form_input(array('name'=>'course','id'=>'course','size'=>'5')); ?>
                <?php echo form_radio(array('name'=>'radiobutton','value'=>'student_result')); ?>
Student Result</label>
                <label></label></td>
          </tr>
<tr>
  <td><label>Search Option
      |
      <?php echo form_radio(array('name'=>'radiobutton','value'=>'student_course')); ?>
Course</label>
|
<label>
<?php echo form_radio(array('name'=>'radiobutton','value'=>'student_info')); ?>
Student Info</label><label></label></td>
</tr>
        </table>
        <label></label>
      </fieldset><label></label></td>
    </tr>
    <tr>
      <td><fieldset>
        <legend>Administrator Authentication </legend>
        Username:
      <label>
      <?php echo form_input(array('name'=>'username','id'=>'username','size'=>'6'));?>
Password:
<?php echo form_password(array('name'=>'password','id'=>'password','size'=>'6')); ?>
      </label>
      <?php echo form_submit('submit','submit','submit'); ?>
      <!--<input name="send" type="hidden" id="send" value="go" />-->
      </fieldset><label></label></td>
    </tr>
    <tr>
      <td><table width="81%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><label>
            <table width="569" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="569"><fieldset>
                  <legend>Search Result</legend>
                  <br />
                  <?php echo $msg ; ?>
                </fieldset>                </td>
              </tr>
            </table>
            </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>

</form>
</body>
</html></td>
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
