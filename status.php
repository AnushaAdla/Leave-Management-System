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
		$a_sql=mysql_query("INSERT INTO app_form (name,dept,designation,type,days,date,adjust) VALUES('$name', '$dept', '$designation', '$type', '$days', '$date', '$adjust')");
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
		
	</ul>	<br /><br />
		<!-- ---------------------show data---------------- -->
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
				</thead>
				<?php
				$sql=mysql_query("SELECT * FROM app_form");
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
						</tr>";
						$i++;
					}
				?>
			</table>
</body>
</html>