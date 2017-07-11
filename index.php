<?php include('connect.php');
	$epr='';
	$msg='';
	if(isset($_GET['expr']))
		$epr=$_GET['expr'];
	
	//----------------save record--------
	if($epr=='save') {
		$name=$_POST['name'];
		$dept=$_POST['dept'];
		$designation=$_POST['designation'];
		$type=$_POST['type'];
		$days=$_POST['days'];
		$date=$_POST['date'];
		$adjust=$_POST['adjust'];
		$department=$_POST['department'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		$section=$_POST['section'];
		$session=$_POST['session'];
		$period=$_POST['period'];
		$faculty=$_POST['faculty'];
		$a_sql=mysql_query("INSERT INTO app_form (name,dept,designation,type,days,date,adjust) VALUES('$name', '$dept', '$designation', '$type', '$days', '$date', '$adjust')");
		
		if($a_sql)
			header("location:index.php");
		else
			$msg='Error: '.mysql_error();
		$b_sql=mysql_query("INSERT INTO adjust (department,year,sem,section,session,period,faculty) VALUES('$deprtment', '$year', '$sem', '$section', '$session', '$period', '$faculty')");
		if($b_sql)
			header("location:index.php");
		else
			$msg='Error: '.mysql_error();
		
		
	}
	// +++++++++++++++++++++ delete record++++++++++++++++++
	if($epr=='delete') {
		$id=$_GET['id'];
		$delete=mysql_query("DELETE FROM app_form WHERE id=$id");
		if($delete)
			header("location:index.php");
		else 
			$msg='Error: '.mysql_error();
	}
	//+++++++++++++++++++++ save update +++++++++++++++
	if($epr=='saveup') {
		$name=$_POST['name'];
		$dept=$_POST['dept'];
		$designation=$_POST['designation'];
		$type=$_POST['type'];
		$days=$_POST['days'];
		$date=$_POST['date'];
		$adjust=$_POST['adjust'];
		$id=$_POST['id'];
		$a_sql=mysql_query("UPDATE app_form SET name='$name', dept='$dept', designation='$designation', type='$type', days='$days', date='$date', adjust='$adjust' WHERE id='$id'");
		if($a_sql)
			header("location:index.php");
		else
			$msg='Error: '.mysql_error();
	}	
	
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="jquery.chained.min.js"></script>
	<style>
		.error {
			color: #FF0000;
		}
	</style>
	</head>
	<body>
	<img src = "bvrit.jpg"  width="110" height="110">
	<div id="title">
		<p>BVRITH</p>
		<p>BVRIT College of Engineering for Women</p>
	</div>
	
	<div id="heading">
		<p>LEAVE MANAGEMENT SYSTEM</p>
	</div>
	
	<ul align=left;>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="index.php">Apply Leave</a></li>
		<li><a href="status.php">Status</a></li>
		<li><a href="ContactUs.html">Time Table</a></li>
		<li><a href="ContactUs.html">Leave Rules</a></li>
	</ul>	
	 <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->	
	    <?php
		if($epr=='update'){
			$id=$_GET['id'];
			$row=mysql_query("SELECT * FROM app_form WHERE id='$id'");
			$st_row=mysql_fetch_array($row);
	    ?>
			<h2 align="center">Edit Form</h2>
				<form method="POST" action='index.php?expr=saveup'>
					<table align="center">
						<tr>
							<td>ID:</td>
							<td><input type='text' name='id' value="<?PHP echo $st_row['id'] ?>"/></td>
						</tr>
						<tr>
							<td>Name:</td>
							<td><input type='text' name='name' value="<?PHP echo $st_row['name'] ?>"/></td>
						</tr>
						<tr>
							<td>Department:</td>
							<td><select name='dept' value="<?PHP echo $st_row['dept'] ?>"/>
								<option value=""></option>
								<option>IT</option>
								<option>CSE</option>
								<option>EEE</option>
								<option>ECE</option>
							</td>
						</tr>
						<tr>
							<td>Designation:</td>
							<td><select name='designation' value="<?PHP echo $st_row['designation'] ?>"/>
								<option value=""></option>
								<option>Professor</option>
								<option>Asst. Professor</option>
							</td>
						</tr>
						<tr>
							<td>Leave Type:</td>
							<td><select name='type' value="<?PHP echo $st_row['type'] ?>"/>
								<option value=""></option>
								<option>Casual Leave (CL)</option>
								<option>(CCL)</option>
								<option>Special Leave (SL)</option>
								<option>Medical Leave (ML)</option>
								<option>Academic Leave (AL)</option>
								<option>Summer Vacation</option>
							</td>
						</tr>
						<tr>
							<td>No. of days:</td>
							<td><input type='text' name='days' value="<?PHP echo $st_row['days'] ?>"/></td>
						</tr>
						<tr>
						<td>Date:</td>
						<td><input type='date' name='date'/>To:<input type='date' name='date'/></td>
					</tr>
					<tr>
						<td>Adjusted to:</td>
					</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='btnsave' value='Apply'/></td>
						</tr>
					</table>
				</form>			
			
		<?php }else {

		?>
		<?php
				// define variables and set to empty values
				$nameErr = $deptErr = $designationErr = $typeErr = $daysErr= "";
				$name = $dept = $designation = $type = $days = "";

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				  if (empty($_POST["name"])) {
					$nameErr = "Name is required";
				  } else {
					$name = test_input($_POST["name"]);
				  } 
					if($_POST) { 
						if(isset($_POST['dept'])) { 
							if($_POST['dept'] == 'NULL') { 
								echo '<p>Please select an option from the select box.</p>'; 
							} 
							else { 
								echo '<p>You have selected: <strong>', $_POST['dept'], '</strong>.</p>'; 
							} 
						} 
					} 
				  if (empty($_POST["designation"])) {
					$designationErr = "required";
				  } else {
					$designation = test_input($_POST["designation"]);
				  }

				  if (empty($_POST["type"])) {
					$typeErr = "required";
				  } else {
					$type = test_input($_POST["type"]);
				  }

				  if (empty($_POST["days"])) {
					$daysErr = "Gender is required";
				  } else {
					$days = test_input($_POST["days"]);
				  }
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
		?>
		
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++= -->
		<h2 align="center">Apply Leave</h2>
		
			<form method="POST" action='index.php?expr=save'>
				<table align="center">
					<tr>
						<td>Name:</td>
						<td><input type='text' name='name' required>
                          <span class="error"><?php echo $nameErr;?></span></td>
					</tr>
					<tr>
						<td>Department:</td>
						<td><span class="error"><?php echo $nameErr;?></span>
							<select name="dept" required>
							<option value=""></option>
							<option>IT</option>
							<option>CSE</option>
							<option>EEE</option>
							<option>ECE</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Designation:</td>
						<td><span class="error"><?php echo $nameErr;?></span>
							<select name="designation" required/>
							<option value=""></option>
							<option>Professor</option>
							<option>Asst. Professor</option>
							<option>Associate Professor</option>
							<!--<option>ECE</option>-->
						</td>
					</tr>
					<tr>
						<td>Leave Type:</td>
						<td><span class="error"><?php echo $nameErr;?></span>
							<select name="type" required/>
							<option value=""></option>
							<option>Casual Leave (CL)</option>
							<option>(CCL)</option>
							<option>Special Leave (SL)</option>
							<option>Medical Leave (ML)</option>
							<option>Academic Leave (AL)</option>
							<option>Summer Vacation</option>
							<option>On Duty (OD)</option>
							<!--<option>Medical Leave (ML)</option>-->
						</td>
					</tr>
					<tr>
						<td>No. of days:</td>
						<td><input type='text' name='days' required/>
						<span class="error"><?php echo $nameErr;?></span></td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><input type='date' name='date' required/>To:<input type='date' name='date' required/>
						<span class="error"><?php echo $nameErr;?></span></td>
					</tr>
					<tr>
						<td>Adjustment :</td>
					</tr>
					
				</table>
			</form>			
					
		<!-- ---------------------------------adjustment table---------------------------------------------------------------------- -->
		<table align="center" border="1" cellspacing="0" cellpadding="0" width="1000">
				<thead>
					<tr>
						<th>Department :
							<select name="designation" required onchange="javascript:select_professor(this.value)"/>
							<option value=""></option>
							<option value="IT">IT</option>
							<option value="CSE">CSE</option>
							<option value="ECE">ECE</option>
							<option value="EEE">EEE</option>
							<option value="BSandH">BS & H</option>
							</select>
							<!--<option>ECE</option>-->
						</th>
						<th> Year :
							<select name="year" required/>
							<option value=""></option>
							<option>I</option>
							<option>II</option>
							<option>III</option>
							<option>IV</option>
							</select>
							<!--<option>ECE</option>-->
						</th>
						<th> sem :
							<select name="sem" required/>
							<option value=""></option>
							<option>I</option>
							<option>II</option>
							</select>
							<!--<option>ECE</option>-->
						</th>
						<th>Section :
							<select name="section" required/>
							<option value=""></option>
							<option>A</option>
							<option>B</option>
							</select>
							<!--<option>ECE</option>-->
						</th>
						<th>Session :
							<select name="session" required/>
							<option value=""></option>
							<option>Lab</option>
							<option>Theory</option>
							</select>
							<!--<option>ECE</option>-->
						</th>
						<th>Period :
							<select name="period" required/>
							<option value=""></option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
                            <option>4</option>
							<option>5</option>
							<option>6</option>
                            <option>7</option>
							<option>8</option>
							</select>
						</th>
						<th>Faculty :
							<select name="faculty" required id="faculty"/>
							<option value=""></option>
							</select>
						</th>
					</tr>
				</thead>
				
				
				<?php
				$sql=mysql_query("SELECT * FROM adjust where 1=1 order by id desc limit 1");
				$i=1;
					while ($row=mysql_fetch_array($sql)) {
						echo "<tr>
							<td>".$i."</td>
							<td>".$row['department']."</td>
							<td>".$row['year']."</td>
							<td>".$row['sem']."</td>
							<td>".$row['section']."</td>
							<td>".$row['session']."</td>
							<td>".$row['period']."</td>
							<td>".$row['faculty']."</td>
						</tr>";
						$i++;
					}
				?>
				<tr>
						<td></td>
						<td><input type='submit' name='btnsave' value='Apply'/></td>
				</tr>
		</table>
				
			
		<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		<?php } ?>
		<!-- ---------------------show data---------------- -->
		<!--<h2 align="center">form</h2>-->
			<table align="center" border="1" cellspacing="0" cellpadding="0" width="1000">
				<thead>
					<th>No</th>
					<th>Name</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Leave Type</th>
					<th>No of days</th>
					<th>Date</th>
					<th>Adjusted to</th>
					<th>Action</th>
				</thead>
				<?php
				$sql=mysql_query("SELECT * FROM app_form where 1=1 order by id desc limit 1");
				$i=1;
					while ($row=mysql_fetch_array($sql)) {
						echo "<tr>
							<td>".$i."</td>
							<td>".$row['name']."</td>
							<td>".$row['dept']."</td>
							<td>".$row['designation']."</td>
							<td>".$row['type']."</td>
							<td>".$row['days']."</td>
							<td>".$row['date']."</td>
							<td>".$row['adjust']."</td>
							<td align='center'>
								<a href='index.php?expr=update&id=".$row['id']."'>EDIT</a> |
								<a href='index.php?expr=delete&id=".$row['id']."'>CANCEL</a> 	
							</td>
						
						</tr>";
						$i++;
					}
				?>
			</table>
			<?php echo $msg;?>
			<script>
			function select_professor(val)
			{
				if(val!='')
				{
					url="select_professor.php?val="+val;
					$.get(url,function(data)
					{
						$('#faculty').html(data);
					});
				}
			}
			</script>
	</body>
</html>
	
					
				
				
		
	
		