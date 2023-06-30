<?php
//require_once('hasing-password-class.php');
include 'DBconn.php';
$AdminBtn = $_POST['action_admin'];

if (isset($AdminBtn)) {
    $Adminusernames = $_POST['ad_username'];
    $AdminRole = $_POST['sel-option'];
    $AdminEmail = $_POST['ad_email'];
    $AdminPass = $_POST['ad_pass'];

    $hash_pass = password_hash($AdminPass, PASSWORD_DEFAULT); //Encoring the password


    $hash = password_verify($AdminPass, $hash_pass); //

    $result = mysqli_query($con, "SELECT * FROM tbladmin WHERE adminUsername = '$Adminusernames' OR adminEmali ='$AdminEmail' OR 
		adminPassword ='$hash_pass'");

    $row =@mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($Adminusernames == $row['adminUsername'] and $hash == $row['adminPassword'] and $AdminEmail == $row['adminEmali']) {
            //header('location: homepage.html');
            echo "admin welcome";
            header('location: homepageAdmin.php');
        } else {
            echo "Thing aint adding up:" . mysqli_error($con);
        }
    } elseif(mysqli_num_rows($result)==0) {
        echo "<script>
            alert('User not found try again');
        
        </script>";
        header('location: loginAdmin.php');

    }
}


?>