<?php
    include 'DBconn.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $postDate = $_POST['datePosted'];
        $postmess = $_POST['message'];

        //create table for posts and insert data into it
        $insert = "INSERT INTO tblblogs(`blogID`,`blogerName`,`blogDate`,`blogMess`) VALUES('','$username','$postDate','$$postmess')";

        $query1 = mysqli_query($con,$insert);
        if($query1){
            $mess = "blog loaded to the public";
            echo "<script>";
            echo" var messbook = document.getElementById('messed');
                messbook.innerHTML = '$mess`;
            
            ";
            echo "</script>";
            header("refresh:2;url=customerBlogs.php");
        }
    }
    ?>