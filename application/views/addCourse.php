<?php $this->load->view('partial/header.php');?>
<?php //$this->load->model('Members');
echo $display;?>
<form name="form1" method="post" action="">
  <table width="366" border="0">
    <tr>
      <td width="360"><table width="360" border="0">
        <tr>
          <td colspan="3"><?php //print $msg ; ?>&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Course Code </td>
          <td>Course Unit </td>
        </tr>
        <tr>
          <td width="139">Course 1 </td>
          <td width="119"><label>
            <input name="course1" type="text" id="course1" size="6" maxlength="6">
          </label></td>
          <td width="88"><label>
            <input name="unit1" type="text" id="unit1" size="5" maxlength="2">
          </label></td>
        </tr>
        <tr>
          <td>Course 2 </td>
          <td><label>
            <input name="course2" type="text" id="course2" size="6" maxlength="6">
          </label></td>
          <td><label>
            <input name="unit2" type="text" id="unit2" size="5" maxlength="2">
          </label></td>
        </tr>
        <tr>
          <td>Course 3 </td>
          <td><label>
            <input name="course3" type="text" id="course3" size="6" maxlength="6">
          </label></td>
          <td><label>
            <input name="unit3" type="text" id="unit3" size="5" maxlength="2">
          </label></td>
        </tr>
        <tr>
          <td>Course 4 </td>
          <td><label>
            <input name="course4" type="text" id="course4" size="6" maxlength="6">
          </label></td>
          <td><label>
            <input name="unit4" type="text" id="unit4" size="5" maxlength="2">
          </label></td>
        </tr>
        <tr>
          <td>Course 5 </td>
          <td><label>
            <input name="course5" type="text" id="course5" size="6" maxlength="6">
          </label></td>
          <td><label>
            <input name="unit5" type="text" id="unit5" size="5" maxlength="2">
          </label></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><label>
            <input name="Submit" type="submit" onClick="MM_validateForm('unit1','','NinRange1:10','unit2','','NinRange1:10','unit3','','NinRange1:10','unit4','','NinRange1:10','unit5','','NinRange1:10');return document.MM_returnValue" value="Submit">
            <input name="send" type="hidden" id="send" value="go">
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