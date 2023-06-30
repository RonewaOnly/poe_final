<?php
include 'DBconn.php';
$btn_reg_admin = $_POST['reg_admin'];

if (isset($btn_reg_admin)) {
	$AdminFirstnames = $_POST['admin_firstname'];
	$Adminsurname = $_POST['admin_Lastname'];
	$Adminusername = $_POST['admin_Username'];
	$Adminmails = $_POST['admin_mail'];
	$AdminJob = $_POST['admin_role'];
	$adminPass = $_POST['first_admin_pass'];

	$hash_pass = password_hash($adminPass, PASSWORD_DEFAULT); //Encoring the password		
	$hash = password_verify($adminPass, $hash_pass);

	$result = mysqli_query($con, "SELECT * FROM tbladmin WHERE 
		adminUsername = '$Adminusername' OR adminEmali ='$Adminmails' OR 
		adminPassword ='$hash'");
	$row = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result) > 0) {
		echo "User already exist";
	} else {

		$insertValues = mysqli_query($con, "INSERT INTO tbladmin 
			(adminRegID,adminFirstname,adminLastname,adminUsername,adminEmali,adminPassword,Job_Ttile)
			VALUES('','$AdminFirstnames','$Adminsurname','$Adminusername','$Adminmails','$hash_pass','$AdminJob')");

		if ($insertValues) {
			echo "information loaded sucessfully ";
			header('location: loginAdmin.php');
		} else {
			echo "unable to laod information: " . mysqli_error($con);
		}
	}



}



?>