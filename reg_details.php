<?php
include 'DBconn.php';


if (isset($_POST['signupBtn'])) { //this for the sign up button/form
    //echo 'hello';
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $uname = $_POST["username"];
    $studentnos = $_POST['stdNum'];
    $email = $_POST["user_Email"];
    $phone = $_POST["user_Cell"];
    $citynaam = $_POST['user_City'];
    $provience = $_POST['provinces'];
    $passfirst = $_POST['user_Passone'];
    $passsecond = $_POST['conPass'];

    $hashed_ag = password_hash($passfirst, PASSWORD_DEFAULT);
    if ($passfirst == $passsecond) {
        $insert = "INSERT INTO `tbluser`(`user_id`, `firstname`, `lastname`, `Username`, `studentNums`, `email`, `phoneNum`, `provinces`, `city_name`, `passwords`) VALUES ('','$fname','$lname','$uname','$studentnos','$email','$phone','$provience','$citynaam','$hashed_ag')";
        $sql = mysqli_query($con, $insert);
        if ($sql) {
            echo "
                <script>
                    alert('information loaded');
                </script>";
                header("Location: loginUser.php ");
        }else{
            echo "error: ",mysqli_error($con);
        }
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }
}