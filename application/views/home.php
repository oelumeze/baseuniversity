<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="'.base_url().'assets/js/calendarDateInput.js"></script>
						  <script type="text/javascript" src="'.base_url().'assets/js/jquery.timePicker.js"></script>
						  <script type="text/javascript" src="'.base_url().'assets/js/action.js"></script>
					          <script language="javascript">
						  function load_widget(widget_id, loader_id, page_link, target_widget_loader, the_widget_id, resize)
						{
                                                $(loader_id).show();
                                                var widget_val = $(widget_id).val();
                                                
                                                $.get("'.site_url('/').'" + page_link, {widget_id_val: widget_val, widget_id: the_widget_id}, function(response) {
                                                    setTimeout("finishAjax(\'" + target_widget_loader + "\', \'"+escape(response)+"\', \'"+ loader_id + "\')", 400);
                                                });
						}
					    
						</script>
<title><?php echo $title; ?></title>
<style type="text/css"> 

body {
	background-color: #CCCCCC;
}

</style>
<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin="30">
<table width="86%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#fff">
  <tr>
    <td width="100%" background="<?php echo base_url(); ?>assets/images/headBG.jpg" class="textonly5"><?php $this->load->view('partial/header.php');?></td>
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
    <td width="524" valign="top" bgcolor="#FFFFFF"><?php echo $display;//echo $content;//include 'myDisplay.php' ; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td bgcolor="#56B5CF" class="textonly5"><?php $this->load->view('partial/footer.php');?></td>
  </tr>
</table>
</body>
</html>
