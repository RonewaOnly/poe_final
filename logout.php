<?php
    include 'DBconn.php';

    $query = mysqli_query($con,"SELECT * FROM tbluser where visited ='1'");
    if($row == mysqli_fetch_assoc($query)){
        $name = $row['firstname'];
        echo "Goodbye:  ".$name;
        $remove = "UPDATE `tbluser` SET `visited`='0'";
        mysqli_query($con,$remove);
        header("location:land-page?bye=see you");
    }
?>