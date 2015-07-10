<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> <?php echo '.:'.$title ;?></title>
<style type="text/css"> 
<!--
body {
	background-color: #CCCCCC;
}
-->
</style></head>

<body topmargin="30">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="">
  <tr>
    <td bgcolor="#56B5CF"><?php $this->load->view('partial/header.php');?>
	    <table width=100%>
		<tr>
		    <td align="center"><font color="red" size="-2"><?php echo $error;?></font></td>
		</tr>
	    </table>
    </td>
    <td></td>
  </tr>
  <tr>
    
    <td bgcolor="#56B5CF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="31" bgcolor=""><hr />
      <br />
        <table width="70%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
	    
            <td><?php echo form_open('signup');?>
                <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td colspan="4">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td colspan="2"><div align="center"><img src="<?php echo base_url() ;?>assets/images/login.jpg" width="150" height="40" /></div></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" height="10"></td>
                  </tr>
                  <tr>
                    <td width="22%">&nbsp;</td>
                    <td width="17%"><font size="-1" face="Arial, Helvetica, sans-serif" class="textonly5"><strong>Username :</strong></font></td>
                    <td width="39%"><?php echo form_input(array('name' => 'username', 'size'=>'16'));?></td>
                    <td width="22%">&nbsp;</td>
                  </tr>
                  <tr>
                                        <td colspan="4" height="10"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><font size="-1" face="Arial, Helvetica, sans-serif" class="textonly5"><strong>Password:</strong></font></td>
                    <td><?php echo form_password(array('name'=>'password', 'size'=>'16'));?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" height="10"></td>
                  </tr>
                  <tr>
                    <td colspan="4" height="10"><div align="center"><a href="index.php?page=register" class="menu-up"></a></div></td>
                  </tr>
                  <tr>
                    <td colspan="4" height="10"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?php echo form_submit('submit','login');?></td>
                    <td>&nbsp;</td>
                  </tr>
              </table>
            </form></td>
          </tr>
        </table>
      <br /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td height="35" bgcolor="#56B5CF"><hr />
    <?php $this->load->view('partial/footer.php');?></td>
  </tr>
</table>
</body>
</html>