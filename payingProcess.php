<?php
include 'DBconn.php';
if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productQuantity = $_POST['productQuan'];
    $productTotal = $_POST['productTotal'];
    $history = array($productName, $productQuantity, $productTotal);
    $query = mysqli_query($con, "SELECT * FROM tblorder");
    $cusLoged = mysqli_query($con, "SELECT user_id FROM tbluser WHERE visited='1'"); //this will be linking the user table to the order table
    $idGet = mysqli_fetch_assoc($cusLoged);
    $getID = $idGet['user_id'];
    while ($row = mysqli_fetch_assoc($query)) {
        $value = $row['itemName'];
        $value1 = $row['itemQuantity'];
        $value2 = $row['itemPrice'];
        $historyStore = mysqli_query($con, "INSERT INTO tblitemprocessed (`itemBroID`,`itemsNames`,`itemQuans`,`itemgrandPrice`,`cus_id`) 
            VALUES('','$value','$value1','$value2','$getID')");
    }
    $delete = mysqli_query($con,"DELETE FROM `tblorder`");
    header('location: payment_final.php?delete=moved to history');

}


?>