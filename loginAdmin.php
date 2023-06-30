<!DOCTYPE html>

<html>
	<head>
		<title>Login for admin</title>
		<link rel="stylesheet" href="adminstyle.css">
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.google.com/">
	</head>
	<body class="backside_Admin">
		<div class="form-admins">
			<h3>Signin/Login for admins</h3>
			<form class="admin-lines" action="hash-password-forAdmin.php" method="POST">
			<div>
				<i class="fa fa-user" style="color: white; font-size: 20px;"></i>
				<input type="text" id="" name="ad_username" placeholder="enter admin username...">
			</div>
			<div>
				<i class="fa fa-briefcase" style="color: white;"></i>
				<select class="sel-option" name="sel-option">
					<option value="none"></option>
					<option value="admin">adminator</option>
				</select>
			</div>
			<div>
				<i class="fa fa-envelope" style="color: white;"></i>
				<input type="email" id="" name="ad_email" placeholder="enter admin email...">
			</div>
			<div>
				<i class="fa fa-unlock" style="color: white; padding-left: 10px;"></i>
				<input type="password" id="" name="ad_pass" placeholder="enter admin password ">
			</div>
				<input type="submit" id="" name="action_admin" value="submit">
			</form>
			<a href="#" class="ad_forgot">forgot password?</a>
			<hr style="width: 100%; background-color: gray;">
			<a href="signUpAdmin.php" class="ad_create">create Account?</a>
		</div>
	</body>
	
	


</html>