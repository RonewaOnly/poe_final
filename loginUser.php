<?php
include 'DBconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="backside">
    <h2 class="title-2">Welcome to Bookstore 101</h2>
    <div class="body-log">
        <div class="log_or_SignUp">
            <a href="" class="btn-reg btn-log" id="btnLog">Login</a>
            <a href="" class="btn-reg btn-sign" id="btnsign">Sign Up</a>
        </div>
        <section id="login">
            <form action="" class="form-block" method="POST">
                <div class="student-group">
                    <label for="username">Enter username/Email: </label>
                    <input type="text" name="user_name" id="username" placeholder="Enter username/Email">
                </div>
                <div class="student-group">
                    <label for="studNums">Enter your student no's: </label>
                    <input type="text" name="stu_no" id="studNums" placeholder="Enter student e.g ST00000000 ">
                </div>
                <div class="student-group">
                    <label for="pass">Enter password: </label>
                    <input type="password" name="user_Pass" id="pass" placeholder="Enter password">
                </div>
                <div class="student-group">
                    <input type="submit" name="btn_submit" id="btn_submit" value="submit">
                </div>
            </form>
        </section>
        <section id="SignUp">
            <form action="reg_details.php" class="form-block" method="post">
                <div class="student-group">
                    <label for="#firstname">Enter firstname: </label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div class="student-group">
                    <label for="#lastName">Enter lastname: </label>
                    <input type="text" name="lastname" id="lastName">
                </div>
                <div class="student-group">
                    <label for="">Enter username: </label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="student-group">
                    <label for="#stdNum">Enter student number: </label>
                    <input type="text" name="stdNum" id="stdNum">
                </div>
                <div class="student-group">
                    <label for="#user_Cell">Enter Cellno's:</label>
                    <input type="text" name="user_Cell" id="user_Cell">
                </div>
                <div class="student-group">
                    <label for="#user_Email">Enter email address: </label>
                    <input type="text" name="user_Email" id="user_Email">
                </div>
                <div class="student-group">
                    <label for="#user_City">Enter city: </label>
                    <input type="text" name="user_City" id="user_City">
                </div>
                <div class="student-group">
                    <label for="#provinces">Enter state/province: </label>
                    <select name="provinces" id="provinces">
                        <option value="none"></option>
                        <option value="Gauteng">Gauteng</option>
                        <option value="KwaZuluNatal">Kwazulu Natal</option>
                        <option value="Mpumalanga">Mpumalanga</option>
                        <option value="Limpopo">Limpopo</option>
                        <option value="NorthWest">North West Province</option>
                        <option value="FreeSate">Free State</option>
                        <option value="EasternCape">Eastern Cape</option>
                        <option value="NorthernCape">Northen Cape</option>
                    </select>
                </div>
                <div class="student-group">
                    <label for="#user_Passone">Enter Password: </label>
                    <input type="password" name="user_Passone" id="user_Passone">
                </div>
                <div class="student-group">
                    <label for="#conPass">Confirm password: </label>
                    <input type="password" name="conPass" id="conPass">
                </div>
                <div class="student-group">
                    <input type="submit" name="signupBtn" id="signupBtn" value="Sign Up!">
                </div>
            </form>

        </section>
    </div>
    <script src="app.js"></script>

    <?php
    //$checking = new passwordusername_check();
    if (isset($_POST['btn_submit'])) { //this for the login details
        $user_or_email = $_POST['user_name'];
        $studentnums = strtoupper($_POST['stu_no']);
        $pass = $_POST['user_Pass'];
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        $count =1;
        setcookie("username","$user_or_email",time()+60*60*24*7,"./");
        if (strlen($pass) > 10) {
            echo "
                    <script>
                        alert('password lenght too lenght must be less than 10 character');
                    </script>";
        } else {
            $_SESSION['userLog'] = $user_or_email;
            $query = mysqli_query($con, "SELECT * FROM tbluser WHERE (Username = '$user_or_email' OR email = '$user_or_email') AND studentNums='$studentnums'");
            $look = mysqli_fetch_array($query);
            if ($query) {
                $name = $look['firstname'];
                $passVer = password_verify($pass, $look['passwords']);
                if ($passVer) {
                    $url = 'bookHomepage.php';
                    echo "
                            <script>
                                alert('welcome back !! $name');
                                window.location.href ='$url';
                            </script> ";
                            $insertVisite = "UPDATE `tbluser` 
                            SET `visited`='$count' 
                            WHERE Username='$user_or_email' OR email='$user_or_email'";//this allows to keep track of who is log-in :)
                            $visitMarked = mysqli_query($con,$insertVisite);
                } else {
                    echo "<h2 style='color:#ff3c4d'>wrong username or pass</h2>";
                    echo "
                                <script>
                                    var wrongPass = document.getElementById('pass');
                                    wrongPass.style.borderColor ='red';

                                </script>
                            ";

                }

            } else {
                echo "error: ", @mysqli_error($con);
            }
        }
    }

    ?>

</body>
</html>