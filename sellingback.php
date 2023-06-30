<?php
    include 'DBconn.php';

    if(isset($_POST['submit'])){
        $booknames = $_POST['bookname'];
        $bookprices = $_POST['bookprice'];
        $bookimgs = $_FILES['bookimg1'];
        $bookreason =$_POST['reason'];
        $bookcondition =$_POST['bookcon'];
    

      
                    //Inserting a database
                    $query = "INSERT INTO `tblsell`(`sellID`, `bookName`, `price`, `reason`, `conditions`) 
                    VALUES ('','$booknames','$bookprices','$bookreason','$bookcondition')";
                    $result = mysqli_query($con, $query);
                    header("Location: sellingItems.php");
                
                // header('Location: books.php');
    
            
        
    
}


?>