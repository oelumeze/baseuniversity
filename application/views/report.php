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
    <td height="16" valign="top" bgcolor="#FFFFFF"><?php echo $content;//$this->load->view('menu.php');?></td>
    <td width="524" valign="top" bgcolor="#FFFFFF">
<style type="text/css">
<!--
department {
	font-family: "Times New Roman", Times, serif;
	font-size: 36px;
	font-style: normal;
	font-weight: bold;
	text-transform: uppercase;
	color: #000000;
}
.department {
	font-family: "Times New Roman", Times, serif;
	font-size: 36px;
	font-weight: bold;
	text-transform: uppercase;
	text-align: center;
}
-->
</style>

<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script language="JavaScript">
<!--
	function confirm_entry()
	{
		input_box=confirm("Click OK or Cancel to Continue");
		if (input_box==true)
		{ 
			// Output when OK is clicked
			var str = 'acadaReport.php?matric_number=' + eval( document.form1.matric.value)
			
			window.open(str,'', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=870,height=000,left = 200,top = 50')
			
		}
			
		//alert (\"You clicked OK\"); 
		}
		else
		{
			// Output when Cancel is clicked
			alert ("You clicked cancel");
		}

	}
-->
</script>

<form id="form1" name="form1" method="post" action="" onSubmit="confirm_entry()">
<table width="393" border="0">
  <tr>
    <td width="21" height="27">&nbsp;</td>
    <td width="81">Matric No: </td>
    <td width="178"><label>
      <input name="matric" type="text" id="matric" value="" maxlength="9" />
    </label></td>
    <td width="95"><label>
      <input name="Submit2" type="submit" onClick="MM_openBrWindow('acadaReport/' + form1.matric.value,'','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=870,height=600,left = 100,top = 50')"  value="Submit" />
      <input name="send" type="hidden" id="send" value="go" />
    </label></td>
  </tr>
</table>
<br />

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
