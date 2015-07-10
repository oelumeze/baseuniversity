
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?></title>
<style type="text/css">

body {
	background-color: #FFFFFF;
}

</style>
<link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
	<h1><tr><td align="center"><img width="100%" src = "<?php echo $image;?>"></td></tr></h1>
	<h3>Student Result</h3>
</center>
	<p>Faculty : <?php echo $faculty;?></p>
	<p>Department : <?php echo $department;?></p>
	<p>Name : <?php echo $name;?></p>
	<p>Matric : <?php echo $matric;?></p>
	<p>Level : <?php echo $level;?></p>
	<p>Semester : <?php echo $semester;?></p>
	<p>Academic Session : <?php echo $session;?></p>

	
	<?php echo $query;?>
	<?php //echo $failed;?>
	
	
	<br/><br/>
	
	<input name="Submit" type="submit" onClick="window.print()" value="Print Result" />
	
	
</body>
</html>