<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
	
	<div id="frm">
		<form action="processprinicipal.php" method="POST">
			<p>
				<label>Username:</label>
				<input type="text" id="username" name="username" />
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="password" name="password" />
			</p>
			<p>
				<input type="submit" id="btn" value="Login"/>
			</p>
		</form>
	</div>	
</body>
</html>