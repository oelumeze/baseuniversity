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
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
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
    <td width="524" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo form_open_multipart('signup/addResult');?>
      <table width="445" border="0">
        <tr>
          <td width="439" colspan="2"><table width="445" border="0">
              <tr>
                <td width="139">Course:
                  <label>
                    <?php echo form_input(array('name'=>'course','id'=>'course','size'=>'6'),set_value('course'));?>
                  </label></td>
                <td width="166">Session:
                  <label>
                    <?php echo form_input(array('name'=>'sess1','id'=>'sess1','size'=>'2'),set_value('sess1'));?>
                    </label>
                  /
                  <label>
                    <?php echo form_input(array('name'=>'sess2', 'id'=>'sess2','size'=>'2'),set_value('sess2')); ?>
                  </label></td>
                <td width="126">Semester:
                  <label>
                    <?php echo form_dropdown('semester',array('1'=>'1','2'=>'2')); ?>
                    
                  </label></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><table width="543" border="0"><tr><td width="108"></td><td width="171">Matric No </td><td width="250">Score</td></tr>
          <tr>
            <td>&nbsp;</td>
            <td><?php echo form_input(array('name'=>'matric','size'=>'8'),set_value('matric'));?></td>
            <td><?php echo form_input(array('name'=>'score', 'size'=>'6'),set_value('score')); ?></td>
          </tr></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr></table>
        <tr>
          <td colspan="2"><fieldset>
            <legend>Upload Student Result</legend>
            <label>
            <!--<input name="upload" type="checkbox" id="upload" value="yes" />-->
            </label>
            <input type="file" name="file" />
            <input name="MAX_FILE_SIZE" type="hidden" id="MAX_FILE_SIZE" value="51200" />
            </fieldset>
              <label></label></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> </tr>
        <tr>
          <td colspan="2"><?php echo $dynamic_resultAdder ; ?></td>
        </tr>
        <tr>
          <td colspan="2"><table width="439" border="0">
              <tr>
                <td width="180">&nbsp;</td>
                <td width="148"><label>
                  <?php echo form_submit('submit','submit', 'submit'); ?>
                  </label>
                    
                <td width="97">&nbsp;</td>
              </tr>
            </table>
              <br />
            <?php echo $msg ; ?></td>
        </tr>
      </table>
        </form></td>
  </tr>
</table>
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
