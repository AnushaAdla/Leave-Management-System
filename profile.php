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
	</ul>	<br /><br />
		<!-- ---------------------show data---------------- -->
		<table align="center" cellspacing="0" cellpadding="0" width="1000">
				<thead>
				
					<th>Name :</th>
					<th>Department :</th>
					<th>Designation :</th>
				</thead>
				<?php 
				$sql=mysql_query("SELECT * FROM app_form");
				
					while ($row=mysql_fetch_array($sql)) {
						echo "<tr>
						
							<td>".$row['name']."</td>
							<td>".$row['dept']."</td>
							<td>".$row['designation']."</td>
                        </tr>";
						 
					}
				?>
					
		<!--<h2 align="center">form</h2>-->
			<table align="center" border="1" cellspacing="0" cellpadding="0" width="1000">
				<thead>
				
				<tr width = "100%">
				    <th scope = "col">No</th>
					<th colspan="6" text-alignment:"center">Leave Type</th>
				</tr>
	             <tr>
				 <th scope = "row">&nbsp;</th>
						<th colspan = "2">CL</th>
						<th colspan = "2">CCL</th>
						<th colspan = "2">ML</th>
						<th colspan = "2">SL</th>
						<th colspan = "2">OD</th>
						<th colspan = "2">AL</th>

				</tr> 
				<tr>
					<th scope = "row">&nbsp;</th>
					<th>Date</th>
					<th>No.of Days</th>
					<th>Date</th>
					<th>No.of Days</th>
					<th>Date</th>
					<th>No.of Days</th>
					<th>Date</th>
					<th>No.of Days</th>
					<th>Date</th>
					<th>No.of Days</th>
					<th>Date</th>
					<th>No.of Days</th>
				</tr>

				</thead><br /><br />
				<?php
				$sql=mysql_query("SELECT * FROM app_form");
				$i=1;
					while ($row=mysql_fetch_array($sql)) {
						echo "<tr>
							<td>".$i."</td>
							<td>".$row['type']."</td>
						</tr>";
						$i++;
					}
				?>
			</table>
			<?php echo $msg;?>
	</body>
</html>
	
					
				
				
		
	
		