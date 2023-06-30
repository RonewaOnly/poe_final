<!DOCTYPE html>

<html>

<head>
    <title>Sign-up admin</title>
    <link rel="stylesheet" href="adminstyle.css">

</head>

<body class="backside_reg_student">

    <div class="registor-admin">
        <div class="admin-img">
            <img src="background-for-lognandSignUp/face=default.jpeg">
        </div>
        <form class="admin_reg_form" action="AdminRegisting.php" method="post">
            <input type="text" id="admin_firstname" name="admin_firstname" placeholder="enter firstname..">
            <input type="text" id="admin_Lastname" name="admin_Lastname" placeholder="enter lastname..">
            <input type="text" id="admin_Username" name="admin_Username" placeholder="enter admin username">
            <input type="email" id="admin_mail" name="admin_mail" placeholder="enter admin email">
            <input type="text" id="admin_role" name="admin_role" placeholder="enter your role e.g admin..">
            <input type="password" id="first_admin_pass" name="first_admin_pass" placeholder="enter your password">
            <input type="password" id="con_admin_pass" name="con_admin_pass" placeholder="confirm your password">
            <input type="submit" id="reg_admin" name="reg_admin" value="submit">
        </form>
    </div>
</body>


</html>